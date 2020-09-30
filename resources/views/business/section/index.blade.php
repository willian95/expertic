@extends("layouts.main")

@section("content")

    <section class="content profile-page">

        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Secciones</h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button" data-toggle="modal" data-target="#businessModal">
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
                                            <th>Nivel</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Sección A</td>
                                            <td>
                                                <button class="btn btn-info">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="btn btn-secondary">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>2</td>
                                            <td>Sección B</td>
                                            <td>
                                                <button class="btn btn-info">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="btn btn-secondary">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>3</td>
                                            <td>Sección C</td>
                                            <td>
                                                <button class="btn btn-info">
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