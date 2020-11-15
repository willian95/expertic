<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>:: Expertic ::</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}"/>
{{--<link rel="stylesheet" href="{{ asset('assets/plugins/morrisjs/morris.min.css') }}" />--}}

<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/color_skins.css') }}">
<link href="{{ url('assets/plugins/izitoast/css/iziToast.min.css') }}" rel="stylesheet">
<link href="{{ url('assets/plugins/fontawesome/css/all.css') }}" rel="stylesheet">

<link href="{{ url('assets/css/style.css') }}" rel="stylesheet">
</head>

<body class="theme-blush">
@php
    $role=role();
@endphp
<!-- Page Loader -->
{{--<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="{{ asset('assets/images/logo.svg') }}" width="48" height="48" alt="Oreo"></div>
        <p>Please wait...</p>        
    </div>
</div>--}}
<!-- Overlay For Sidebars -->
<div class="overlay"></div>

<!-- Top Bar -->
<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html"><img src="{{ asset('assets/images/logo.svg') }}" width="30" alt="Oreo"><span class="m-l-10">Expertic</span></a>
            </div>
        </li>
        
        <li style="visibility:hidden">
            <div class="input-group">                
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-addon">
                    <i class="zmdi zmdi-search"></i>
                </span>
            </div>
        </li>        
        <li class="float-right">
            <a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="mega-menu" data-close="true">
                <i class="zmdi zmdi-power"></i>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </a>
        </li>
    </ul>
