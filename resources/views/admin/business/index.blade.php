@extends('layouts.main')

@section("content")

    <section class="content profile-page" id="business">

        <div class="custom-modal-cover" v-show="modal">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-12">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Instituciones</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-control" id="logo">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="toggleModal()">Cerrar</button>
                                <button type="button" class="btn btn-primary">Crear</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Instituciones</h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button" data-toggle="modal" data-target="#businessModal" @click="toggleModal()">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card student-list">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>                                       
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Clave</th>
                                            <th>Fecha</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Contact</td>
                                            <td>Contact@gmail.com</td>
                                            <td>12345678</td>
                                            <td>13-04-2020</td>
                                            <td>
                                                <button class="btn btn-info" @click="toggleModal()">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="btn btn-secondary">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>Contact 2</td>
                                            <td>Contact@gmail.com</td>
                                            <td>12345678</td>
                                            <td>10-06-2020</td>
                                            <td>
                                                <button class="btn btn-info" @click="toggleModal()">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="btn btn-secondary">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td>Contact 3</td>
                                            <td>Contact@gmail.com</td>
                                            <td>12345678</td>
                                            <td>13-04-2020</td>
                                            <td>
                                                <button class="btn btn-info" @click="toggleModal()">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="btn btn-secondary">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">                            
                            <ul class="pagination pagination-primary m-b-0">
                                <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                                <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-right"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push("scripts")

    <script>
        
        const business = new Vue({
            el: '#business',
            data(){
                return{
                    modal:false
                }
            },
            methods:{

                toggleModal(){

                    if(this.modal){
                        this.modal = false
                    }else{
                        this.modal = true
                    }

                }

            },

        })

            
    </script>

@endpush