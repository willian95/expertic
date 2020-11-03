<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use App\Models\UserRole;

class DashboardController extends Controller
{
  public function __construct() {

    $this->middleware('auth');

  }

  public function index() {

    return view('admin.dashboard');

  }// public function index()
  
}
