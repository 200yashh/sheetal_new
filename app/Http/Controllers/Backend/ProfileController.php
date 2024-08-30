<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use DataTables;
use Yajra\DataTables\Html\Builder;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public $_viewPrefix = "backend.profile.";
    public $_viewData = [];

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function edit($id)
    {
        $data = new User();
        $action = route('agents.store');
        $this->_viewData['page_title'] = 'Add User';

        $roles = Helper::getRoles();

        if (!empty($id)) {
            $data = User::findOrFail($id);

            $action = route('agents.update', $id);
            $this->_viewData['page_title'] = 'Edit User';
        }

        $this->_viewData['data'] = $data->toArray();
        $this->_viewData['roles'] = $roles;
        $this->_viewData['action'] = $action;

        return view($this->_viewPrefix . 'manage_profile', $this->_viewData);
    }

    public function update(Request $request, $id)
    {
        return $this->save($request, $id);
    }

    public function save($request, $id)
    {
        $data = User::find($id);
        $action = "Updated Successfully!";
        $oldProfileImg = $data->profile_img ?? "";

        $validator = validator($request->all(), [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'email|required',
            'phone' => 'numeric|required',
            'address' => 'required',
            'state' => 'required',
            'zipcode' => 'numeric|required',
            'country' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $values = Arr::except($request->all(), ['_token', '_method', 'password_confirmation']);
        foreach ($values as $name => $value) {
            if ($name == 'password') {
                $value = Hash::make($value);
            }
            $data->{$name} = $value;
        }

        if ($request->hasFile('profile_img')) {
            if (isset($oldProfileImg)) {
                unlink(public_path('agents/' . $oldProfileImg));
            }

            $image = $request->file('profile_img');
            $name = time() . rand() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('agents');
            $image->move($destinationPath, $name);
            $data->profile_img = $name;
        }
        $data->save();

        return redirect()->back()->with('status', $action);
    }
}
