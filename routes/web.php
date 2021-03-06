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

    /************************************Seguridad**************************************/
    //Dashboard Administrador
    Route::get('/security/changePassword', 'Security\SecurityController@ViewChangePassword')->name("security.changePassword");

    //Actualizar contraseña
    Route::post('ChangePassword', "Security\SecurityController@ChangePassword")->name("ChangePassword");

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

        //CRUD PERIODOS
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
        
        //CRUD NIVELES
        //Niveles
        Route::get('/business/level', 'Business\LevelController@index')->name("business.level");

        //Obtener Niveles
        Route::post('getLevels', 'Business\LevelController@getLevels');

        //Agregar Nivel
        Route::post('storeLevel', "Business\LevelController@store")->name("storeLevel");

        //Actualizar Nivel
        Route::post('updateLevel', "Business\LevelController@update")->name("updateLevel");

        //Eliminar Nivel
        Route::post('destroyLevel', "Business\LevelController@destroy")->name("destroyLevel");  

        //CRUD SECCIONES
        //Secciones
        Route::get('/business/section', 'Business\SectionController@index')->name("business.section");

        //Obtener Secciones
        Route::post('getSections', 'Business\SectionController@getSections');

        //Agregar Sección
        Route::post('storeSection', "Business\SectionController@store")->name("storeSection");

        //Actualizar Sección
        Route::post('updateSection', "Business\SectionController@update")->name("updateSection");

        //Eliminar Sección
        Route::post('destroySection', "Business\SectionController@destroy")->name("destroySection"); 

        //CRUD ASIGNATURAS
        //Asignaturas
        Route::get('/business/subject', 'Business\SubjectController@index')->name("business.subject");

        //Obtener Asignaturas
        Route::post('getSubjects', 'Business\SubjectController@getSubjects');

        //Agregar Asignatura
        Route::post('storeSubject', "Business\SubjectController@store")->name("storeSubject");

        //Actualizar Asignatura
        Route::post('updateSubject', "Business\SubjectController@update")->name("updateSubject");

        //Eliminar Asignatura
        Route::post('destroySubject', "Business\SubjectController@destroy")->name("destroySubject"); 

        //CRUD PROFESORES
        //Profesores
        Route::get('/business/teacher', 'Business\TeacherController@index')->name("business.teacher");

        //Obtener Profesores
        Route::post('getTeachers', 'Business\TeacherController@getTeachers');

        //Obtener Profesores
        Route::get('getTeachersJson', 'Business\TeacherController@getTeachersJson');

        //Agregar Profesor
        Route::post('storeTeacher', "Business\TeacherController@store")->name("storeTeacher");

        //Actualizar Profesor
        Route::post('updateTeacher', "Business\TeacherController@update")->name("updateTeacher");

        //Eliminar Profesor
        Route::post('destroyTeacher', "Business\TeacherController@destroy")->name("destroyTeacher"); 

        //CRUD APODERADOS
        //Vista de registro de Apoderados
        Route::get('/business/representative/create', 'Business\RepresentativeController@create')->name("business.representative.create");

        //Agregar Apoderado Visor
        Route::post('storeViewfinder', 'Business\RepresentativeController@storeViewfinder')->name("storeViewfinder");

        //Agregar Estudiante
        Route::post('storeRepresentativeStudent', 'Business\RepresentativeController@storeStudent')->name("storeRepresentativeStudent");

        //Listado de Apoderados
        Route::get('/business/representative/list', 'Business\RepresentativeController@show')->name("business.representative.list");

        //Agregar Apoderado
        Route::post('storeRepresentative', 'Business\RepresentativeController@store')->name("storeRepresentative");

        //Obtener Apoderados Principales
        Route::post('getRepresentatives', 'Business\RepresentativeController@getRepresentatives')->name("getRepresentatives");

        //Vista de actuzalizacion de Apoderados
        Route::get('/business/representative/update/{id}', 'Business\RepresentativeController@update')->name("business.representative.update");

        //Eliminar Apoderado Principal
        Route::post('destroyRepresentative', "Business\RepresentativeController@destroy")->name("destroyRepresentative");

        //Actualizar Apoderado Principal
        Route::post('updateRepresentativeLeading', "Business\RepresentativeController@updateRepresentativeLeading")->name("updateRepresentativeLeading"); 

        //Obtener Apoderados Principales JSON (recibe como parametro el id del apoderado)
        Route::post('getRepresentatives2', 'Business\RepresentativeController@getRepresentatives2')->name("getRepresentatives2");

        //Agregar Apoderado Visor 
        Route::post('StoreRepresentativeViewfinder', 'Business\RepresentativeController@StoreRepresentativeViewfinder')->name("StoreRepresentativeViewfinder");
 
        //Actualizar Apoderado Visor
        Route::post('UpdateRepresentativeViewfinder', 'Business\RepresentativeController@UpdateRepresentativeViewfinder')->name("UpdateRepresentativeViewfinder");

        //CRUD ESTUDIANTES
        //Estudiantes
        Route::get('/business/student', 'Business\StudentController@index')->name("business.student");
        
        //Busscar apoderado por rut
        Route::post('SearchRepresentative', "Business\StudentController@SearchRepresentative")->name("SearchRepresentative");

        //Obtener Estudiantes
        Route::post('getStudents', 'Business\StudentController@getStudents');

        //Agregar Estudiante
        Route::post('storeStudent', "Business\StudentController@store")->name("storeStudent");

        //Actualizar Profesor
        Route::post('updateStudent', "Business\StudentController@update")->name("updateStudent");

        //Eliminar Estudiante
        Route::post('destroyStudent', "Business\StudentController@destroy")->name("destroyStudent"); 

        //CRUD HORARIOS
        //Vista de registro de horarios
        Route::get('/business/timetable/create', 'Business\TimetableController@create')->name("business.timetable.create");

        //Listado de horarios
        Route::get('/business/timetable/list', 'Business\TimetableController@list')->name("business.timetable.list");

        //Listado de asignaturas por profesor seleccionado parametro id del profesor
        Route::post('getMattersTimetable', 'Business\TimetableController@getMattersTimetable')->name("getMattersTimetable");

        //Chequear Horario (Se verifica si existe ya un horario creado para el mismo periodo)
        Route::post('checkTimetable', 'Business\TimetableController@checkTimetable')->name("checkTimetable");

        //Agregar Horario
        Route::post('StoreTimeTable', 'Business\TimetableController@StoreTimeTable')->name("StoreTimeTable");

        //Obtener Horarios
        Route::post('getTimeTables', 'Business\TimetableController@getTimeTables');

        //Eliminar Horario
        Route::post('destroyTimeTables', "Business\TimetableController@destroy")->name("TimeTables"); 

        //Vista de actuzalizacion de Horario
        Route::get('/business/timetable/update/{id}', 'Business\TimetableController@update')->name("business.timetable.update");

        //Obtener Horario
        Route::post('getTimeTable', 'Business\TimetableController@getTimeTable');

        //Eliminar Asignación
        Route::post('deleteAssignment', "Business\TimetableController@deleteAssignment")->name("deleteAssignment"); 

        //Realizar asiganción en hora
        Route::post('makeAssignment', "Business\TimetableController@makeAssignment")->name("makeAssignment"); 

        //CRUD GRUPOS DE DE ESTUDIANTES
        //Vista de asignación a grupos
        Route::get('/business/groupStudent/create', 'Business\GroupStudentController@create')->name("business.groupStudent.create");

        //Vista de asignación a grupos
        Route::get('/business/groupStudent/list', 'Business\GroupStudentController@list')->name("business.groupStudent.list");

        //Buscar Estudiante
        Route::post('SearchStudent', 'Business\GroupStudentController@SearchStudent')->name("SearchStudent");

        //Chequear Grupo
        Route::post('CheckGroup', 'Business\GroupStudentController@CheckGroup')->name("CheckGroup");

        //Agregar Grupo de Estudiantes
        Route::post('StoreGroupStudent', 'Business\GroupStudentController@store')->name("StoreGroupStudent");

        //Listado de grupos de estudiantes
        Route::post('getGroupStudents', 'Business\GroupStudentController@getGroupStudents')->name("getGroupStudents");

        //Eliminar Grupo de Estudisntes
        Route::post('deleteGroupStudents', "Business\GroupStudentController@destroy")->name("deleteGroupStudents"); 

        //Vista de actuzalizar grupos
        Route::get('/business/groupStudent/update/{id}', 'Business\GroupStudentController@update')->name("business.groupStudent.update");

        //Agregar Estudiante a grupo
        Route::post('AddStudentGroup', 'Business\GroupStudentController@AddStudentGroup')->name("AddStudentGroup");   

        //Listado de grupos de estudiantes
        Route::post('getGroupStudents2', 'Business\GroupStudentController@getGroupStudents2')->name("getGroupStudents2");

        //Eliminar Estudiante
        Route::post('deleteStudent', "Business\GroupStudentController@destroy2")->name("deleteStudent"); 
        
    });//role:business_administrator

    //Obetener Niveles deacuerdo al periodo selecionado
    Route::post('/business/groupStudent/getLevels', "Business\GroupStudentController@getLevels")->name("business.groupStudent.getLevels"); 

    //Obetener Secciones deacuerdo al periodo y nivel selecionado
    Route::post('/business/groupStudent/getSections', "Business\GroupStudentController@getSections")->name("business.groupStudent.getSections"); 

    //Obetener Estudiantes deacuerdo al periodo, nivel, y sección selecionada
    Route::post('/business/groupStudent/getStudents', "Business\GroupStudentController@getStudents")->name("business.groupStudent.getStudents"); 
        
    /************************************Profesor**************************************/
    Route::group(['middleware' => ['role:teacher']], function () {  
        
        //Dashboard Profesor
        Route::get('/teacher/home', 'Teacher\DashboardController@index')->name("teacher.home");

        //CRUD ANOTACIONES
        //Anotaciones
        Route::get('/teacher/annotations/list', 'Teacher\AnnotationController@index')->name("teacher.annotation.list");
    
        //Agregar anotación
        Route::post("StoreAnnotation", 'Teacher\AnnotationController@store')->name("StoreAnnotation");

        //Listado de anotaciones
        Route::post("getAnnotations", 'Teacher\AnnotationController@getAnnotations')->name("getAnnotations");

        //Actualizar Anotacion
        Route::post("updateAnnotation", 'Teacher\AnnotationController@update')->name("updateAnnotation");

        //Eliminar Anotacion
        Route::post("destroyAnnotation", 'Teacher\AnnotationController@destroy')->name("destroyAnnotation");

        //CRUD PLAN DE ESTUDIO
        //Planes de estudio
        Route::get('/teacher/studyPlan/list', 'Teacher\StudyPlanController@index')->name("teacher.studyPlan.list");
    
        //Agregar Plan de estudio
        Route::post("StoreStudyPlan", 'Teacher\StudyPlanController@store')->name("StoreStudyPlan");

        //Listado de Planes
        Route::post("getStudyPlans", 'Teacher\StudyPlanController@getStudyPlans')->name("getStudyPlans");

        //Actualizar Plan
        Route::post("updateStudyPlan", 'Teacher\StudyPlanController@update')->name("updateStudyPlan");

        //Eliminar Plan
        Route::post("destroyStudyPlan", 'Teacher\StudyPlanController@destroy')->name("destroyStudyPlan");      
        
        //CRUD EVALUACION
        //Evaluaciones
        Route::get('/teacher/evaluation/list', 'Teacher\EvaluationController@index')->name("teacher.evaluation.list");

        //Formulario crear evaluación
        Route::get('/teacher/evaluation/create', 'Teacher\EvaluationController@create')->name("teacher.evaluation.create");

        //Formulario Actualizar evaluación
        Route::get('/teacher/evaluation/update/{id}', 'Teacher\EvaluationController@updateF')->name("teacher.evaluation.update");
    
        //Agregar Evaluación
        Route::post("StoreEvaluation", 'Teacher\EvaluationController@store')->name("StoreEvaluation");

        //Listado de Evaluaciones
        Route::post("getEvaluations", 'Teacher\EvaluationController@getEvaluations')->name("getEvaluations");

        //Actualizar Evaluación
        Route::post("updateEvaluation", 'Teacher\EvaluationController@update')->name("updateEvaluation");

        //Eliminar Evaluación
        Route::post("destroyEvaluation", 'Teacher\EvaluationController@destroy')->name("destroyEvaluation");   

        //Calificar
        Route::post("StoreQualify", 'Teacher\EvaluationController@StoreQualify')->name("StoreQualify"); 
        
    });//role:teacher

});//auth

Route::get('/admin/payments', function () {
    return view('admin.payments.index');
})->name("admin.payments");

Route::get('/representative/home', function () {
    return view('representative.dashboard');
})->name("representative.home");

Route::get('/teacher/virtualRoom/create', function () {
    return view('teacher.virtualRoom.create');
})->name("teacher.virtualRoom.create");

Route::get('/teacher/virtualRoom/list', function () {
    return view('teacher.virtualRoom.index');
})->name("teacher.virtualRoom.list");

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
