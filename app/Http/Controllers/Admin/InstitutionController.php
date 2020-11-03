<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Institution;

class InstitutionController extends Controller
{

  public function __construct() {

    $this->middleware('auth');

  }

  public function index() {

    $Module=Module::orderBy('id','DESC')->get(['id','module_name','module_description']);

    return view('admin.business.index')->with('Module',json_encode($Module));

  }// public function index()

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */

  public function store(Request $request)
  {
    
  }

}
