@extends('layouts.main')
@section("content")
<section class="content profile-page" id="library">
   <div class="block-header">
      <div class="row">
         <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Listado de Libros Registrados</h2>
         </div>
         <div class="col-lg-5 col-md-6 col-sm-12">
            <form action="{{ route('administrative.library.create') }}" method="get">
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
                              <th class="text-center">Código</th>
                              <th class="text-center">ISBN</th>
                              <th class="text-center">Título</th>
                              <th class="text-center">Autor</th>
                              <th class="text-center">Año de Publicación</th>
                              <th class="text-center">Disponible</th>
                              <th class="text-center">Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="text-center">5-001</td>
                              <td class="text-center">978-3-16-148410-0</td>
                              <td class="text-center">Seguridad Informatica</td>
                              <td class="text-center">Juan Carlos Soto</td>
                              <td class="text-center">2019</td>
                              <td class="text-center">Disponible</td>
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
                              <td class="text-center">6-071</td>
                              <td class="text-center">8408058215</td>
                              <td class="text-center">DON QUIJOTE DE LA MANCHA</td>
                              <td class="text-center">Miguel De Cervantes Saavedra</td>
                              <td class="text-center">2005</td>
                              <td class="text-center">Disponible</td>
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
                              <td class="text-center">7-051</td>
                              <td class="text-center">978-3-16-148410-0</td>
                              <td class="text-center"> Obras completas, tomo I:: Don Quijote </td>
                              <td class="text-center">Cervantes Saavedra, Miguel de</td>
                              <td class="text-center">2003</td>
                              <td class="text-center">Disponible</td>
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

