@extends('layouts.auth')

@section('content')
    <div class="login_admin " id="dev-login">

        <div class="row">
            <div class="login100-more mask col-md-6"
                style="background-image: url('https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80');">
                <p>Expertic</p>
            </div>
            <div class="login100-form validate-form col-md-6">
                {{--<span class="login100-form-title p-b-43">
                    <img class="logo-admin" src="https://imgfz.com/i/0tkLDsf.png" alt="">
                </span>--}}


                <div class="wrap-input100 validate-input">
                    <input class="input100" type="text" v-model="email" id="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Email</span>
                </div>


                <div class="wrap-input100 validate-input">
                    <input class="input100" type="password" v-model="password" id="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100">Password</span>
                </div>


                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" onclick="signIn()" type="button">
                        Entrar
                    </button>
                </div>

            </div>


        </div>

    </div>
@endsection

@push("scripts")

    <script>
        function signIn(){

            let email = $("#email").val()
            let password = $("#password").val()

            if(email == "admin@gmail.com" && password == "12345678"){

                window.localStorage.setItem("expertic_username", "Usuario 1")
                window.localStorage.setItem("expertic_email", "admin@gmail.com")
                window.localStorage.setItem("expertic_role_id", "1")
                window.localStorage.setItem("expertic_role_name", "Admin")

                window.location.href="{{ url('/admin/home') }}"

            }

            else if(email == "businessadmin@gmail.com" && password == "12345678"){

                window.localStorage.setItem("expertic_username", "Usuario 2")
                window.localStorage.setItem("expertic_email", "businessadmin@gmail.com")
                window.localStorage.setItem("expertic_role_id", "2")
                window.localStorage.setItem("expertic_role_name", "Admin de Empresa")

                window.location.href="{{ url('/business/home') }}"

            }

            else if(email == "apoderado@gmail.com" && password == "12345678"){

                window.localStorage.setItem("expertic_username", "Usuario 3")
                window.localStorage.setItem("expertic_email", "profesor@gmail.com")
                window.localStorage.setItem("expertic_role_id", "3")
                window.localStorage.setItem("expertic_role_name", "Profesor")

                window.location.href="{{ url('/representative/home') }}"

            }

            else if(email == "apoderado@gmail.com" && password == "12345678"){

                window.localStorage.setItem("expertic_username", "Usuario 4")
                window.localStorage.setItem("expertic_email", "apoderado@gmail.com")
                window.localStorage.setItem("expertic_role_id", "4")
                window.localStorage.setItem("expertic_role_name", "Apoderado")

            }

            else if(email == "estudiante@gmail.com" && password == "12345678"){

                window.localStorage.setItem("expertic_username", "Usuario 5")
                window.localStorage.setItem("expertic_email", "estudiante@gmail.com")
                window.localStorage.setItem("expertic_role_id", "5")
                window.localStorage.setItem("expertic_role_name", "Estudiante")

            }


        }
    </script>

@endpush