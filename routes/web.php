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

Route::get("/", function(){
    return view("login");
});

Route::get('/admin/home', function () {
    return view('admin.dashboard');
})->name("admin.home");

Route::get('/admin/business', function () {
    return view('admin.business.index');
})->name("admin.business");


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

Route::get('/business/home', function () {
    return view('business.dashboard');
})->name("business.home");

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
})->name("teacher.virtualRoom.create");;

Route::get('/teacher/virtualRoom/list', function () {
    return view('teacher.virtualRoom.index');
})->name("teacher.virtualRoom.list");