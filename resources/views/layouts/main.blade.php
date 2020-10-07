
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
</head>

<body class="theme-blush">
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
            
            <a href="{{ url('/') }}" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a>
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
                                <h4>@{{ name }}</h4>
                                <small>@{{ roleName }}</small>
                            </div>
                        </div>
                    </li>
                    <li class="header">MAIN</li>
                    
                    <li v-if="roleId == 1" class="active open"><a href="{{ route('admin.home') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                    <li v-if="roleId == 1" class="active open"><a href="{{ route('admin.business') }}"><i class="zmdi zmdi-balance"></i><span>Instituciones</span></a></li>
                    {{--<li v-if="roleId == 1" class="active open"><a href="{{ route('admin.payments') }}"><i class="zmdi zmdi-balance"></i><span>Pagos</span></a></li>--}}

                    <li v-if="roleId == 2" class="active open"><a href="{{ route('business.home') }}"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                    <li v-if="roleId == 2" class="active open"><a href="{{ route('business.level') }}"><i class="zmdi zmdi-home"></i><span>Niveles</span></a></li>
                    <li v-if="roleId == 2" class="active open"><a href="{{ route('business.section') }}"><i class="zmdi zmdi-home"></i><span>Secciones</span></a></li>
                    <li v-if="roleId == 2" class="active open"><a href="{{ route('business.subject') }}"><i class="zmdi zmdi-home"></i><span>Asignaturas</span></a></li>
                    <li v-if="roleId == 2" class="active open"><a href="{{ route('business.teacher') }}"><i class="zmdi zmdi-male-alt"></i><span>Profesores</span></a></li>
                    <li v-if="roleId == 2"><a onclick="toggleSubmenu('schedule-submenu')" href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled"><i class="zmdi zmdi-accounts-outline"></i><span>Horarios</span> </a>
                        <ul class="ml-menu submenu-hidden" id="schedule-submenu">
                            <li><a href="{{ route('schedule.create') }}" class=" waves-effect waves-block">Crear horario</a></li>
                            <li><a href="{{ route('schedule.list') }}" class=" waves-effect waves-block">Listado de horarios</a></li>
                        </ul>
                    </li>
                    <li v-if="roleId == 2"><a onclick="toggleSubmenu('attorney-submenu')" href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled"><i class="zmdi zmdi-male-female"></i><span>Apoderados</span> </a>
                        <ul class="ml-menu submenu-hidden" id="attorney-submenu">
                            <li><a href="{{ url('admin/attorney/create') }}" class=" waves-effect waves-block">Registrar Apoderado</a></li>
                            <li><a href="{{ url('admin/attorney/list') }}" class=" waves-effect waves-block">Listado de Apoderados</a></li>
                        </ul>
                    </li>
                    <li v-if="roleId == 2" class="active open"><a href="{{ route('admin.student') }}"><i class="zmdi zmdi-accounts-alt"></i><span>Estudiante</span></a></li>


                    {{--<li v-if="roleId == 3" class="active open"><a href="{{ route('representative.home') }}"><i class="zmdi zmdi-balance"></i><span>Dashboard</span></a></li>
                    <li v-if="roleId == 3"><a class="menu-toggle waves-effect waves-block toggled"><i class="zmdi zmdi-accounts-outline"></i><span>Estudiantes</span> </a>
                        <ul class="ml-menu" style="display:block">
                            <li><a href="#" class=" waves-effect waves-block">Estudiante 1</a></li>
                            <li><a href="#" class=" waves-effect waves-block">Estudiante 2</a></li>
                        </ul>
                    </li>--}}
                    
                   <li v-if="roleId == 3" class="active open"><a href="{{ route('teacher.home') }}"><i class="zmdi zmdi-balance"></i><span>Dashboard</span></a></li>
                   <li v-if="roleId == 3"><a onclick="toggleSubmenu('virtualRoom-submenu')" href="javascript:void(0);" class="menu-toggle waves-effect waves-block toggled"><i class="zmdi zmdi-laptop-mac"></i><span>Sala Virtual</span> </a>
                        <ul class="ml-menu submenu-hidden" id="virtualRoom-submenu">
                            <li><a href="{{ route('teacher.virtualRoom.create') }}" class=" waves-effect waves-block">Registrar Sala Virtual</a></li>
                            <li><a href="{{ route('teacher.virtualRoom.list') }}" class=" waves-effect waves-block">Listado de Salas Virtuales</a></li>
                        </ul>
                    </li>
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
        
    const sidebar = new Vue({
        el: '#leftsidebar',
        data(){
            return{
                name:"",
                roleId:"",
                roleName:""
            }
        },
        methods:{

        },
        mounted(){
            
            this.name = window.localStorage.getItem("expertic_username")
            this.roleId = window.localStorage.getItem("expertic_role_id")
            this.roleName = window.localStorage.getItem("expertic_role_name")

        }

    })

</script>

@stack("scripts")

</body>
</html>