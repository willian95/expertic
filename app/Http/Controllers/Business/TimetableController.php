<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
  public function __construct() {

    $this->middleware('auth');

  }

  public function list() {
    
    return view('business.timetable.list');

  }// public function index()

  public function create() {
    
    return view('business.timetable.create');

  }// public function index()
}
