<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Mail\EnquiryMail;
use App\Models\AgentAddress;
use App\Models\City;
use App\Models\Enquiry;
use App\Models\MasterEnquiry;
use App\Models\Testimonial;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ApiController extends Controller
{
    public $_responseData = [];

    public function sendCityData()
    {
        $data = City::select('id', 'name')
            ->where('status', 1)
            ->orderBy('name')
            ->get()
            ->toArray();

        $this->_responseData['city'] = $data;
        return response()->json($this->_responseData, 200);
    }

    public function sendAgentPackageData(Request $request)
    {
        $city_id = $request->post('city_id');
        if ($city_id) {
            $data = AgentAddress::select('ap.*', 'c.name AS city_name', 'mp.name AS package_category')
                ->join('agent_packages AS ap', 'ap.agent_id', 'agents_address.user_id')
                ->join('cities AS c', 'c.id', 'agents_address.b_city')
                ->join('master_packages AS mp', 'mp.id', 'ap.master_package_id')
                ->where('agents_address.b_city', $city_id)
                ->where('ap.status', 1)
                ->get()->toArray();

            $this->_responseData['package_data'] = $data;
            $status = 200;
        } else {
            $this->_responseData['error'] = "Please provide city id.";
            $status = 403;
        }
        return response()->json($this->_responseData, $status);
    }

    public function sendPopularAgentPackageData()
    {
        $subquery = MasterEnquiry::select('agent_package_id', \DB::raw('COUNT(agent_package_id) as package_count'))
            ->groupBy('agent_package_id');

        $data = AgentAddress::select('ap.*', 'c.name AS city_name', 'mp.name AS package_category')
            ->join('agent_packages AS ap', 'ap.agent_id', 'agents_address.user_id')
            ->join('cities AS c', 'c.id', 'agents_address.b_city')
            ->join('master_packages AS mp', 'mp.id', 'ap.master_package_id')
            ->joinSub($subquery, 'me', function ($join) {
                $join->on('me.agent_package_id', '=', 'ap.id');
            })
            ->where('ap.status', 1)
            ->orderByDesc('me.package_count')
            ->limit(6)
            ->get()
            ->toArray();

        $this->_responseData['package_data'] = $data;
        $status = 200;

        return response()->json($this->_responseData, $status);
    }

    public function saveEnquiryData(Request $request)
    {
        $enquiryData = $request->post('enquiry');

        if (!empty($enquiryData)) {
            $masterEnquiry = new MasterEnquiry();
            $masterEnquiry->agent_id = $request->post('agent_id');
            $masterEnquiry->agent_package_id = $request->post('agent_package_id') ?? null;
            $masterEnquiry->master_package_id = $request->post('master_package_id') ?? null;
            $masterEnquiry->save();

            foreach ($enquiryData as $eVal) {
                $enquiry = new Enquiry();
                foreach ($eVal as $name => $value) {

                    if (in_array($name, ['passport_date_of_issue', 'passport_date_of_expiry', 'dob'])) {
                        $value = Carbon::parse($value)->tz(config('app.timezone'))->format('Y-m-d');
                    }
                    $enquiry->{$name} = $value;
                }
                $enquiry->master_enquiry_id = $masterEnquiry->id;
                $enquiry->save();
            }

            $sAdminEmails = Helper::getSuperAdminEmail();
            $agentEmail = User::find($masterEnquiry->agent_id)->email ?? null;
            Helper::sendMail($agentEmail, 'New Enquiry', 'backend.email.enquiry', ['enquiry_id' => $masterEnquiry->id], $sAdminEmails);
            $this->_responseData['message'] = "Enquiry submitted successfully";
            $status = 200;
        } else {
            $this->_responseData['error'] = "Please provide enquiry data!";
            $status = 403;
        }

        return response()->json($this->_responseData, $status);
    }

    public function contactUs(Request $request)
    {
        $data = Arr::except($request->all(), ['encryption_key']);
        try {
            if (!empty($data)) {
                $sAdminEmails = Helper::getSuperAdminEmail();
                Helper::sendMail($sAdminEmails, 'Contact Us Mail', 'backend.email.contact_us', $data);
                $this->_responseData['message'] = "Thank you for contacting us!";
                $status = 200;
            } else {
                $this->_responseData['error'] = "Please fill the required data!";
                $status = 403;
            }
        } catch (\Exception $e) {
            Log::error("Error sending email: " . $e->getMessage());
            $this->_responseData['error'] = "Something went wrong!";
            $status = 500;
        }

        return response()->json($this->_responseData, $status);
    }

    public function testimonials()
    {
        $query = Testimonial::select('id', 'name', 'description', 'photo')
            ->where('status', 1)
            ->orderBy('sequence')
            ->get()->toArray();

        $testimonialData = [];
        foreach ($query as $index => $value) {
            $testimonialData[$index]['id'] = $value['id'];
            $testimonialData[$index]['name'] = $value['name'];
            $testimonialData[$index]['description'] = $value['description'];
            $testimonialData[$index]['image_path'] = null;
            if (isset($value['photo']) && !empty($value['photo'])) {
                $testimonialData[$index]['image_path'] = asset('uploads/testimonials/' . $value['photo']);
            }
        }

        $this->_responseData['testimonialData'] = $testimonialData;
        return response()->json($this->_responseData, 200);
    }
}
