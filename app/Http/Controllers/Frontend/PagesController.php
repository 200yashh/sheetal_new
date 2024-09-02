<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class PagesController extends Controller
{
    public $_viewData = [];
    public $_responseData = [];


    public function index()
    {
        return $this->getPage('home');
    }

    //Catches all pages
    public function getPage($page = null)
    {
        $this->_viewData['activeMenu'] = $page;
        if($page == 'home'){
            $testimonials = Testimonial::select('id', 'name', 'description', 'photo')
            ->where('status', 1)->orderBy('sequence')->get()->toArray();

            $testimonialData = [];
            foreach ($testimonials as $index => $value) {
                $testimonialData[$index]['id'] = $value['id'];
                $testimonialData[$index]['name'] = $value['name'];
                $testimonialData[$index]['description'] = $value['description'];
                $testimonialData[$index]['image_path'] = null;
                if (isset($value['photo']) && !empty($value['photo'])) {
                    $testimonialData[$index]['image_path'] = asset('uploads/testimonials/' . $value['photo']);
                }
            }

            $this->_viewData['testimonialData'] = $testimonialData;    
        }

        if (view()->exists("frontend." . $page)) {
            return view("frontend." . $page, $this->_viewData);
        } else {
            abort(404);
        }
    }
    
    public function senddata(Request $request)
    {
        $data = Arr::except($request->all(), ['_token','encryption_key']);
        // dd($data);
        try {
            if (!empty($data)) {
                $sAdminEmails = Helper::getSuperAdminEmail();
                Helper::sendMail($sAdminEmails, 'Contact Us Mail', 'backend.email.contact_us', $data);
                $this->_responseData['message'] = "Thank you for contacting us!";
                $status = 'Data Sent Successfully!';
            } else {
                $this->_responseData['error'] = "Please fill the required data!";
                $status = 'Data Not Sent !';
            }
        } catch (\Exception $e) {
            Log::error("Error sending email: " . $e->getMessage());
            $this->_responseData['error'] = "Something went wrong!";
            $status = 500;
        }

        return redirect()->back()->with('msg', $status);

    }
}
