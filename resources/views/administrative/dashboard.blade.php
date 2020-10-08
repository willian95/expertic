@extends("layouts.main")
@section("content")
<section class="content home" id="home">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>Dashboard
                <small>Bienvenido</small>
                </h2>
            </div>            
        </div>
    </div>
    <div class="container-fluid">
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
                </div>
         
                <div class="row">
                    <div class="card student-list col-lg-6">
                        <div class="header">
                            <h2>Profesores</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Asignatura</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td><span class="list-name">1</span></td>
                                            <td><span class="list-name">Profesor 1</span></td>
                                            <td><span class="list-name">Matemática, Química</span></td>
                                            <td>
                                                <button class="btn btn-info"><i class="zmdi zmdi-edit"></i></button>
                                                <button class="btn btn-secondary"><i class="zmdi zmdi-delete"></i></button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="list-name">2</span></td>
                                            <td><span class="list-name">Profesor 2</span></td>
                                            <td><span class="list-name">Lenguaje</span></td>
                                            <td>
                                                <button class="btn btn-info"><i class="zmdi zmdi-edit"></i></button>
                                                <button class="btn btn-secondary"><i class="zmdi zmdi-delete"></i></button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="list-name">3</span></td>
                                            <td><span class="list-name">Profesor 3</span></td>
                                            <td><span class="list-name">Inglés, Física</span></td>
                                            <td>
                                                <button class="btn btn-info"><i class="zmdi zmdi-edit"></i></button>
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
                            <h2>Estudiantes</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Grado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="list-name">1</span></td>
                                            <td><span class="list-name">Estudiante 1</span></td>
                                            <td><span class="list-name">4to Grado</span></td>
                                            <td>
                                                <button class="btn btn-info"><i class="zmdi zmdi-edit"></i></button>
                                                <button class="btn btn-secondary"><i class="zmdi zmdi-delete"></i></button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="list-name">2</span></td>
                                            <td><span class="list-name">Estudiante 2</span></td>
                                            <td><span class="list-name">3er Grado</span></td>
                                            <td>
                                                <button class="btn btn-info"><i class="zmdi zmdi-edit"></i></button>
                                                <button class="btn btn-secondary"><i class="zmdi zmdi-delete"></i></button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="list-name">3</span></td>
                                            <td><span class="list-name">Estudiante 3</span></td>
                                            <td><span class="list-name">4to Grado</span></td>
                                            <td>
                                                <button class="btn btn-info"><i class="zmdi zmdi-edit"></i></button>
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
                            <h2>Niveles</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Grado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="list-name">1</span></td>
                                            <td><span class="list-name">1er Grado</span></td>
                                            <td>
                                                <button class="btn btn-info"><i class="zmdi zmdi-edit"></i></button>
                                                <button class="btn btn-secondary"><i class="zmdi zmdi-delete"></i></button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="list-name">2</span></td>
                                            <td><span class="list-name">2do Grado</span></td>
                                            <td>
                                                <button class="btn btn-info"><i class="zmdi zmdi-edit"></i></button>
                                                <button class="btn btn-secondary"><i class="zmdi zmdi-delete"></i></button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="list-name">3</span></td>
                                            <td><span class="list-name">3er Grado</span></td>
                                            <td>
                                                <button class="btn btn-info"><i class="zmdi zmdi-edit"></i></button>
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
                            <h2>Secciones</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sección</th>
                                            <th>Nivel</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><span class="list-name">1</span></td>
                                            <td><span class="list-name">Sección A</span></td>
                                            <td><span class="list-name">1er Grado</span></td>
                                            <td>
                                                <button class="btn btn-info"><i class="zmdi zmdi-edit"></i></button>
                                                <button class="btn btn-secondary"><i class="zmdi zmdi-delete"></i></button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="list-name">2</span></td>
                                            <td><span class="list-name">Sección C</span></td>
                                            <td><span class="list-name">2do Grado</span></td>
                                            <td>
                                                <button class="btn btn-info"><i class="zmdi zmdi-edit"></i></button>
                                                <button class="btn btn-secondary"><i class="zmdi zmdi-delete"></i></button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td><span class="list-name">3</span></td>
                                            <td><span class="list-name">Sección B</span></td>
                                            <td><span class="list-name">3er Grado</span></td>
                                            <td>
                                                <button class="btn btn-info"><i class="zmdi zmdi-edit"></i></button>
                                                <button class="btn btn-secondary"><i class="zmdi zmdi-delete"></i></button>
                                            </td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
         
            </div>
        
        </div> 
        
        <!-- Level Modal -->
        <div class="custom-modal-cover" v-show="levelModal">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-12">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Niveles</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="toggleModal('levelModal')">Cerrar</button>
                                <button type="button" class="btn btn-primary">Crear</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Section Modal -->
        <div class="custom-modal-cover" v-show="sectionModal">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 col-md-12">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Secciones</h5>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="toggleModal('sectionModal')">Cerrar</button>
                                <button type="button" class="btn btn-primary">Crear</button>
                            </div>
                        </div>
                    </div>

                </div>

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
                    levelModal:false,
                    sectionModal:false,
                }
            },
            methods:{

                toggleModal(type){

                    //if(type == "levelModal"){

                    //}else if(type == "")

                }

            }

        })

            
    </script>

@endpush