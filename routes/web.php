<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['auth']], function () {
      
    /************************************Administrador**************************************/
    Route::group(['middleware' => ['role:administrator']], function () {
        
        //Dashboard Administrador
        Route::get('/admin/home', 'Admin\DashboardController@index')->name("admin.home");
        
        //Instituciones
        Route::get('/admin/business', 'Admin\InstitutionController@index')->name("admin.business");

        //Obtener Instituciones
         Route::post('getInstitutions', 'Admin\InstitutionController@getInstitutions');

        //Agregar Institucion
        Route::post('storeBusiness', "Admin\InstitutionController@store")->name("storeBusiness");

        //Actualizar Institucion
        Route::post('updateBusiness', "Admin\InstitutionController@update")->name("updateBusiness");

        //Eliminar Institucion
        Route::post('destroyBusiness', "Admin\InstitutionController@destroy")->name("destroyBusiness");

    });//role:administrator

    /************************************Administrador de Empresa**************************************/
    Route::group(['middleware' => ['role:business_administrator']], function () {

        //Dashboard Administrador de Empresa
        Route::get('/business/home', 'Business\DashboardController@index')->name("business.home");

        //Periodos
        Route::get('/business/period', 'Business\PeriodController@index')->name("business.period");

        //Obtener Periodos
        Route::post('getPeriods', 'Business\PeriodController@getPeriods');

        //Agregar Periodo
        Route::post('storePeriod', "Business\PeriodController@store")->name("storePeriod");

        //Actualizar Periodo
        Route::post('updatePeriod', "Business\PeriodController@update")->name("updatePeriod");

        //Eliminar Periodo
        Route::post('destroyPeriod', "Business\PeriodController@destroy")->name("destroyPeriod");       

    });//role:business_administrator

});//auth

Route::get('/admin/payments', function () {
    return view('admin.payments.index');
})->name("admin.payments");

Route::get('/admin/attorney/create', function () {
    return view('admin.attorney.create');
})->name("admin.attorney.create");;

Route::get('/admin/attorney/list', function () {
    return view('admin.attorney.index');
})->name("admin.attorney.list");

Route::get('/admin/student', function () {
    return view('admin.student.index');
})->name("admin.student");



Route::get('/business/teacher', function () {
    return view('business.teacher.index');
})->name("business.teacher");

Route::get('/business/level', function () {
    return view('business.level.index');
})->name("business.level");

Route::get('/business/section', function () {
    return view('business.section.index');
})->name("business.section");

Route::get('/business/subject', function () {
    return view('business.subject.index');
})->name("business.subject");

Route::get('/business/teacher', function () {
    return view('business.teacher.index');
})->name("business.teacher");

Route::get('/business/timetable/create', function () {
    return view('business.timetable.create');
})->name("schedule.create");

Route::get('/business/timetable', function () {
    return view('business.timetable.index');
})->name("schedule.list");

Route::get('/representative/home', function () {
    return view('representative.dashboard');
})->name("representative.home");

Route::get('/teacher/home', function () {
    return view('teacher.dashboard');
})->name("teacher.home");

Route::get('/teacher/virtualRoom/create', function () {
    return view('teacher.virtualRoom.create');
})->name("teacher.virtualRoom.create");

Route::get('/teacher/virtualRoom/list', function () {
    return view('teacher.virtualRoom.index');
})->name("teacher.virtualRoom.list");

Route::get('/teacher/evaluation/create', function () {
    return view('teacher.evaluation.create');
})->name("teacher.evaluation.create");

Route::get('/teacher/evaluation/list', function () {
    return view('teacher.evaluation.index');
})->name("teacher.evaluation.list");

Route::get('/teacher/annotations/list', function () {
    return view('teacher.annotations.index');
})->name("teacher.annotations.list");

Route::get('/administrative/home', function () {
    return view('administrative.dashboard');
})->name("administrative.home");

Route::get('/administrative/library/create', function () {
    return view('administrative.library.create');
})->name("administrative.library.create");

Route::get('/administrative/library/list', function () {
    return view('administrative.library.index');
})->name("administrative.library.list");

Route::get('/administrative/library/borrowing', function () {
    return view('administrative.library.borrowing');
})->name("administrative.library.borrowing");

Route::get('/administrative/library/reservation', function () {
    return view('administrative.library.reservation');
})->name("administrative.library.reservation");

Route::get('/administrative/finance/list', function () {
    return view('administrative.finance.index');
})->name("administrative.finance.list");
