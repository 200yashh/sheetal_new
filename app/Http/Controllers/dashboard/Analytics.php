<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\AgentPackage;
use App\Models\User;
use Illuminate\Http\Request;

class Analytics extends Controller
{
  public $_viewData = [];

  public function index()
  {
    return redirect()->route('dashboard-redirect');
  }

  public function redirect()
  {
    $this->_viewData['page_title'] = 'Dashboard';
    $this->_viewData['agentCount'] = User::role('agent')->count();
    $this->_viewData['packageCount'] = AgentPackage::join('users', 'users.id', 'agent_packages.agent_id')->count();
    return view('content.dashboard.dashboards-analytics', $this->_viewData);
  }
}
