<?php

namespace App\Helpers;

use App\Mail\SendMail;
use App\Models\City;
use App\Models\Country;
use App\Models\Setting;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class Helper
{
    public static function getLogoImg($width = 150, $height = null, $extension = 'png')
    {
        return '<img src="' . asset('assets/img/logo/logo.' . $extension) . '" width="' . $width . '"/>';
    }

    public static function getSettings($name = "all")
    {
        $data = "";
        try {
            $data = Setting::select('*');
            if ($name != "all") {
                $data = $data->where('name', $name)->first();
                $data = $data->value ?? "";
            } else {
                $data = $data->pluck('value', 'name')->toArray();
            }
        } catch (\Exception $e) {
            $data = $name != "all" ? "" : [];
        }
        return $data;
    }

    public static function getDataTablePaginationBtn()
    {
        return "function () {
         $('.paginate_button.previous i').addClass('bx bx-chevron-left');
         $('.paginate_button.next i').addClass('bx bx-chevron-right');
        }";
    }

    public static function getListAddButton($route, $title = 'Add Record', $bootstrap_color = 'primary')
    {
        $html = '';
        if (auth()->user()->hasPermissionTo('admin.' . request()->segment(2) . '.add')) {
            $html =  '<a class="btn rounded btn-' . $bootstrap_color . ' text-white my-3" href="' . $route . '">' . $title . '</a>';
        }

        return $html;
    }

    public static function getFormCancelButton($route, $title = 'Cancel', $bootstrap_color = 'secondary')
    {
        $html =  '<a href="' . $route . '" class="btn btn-outline-' . $bootstrap_color . '">' . $title . '</a>';

        return $html;
    }

    public static function getFormSubmitButton($title = 'Submit', $bootstrap_color = 'primary')
    {
        $html =  '<button type="submit" id="submit" class="btn btn-' . $bootstrap_color . ' me-2">' . $title . '</button>';

        return $html;
    }

    public static function getDismissableAlert($bootstrap_color = 'primary')
    {
        $html = '<div class="alert alert-' . $bootstrap_color . ' alert-dismissible" role="alert">
            ' . session('status') . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

        if (session('status')) {
            return $html;
        }
    }

    public static function getDismissableErrorAlert($errors, $bootstrap_color = 'danger')
    {
        if (!empty($errors->all())) {
            $html = '';
            foreach ($errors->all() as $message) {
                $html .= '<div class="alert alert-' . $bootstrap_color . ' alert-dismissible" role="alert">
                            ' . $message . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>';
            }
            return $html;
        }
    }

    public static function getIcon($route, $type, $title = null)
    {
        if ($type == 'edit') {
            $icon = '<i class="bx bxs-edit"></i>';
        }
        if ($type == 'view') {
            $icon = '<i class="bx bxs-show fs-5"></i>';
        }
        if ($type == 'mail') {
            $icon = '<i class="bx bxs-envelope fs-5"></i>';
        }
        if ($type == 'enable_status') {
            return $icon = '<i class="bx bxs-check-circle text-success fs-4"></i>';
        }
        if ($type == 'disable_status') {
            return $icon = '<i class="bx bx-x-circle text-danger fs-4"></i>';
        }
        if ($type == 'settings') {
            return $icon = '<i class="bx bxs-cog fs-4"></i>';
        }
        if ($type == 'text') {
            return $icon = '<i class="bx bx-text fs-4"></i>';
        }
        $html = '';
        if ($type == 'edit') {
            if (auth()->user()->hasPermissionTo('admin.' . request()->segment(2) . '.edit')) {
                $html = '<a href="' . $route . '" title="' . $title . '">' . $icon . '</a>';
            }
        } else {
            $html = '<a href="' . $route . '" title="' . $title . '">' . $icon . '</a>';
        }

        return $html;
    }

    public static function getDeleteIcon($onclick = "actionDelete(this)", $type = null, $title = "Delete")
    {
        $dataAttribute = '';

        if ($type == 'enable') {
            $dataAttribute = 'enable';
            $icon = '<i class="bx bx-check text-info fs-3"></i>';
        }
        if ($type == 'disable') {
            $dataAttribute = 'disable';
            $icon = '<i class="bx bx-x text-danger fs-3"></i>';
        }
        if ($type == 'restore') {
            $icon = '<i class="bx bx-reset text-success fs-5"></i>';
        }
        if (!isset($type)) {
            $icon = '<i class="bx bxs-trash text-danger fs-5"></i>';
        }

        $html = '';
        if (empty($type) && auth()->user()->hasPermissionTo('admin.' . request()->segment(2) . '.delete')) {
            $html = '<a href="javascript:;" onclick="' . $onclick . '" title="' . $title . '">' . $icon . '</a>';
        }

        if (!empty($type)) {
            $html = '<a href="javascript:;" onclick="' . $onclick . '" title="' . $title . '" data-type="' . $dataAttribute . '">' . $icon . '</a>';
        }

        return $html;
    }

    public static function getBadges($color = 'success', $text = 'Active')
    {
        $html = '<span class="badge rounded-pill bg-label-' . $color . '">' . $text . '</span>';

        return $html;
    }

    public static function getDarkBadges($color = 'success', $text = 'Active')
    {
        $html = '<span class="badge rounded-pill bg-' . $color . '">' . $text . '</span>';

        return $html;
    }

    // public static function getCurrentUserInfo($column = 'first_name')
    // {
    //     $role = User::select('users.*', 'roles.name AS role')
    //         ->join('roles', 'users.role_id', 'roles.id')
    //         ->where('users.id', auth()->user()->id)
    //         ->first();

    //     return $role->$column ?? "";
    // }

    public static function getRoles()
    {
        $role = Role::pluck('name', 'id')->toArray();
        return $role;
    }

    public static function getAllMenus()
    {
        $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
        $verticalMenuData = json_decode($verticalMenuJson, true);

        $allMenus = [];

        foreach ($verticalMenuData['menu'] as $item) {
            if (isset($item['submenu'])) {
                $submenu = collect($item['submenu'])->pluck('name', 'slug')->toArray();
                $allMenus = array_merge($allMenus, $submenu);
            } else {
                $allMenus[$item['slug']] = $item['name'];
            }
        }

        return $allMenus;
    }

    public static function isRole($role)
    {
        return auth()->user()->hasRole($role);
    }

    public static function getPlaceList($type, $key = 'id')
    {
        if ($type == 'country') {
            $query = Country::query();
        } elseif ($type == 'state') {
            $query = State::query();
        } else {
            $query = City::query();
        }

        return $query->where('status', 1)->orderBy('name')->pluck('name', $key)->toArray();
    }

    public static function getSuperAdminEmail()
    {
        return User::role('superadmin')
            ->where('is_active', 1)
            ->pluck('email')->toArray();
    }

    public static function sendMail(array|string $to, string $subject, string $view, array $data, array|string $cc = null, $attachments = null)
    {
        $email_test = !empty(self::getSettings('testing_emails')) ? self::getSettings('testing_emails') : env('EMAIL_TEST');
        if (!empty($email_test)) {
            $to = $email_test;
            $cc = null;
        }

        if (is_string($to)) {
            $to = explode(',', $to);
        }

        if (isset($attachments) && !empty($attachments) && is_string($attachments)) {
            $attachments = [$attachments];
        }

        try {
            if (isset($cc) && !empty($cc)) {
                Mail::to($to)->cc($cc)->send(new SendMail($subject, $view, $data, $attachments ?? []));
            } else {
                Mail::to($to)->send(new SendMail($subject, $view, $data, $attachments ?? []));
            }
        } catch (\Exception $e) {
            Log::error("Error sending email: " . $e->getMessage());
        }
    }
}