</nav>
<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <ul class="nav nav-tabs">
        {{--<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dashboard"><i class="zmdi zmdi-home"></i></a></li>--}}
        {{--<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#user">@{{ roleName }}</a></li>--}}
    </ul>
    <div class="tab-content">
        <div class="tab-pane stretchRight active" id="dashboard">
            <div class="menu" style="overflow-y: auto; height:100vh;">
                <ul class="list">
                    <li>
                        <div class="user-info">
                            <div class="image"><a href="profile.html"><img src="{{ asset('assets/images/profile_av.jpg') }}" alt="User"></a></div>
                            <div class="detail">
                                <h4>{{ Auth::user()->name}}</h4>
                                <small>{{$role['role_description']}}</small>
                            </div>
                        </div>
                    </li>
                    <li class="header">MAIN</li>

                    @switch($role['role_name'])

                        @case('administrator')
                            <li class="active open"><a href="{{ route('admin.home') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                            <li class="active open"><a href="{{ route('admin.business') }}"><i class="zmdi zmdi-balance"></i><span>Instituciones</span></a></li>
                            {{--<li  class="active open"><a href="{{ route('admin.payments') }}"><i class="zmdi zmdi-balance"></i><span>Pagos</span></a></li>--}}
                        @break

                        @case('business_administrator')
                            <li v-if="roleId == 2" class="active open"><a href="{{ route('business.home') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                            <li v-if="roleId == 2" class="active open"><a href="{{ route('business.period') }}"><i class="zmdi zmdi-calendar-alt"></i><span>Periodos</span></a></li>
                            <li v-if="roleId == 2" class="active open"><a href="{{ route('business.level') }}"><i class="zmdi zmdi-graduation-cap"></i><span>Niveles</span></a></li>
                            <li v-if="roleId == 2" class="active open"><a href="{{ route('business.section') }}"><i class="zmdi zmdi-sort-asc"></i><span>Secciones</span></a></li>
                            <li v-if="roleId == 2" class="active open"><a href="{{ route('business.subject') }}"><i class="fas fa-book-reader"></i><span>Asignaturas</span></a></li>
                            <li v-if="roleId == 2" class="active open"><a href="{{ route('business.teacher') }}"><i class="fas fa-user-graduate"></i><span>Profesores</span></a></li>
                            <li v-if="roleId == 2"><a onclick="toggleSubmenu('timetable-submenu')" href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled"><i class="fas fa-clock"></i><span>Horarios</span> </a>
                                <ul class="ml-menu submenu-hidden" id="timetable-submenu">
                                    <li><a href="{{ route('business.timetable.create') }}" class=" waves-effect waves-block normal-item">Crear horario</a></li>
                                    <li><a href="{{ route('business.timetable.list') }}" class=" waves-effect waves-block normal-item">Listado de horarios</a></li>
                                </ul>
                            </li>
                            <li v-if="roleId == 2"><a onclick="toggleSubmenu('representative-submenu')" href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled"><i class="fas fa-users"></i><span>Apoderados</span> </a>
                                <ul class="ml-menu submenu-hidden" id="representative-submenu">
                                    <li><a href="{{ route('business.representative.create') }}" class=" waves-effect waves-block normal-item">Registrar Apoderado</a></li>
                                    <li><a href="{{ route('business.representative.list') }}" class=" waves-effect waves-block normal-item">Listado de Apoderados</a></li>
                                </ul>
                            </li>
                            <li v-if="roleId == 2" class="active open"><a href="{{ route('business.student') }}"><i class="zmdi zmdi-accounts-alt"></i><span>Estudiante</span></a></li>
                            <li v-if="roleId == 2"><a onclick="toggleSubmenu('groupStudent-submenu')" href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled"><i class="fas fa-users"></i><span>Grupos Estudiantes</span> </a>
                                <ul class="ml-menu submenu-hidden" id="groupStudent-submenu">
                                    <li><a href="{{ route('business.groupStudent.create') }}" class=" waves-effect waves-block normal-item">Registrar Grupo</a></li>
                                    <li><a href="{{ route('business.groupStudent.list') }}" class=" waves-effect waves-block normal-item">Listado de Grupos</a></li>
                                </ul>
                            </li>
                        @break

                        @case('teacher')
                           {{--<li class="active open"><a href="{{ route('representative.home') }}"><i class="zmdi zmdi-balance"></i><span>Dashboard</span></a></li>
                           <li><a class="menu-toggle waves-effect waves-block toggled"><i class="zmdi zmdi-accounts-outline"></i><span>Estudiantes</span> </a>
                               <ul class="ml-menu" style="display:block">
                                  <li><a href="#" class=" waves-effect waves-block normal-item">Estudiante 1</a></li>
                                  <li><a href="#" class=" waves-effect waves-block normal-item">Estudiante 2</a></li>
                               </ul>
                           </li>--}}
                    
                          <li class="active open"><a href="{{ route('teacher.home') }}"><i class="zmdi zmdi-balance"></i><span>Dashboard</span></a></li>
                          <li><a onclick="toggleSubmenu('virtualRoom-submenu')" href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled"><i class="fas fa-chalkboard-teacher"></i><span>Sala Virtual</span> </a>
                             <ul class="ml-menu submenu-hidden" id="virtualRoom-submenu">
                                 <li><a href="{{ route('teacher.virtualRoom.create') }}" class=" waves-effect waves-block">Registrar Sala Virtual</a></li>
                                 <li><a href="{{ route('teacher.virtualRoom.list') }}" class=" waves-effect waves-block">Listado de Salas Virtuales</a></li>
                             </ul>
                          </li>
                          <li><a onclick="toggleSubmenu('evaluation-submenu')" href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled"><i class="zmdi zmdi-assignment"></i><span>Evaluación</span> </a>
                             <ul class="ml-menu submenu-hidden" id="evaluation-submenu">
                                 <li><a href="{{ route('teacher.evaluation.create') }}" class=" waves-effect waves-block">Crear Evaluación</a></li>
                                 <li><a href="{{ route('teacher.evaluation.list') }}" class=" waves-effect waves-block">Listado de Evaluaciones</a></li>
                             </ul>
                          </li>
                          <li class="active open"><a href="{{ route('teacher.annotations.list') }}"><i class="zmdi zmdi-attachment-alt"></i><span>Anotaciones</span></a></li>
                        @break

                        @case('administrative')
                            <li class="active open"><a href="{{ route('administrative.home') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                            <li><a onclick="toggleSubmenu('library-submenu')" href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled"><i class="zmdi zmdi-library"></i><span>Biblioteca</span> </a>
                                <ul class="ml-menu submenu-hidden" id="library-submenu">
                                    <li><a href="{{ route('administrative.library.create') }}" class=" waves-effect waves-block">Registrar Libro</a></li>
                                    <li><a href="{{ route('administrative.library.list') }}" class=" waves-effect waves-block">Listado de Libros</a></li>
                                    <li><a href="{{ route('administrative.library.borrowing') }}" class=" waves-effect waves-block">Prestamos</a></li>
                                    <li><a href="{{ route('administrative.library.reservation') }}" class=" waves-effect waves-block">Reservaciones</a></li>
                                </ul>
                            </li>
                            <li><a onclick="toggleSubmenu('finance-submenu')" href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled"><i class="zmdi zmdi-money"></i><span>Finanzas</span> </a>
                                <ul class="ml-menu submenu-hidden" id="finance-submenu">
                                    <li><a href="{{ route('administrative.finance.list') }}" class=" waves-effect waves-block">Listado de Pagos</a></li>
                                </ul>
                             </li>
                    @endswitch
                </ul>
            </div>
        </div>
        
    </div>    
</aside>


<!-- Main Content -->

    @yield("content")

<!-- Jquery Core Js --> 
<script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="{{ asset('assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

{{--<script src="{{ asset('assets/bundles/morrisscripts.bundle.js') }}"></script>--}}<!-- Morris Plugin Js -->
<script src="{{ asset('assets/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
<script src="{{ asset('assets/plugins/jvectormap/jquery-jvectormap-us-aea-en.js') }}"></script><!-- USA Map Js -->
<script src="{{ asset('assets/bundles/knob.bundle.js') }}"></script> <!-- Jquery Knob, Count To, Sparkline Js -->

<script src="{{ asset('assets/bundles/mainscripts.bundle.js') }}"></script>
<script src="{{ asset('assets/js/pages/index.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('/assets/plugins/sweetalert/sweetalert2@10.js') }}"></script>
<script src="{{ asset('assets/plugins/izitoast/js/iziToast.min.js') }}"></script>
<script src="{{ asset('assets/plugins/fontawesome/js/all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/vamzfe.js') }}"></script>



<script>

    function toggleSubmenu(id){
        let ele = $("#"+id)
        if(ele.hasClass("submenu-hidden") == true){
            ele.removeClass("submenu-hidden")
            ele.addClass("submenu-show")
        }else{
            ele.removeClass("submenu-show")
            ele.addClass("submenu-hidden")
        }
        //console.log("menu", id, $("#"+id).attr())

    }
    
</script>

@stack("scripts")

</body>
</html>