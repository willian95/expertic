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
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-6">
                        <div class="card top_counter">
                            <div class="body">
                                <div class="icon xl-slategray"><i class="zmdi zmdi-account-o"></i> </div>
                                <div class="content">
                                    <div class="text">Estudiante 1</div>
                                </div>
                            </div>                    
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card top_counter">
                            <div class="body">
                                <div class="icon xl-slategray"><i class="zmdi zmdi-account-circle"></i> </div>
                                <div class="content">
                                    <div class="text">Estudiante 2</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         
            </div>
        
        </div>        
    </div>
</section>

@endsection