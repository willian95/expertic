@extends('layouts.main')
@section("content")
<section class="content profile-page" id="virtualRoom">
   <div class="block-header">
      <div class="row">
         <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Listado de Salas Virtuales</h2>
         </div>
         <div class="col-lg-5 col-md-6 col-sm-12">
            <form action="{{ route('teacher.virtualRoom.create') }}" method="get">
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
                              <th class="text-center">Fecha</th>
                              <th class="text-center">Hora Inicio</th>
                              <th class="text-center">Hora Fin</th>
                              <th class="text-center">Año</th>
                              <th class="text-center">Sección</th>
                              <th class="text-center">Asignatura</th>
                              <th class="text-center">Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="text-center">1</td>
                              <td class="text-center">06-10-2020</td>
                              <td class="text-center">07:00 a.m</td>
                              <td class="text-center">09:00 a.m</td>
                              <td class="text-center">1er Año</td>
                              <td class="text-center">A</td>
                              <td class="text-center">Matemática</td>
                              <td class="text-center">
                                 <button class="btn btn-info">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="btn btn-secondary">
                                 <i class="zmdi zmdi-delete"></i>
                                 </button>
                              </td>
                           </tr>
                           <tr>
                              <td class="text-center">2</td>
                              <td class="text-center">06-10-2020</td>
                              <td class="text-center">09:00 a.m</td>
                              <td class="text-center">11:00 a.m</td>
                              <td class="text-center">1er Año</td>
                              <td class="text-center">B</td>
                              <td class="text-center">Matemática</td>
                              <td class="text-center">
                                 <button class="btn btn-info">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="btn btn-secondary">
                                 <i class="zmdi zmdi-delete"></i>
                                 </button>
                              </td>
                           </tr>
                           <tr>
                              <td class="text-center">3</td>
                              <td class="text-center">06-10-2020</td>
                              <td class="text-center">01:00 P.m</td>
                              <td class="text-center">03:00 p.m</td>
                              <td class="text-center">1er Año</td>
                              <td class="text-center">C</td>
                              <td class="text-center">Matemática</td>
                              <td class="text-center">
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
@push("scripts")
<script>
      
</script>
@endpush

