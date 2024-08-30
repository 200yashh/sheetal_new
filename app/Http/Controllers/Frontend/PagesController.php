<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public $_viewData = [];

    public function index()
    {
        return $this->getPage('index');
    }

    //Catches all pages
    public function getPage($page = null)
    {
        if($page == 'index'){
            $cityData = User::role('agent')
            ->select('aa.b_city', 'aa.user_id')
            ->join('agents_address AS aa', 'users.id', 'aa.user_id')
            ->where('users.is_active', 1)
            ->whereNotNull('aa.b_city')
            ->groupBy('aa.b_city', 'aa.user_id')
            ->pluck('aa.b_city', 'aa.user_id')
            ->toArray();

            $this->_viewData['cityData'] = $cityData;
        }
        return view('frontend/' . $page, $this->_viewData);
    }
}
