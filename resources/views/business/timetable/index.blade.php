@extends('layouts.main')

@section("content")

    <section style="z-index: 1100;" class="content profile-page" id="timetable">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Horarios</h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                   <form action="{{ url('/business/timetable/create') }}" method="get">
                        <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="submit">
                          <i class="zmdi zmdi-plus"></i>
                       </button>
                   </form>
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
                                            <th class="text-center">#</th>
                                            <th class="text-center">Grado</th>
                                            <th class="text-center">Sección</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="(tt,index) in timetables">
                                            <td class="text-center">@{{index+1}}</td>
                                            <td class="text-center">@{{tt.yearName}}</td>
                                            <td class="text-center">@{{tt.sectionName}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-info">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="btn btn-secondary" @click="destroy(index)">
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
   const timetable = new Vue({
       el: '#timetable',
       data:{

           timetables:[],

       },
       mounted(){

           this.timetables= jQuery.parseJSON(window.localStorage.getItem("timetables"))
       },
       methods:{
   
          destroy(index){
   
              Swal.fire({
                   title: 'Estas seguro',
                   text: "¡No podrás revertir esto!",
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: '¡Sí, bórralo!'
               }).then((result) => {
                   if (result.isConfirmed) {
                       Swal.fire(
                           'Eliminado!',
                           'Su registro ha sido eliminado.',
                           'success'
                       )
                       this.timetables.splice(index, 1);
                       window.localStorage.setItem("timetables", JSON.stringify(this.timetables))

                   }
               });
   
          },//dedestroylete()
   
       },
   
   })
   
       
</script>
@endpush
