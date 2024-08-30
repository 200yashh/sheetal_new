<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SettingsController extends Controller
{
    var $_viewData = [];
    var $viewPrefix = "backend.settings.";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->show(null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->save($request, null);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Setting::all();
        $action = route('settings.store');
        $this->_viewData['page_title'] = 'General Settings';
        $settingsData = [];
        foreach ($data as $setting) {
            $settingsData[$setting->name] = $setting->value;
            if (in_array($setting->name, ["testing_emails"])) {
                if(!empty($setting->value)){
                    $settingsData[$setting->name] = explode(";", $settingsData[$setting->name]);
                }
            }
        }
        $this->_viewData['data'] = $settingsData;
        $this->_viewData['action'] = $action;

        return view($this->viewPrefix . 'general_settings', $this->_viewData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return $this->save($request, $id);
    }

    public function save($request, $id)
    {
        $action = "Saved Successfully!";
        $values = Arr::except($request->all(), ['_token', '_method']);
        if(!array_key_exists('testing_emails', $values)){
            $values['testing_emails'] = null;
        }
        foreach ($values as $name => $value) {
            $data = Setting::where('name', $name)->first();
            if (empty($data)) {
                $data = new Setting;
            }
            $data->name = $name;
            if (in_array($name, ["testing_emails"])) {
                if(!empty($value)){
                    $value = implode(";", $value);
                }
            }
            $data->value = $value;
            $data->save();
        }

        return redirect()->back()->with('status', $action);
    }
}
