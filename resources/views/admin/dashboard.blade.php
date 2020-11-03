@extends("layouts.main")

@section("content")
<section class="content home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Dashboard
                <small>Welcome to Oreo</small>
                </h2>
            </div>            
        </div>
    </div>
    <div class="container-fluid" id="home">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6">
                        <div class="card top_counter">
                            <div class="body">
                                <div class="icon xl-slategray"><i class="zmdi zmdi-account-o"></i> </div>
                                <div class="content">
                                    <div class="text">Estudiantes</div>
                                    <h5 class="number count-to" data-from="0" data-to="2049" data-speed="2500" data-fresh-interval="700">2049</h5>
                                </div>
                            </div>                    
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card top_counter">
                            <div class="body">
                                <div class="icon xl-slategray"><i class="zmdi zmdi-account-circle"></i> </div>
                                <div class="content">
                                    <div class="text">Profesores</div>
                                    <h5 class="number count-to" data-from="0" data-to="39" data-speed="4000" data-fresh-interval="700">39</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card top_counter">
                            <div class="body">
                                <div class="icon xl-slategray"><i class="zmdi zmdi-label"></i> </div>
                                <div class="content">
                                    <div class="text">Apoderados</div>
                                    <h5 class="number count-to" data-from="0" data-to="798" data-speed="3000" data-fresh-interval="700">798</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card top_counter">
                            <div class="body">
                                <div class="icon xl-slategray"><i class="zmdi zmdi-graduation-cap"></i> </div>
                                <div class="content">
                                    <div class="text">Instituciones</div>
                                    <h5 class="number count-to" data-from="0" data-to="43" data-speed="2500" data-fresh-interval="700">43</h5>
                                </div>
                            </div>                    
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card top_counter">
                            <div class="body">
                                <div class="icon xl-slategray"><i class="zmdi zmdi-balance-wallet"></i> </div>
                                <div class="content">
                                    <div class="text">Clases</div>
                                    <h5 class="m-b-0"><span class="number count-to" data-from="0" data-to="2154" data-speed="2500" data-fresh-interval="700">2154</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card top_counter">
                            <div class="body">
                                <div class="icon xl-slategray"><i class="zmdi zmdi-balance"></i> </div>
                                <div class="content">
                                    <div class="text">Servicios</div>
                                    <h5 class="m-b-0"><span class="number count-to" data-from="0" data-to="5478" data-speed="2500" data-fresh-interval="700">5478</span></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         
                <div class="row">
                    <div class="card student-list col-lg-6">
                        <div class="header">
                            <h2>Empresas</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="list-name">1</span></td>
                                            <td><span class="list-name">Contact</span></td>
                                            <td>
                                                <button class="btn btn-info" @click="toggleModal()"><i class="zmdi zmdi-edit"></i></button>
                                                <button class="btn btn-secondary"><i class="zmdi zmdi-delete"></i></button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="list-name">2</span></td>
                                            <td><span class="list-name">Contact 2</span></td>
                                            <td>
                                                <button class="btn btn-info" @click="toggleModal()"><i class="zmdi zmdi-edit"></i></button>
                                                <button class="btn btn-secondary"><i class="zmdi zmdi-delete"></i></button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="list-name">2</span></td>
                                            <td><span class="list-name">Contact 3</span></td>
                                            <td>
                                                <button class="btn btn-info" @click="toggleModal()"><i class="zmdi zmdi-edit"></i></button>
                                                <button class="btn btn-secondary"><i class="zmdi zmdi-delete"></i></button>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card student-list col-lg-6">
                        <div class="header">
                            <h2>Pagos</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Monto</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="list-name">1</span></td>
                                            <td><span class="list-name">$ 45.670</span></td>
                                            <td><span class="list-name">12-05-2020</span></td>
                                        </tr>

                                        <tr>
                                            <td><span class="list-name">2</span></td>
                                            <td><span class="list-name">$ 30.410</span></td>
                                            <td><span class="list-name">17-06-2020</span></td>
                                        </tr>

                                        <tr>
                                            <td><span class="list-name">3</span></td>
                                            <td><span class="list-name">$ 10.680</span></td>
                                            <td><span class="list-name">25-06-2020</span></td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                {{--<div class="custom-modal-cover" v-show="modal">

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

                </div>--}}
         
            </div>
        
        </div>        
    </div>
</section>

@endsection

@push("scripts")

    <script>
        
        const home = new Vue({
            el: '#home',
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

            }

        })

            
    </script>

@endpush