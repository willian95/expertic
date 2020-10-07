@extends('layouts.main')
@section("content")
<section class="content profile-page" id="evaluation">
   <div class="custom-modal-cover" v-show="modal">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-md-10">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title mt-3">Calificar</h5>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-12">
                              <div class="table-responsive">
                                 <table class="table table-hover m-b-0">
                                    <thead>
                                       <tr>
                                          <th class="text-center">#</th>
                                          <th>Nombre</th>
                                          <th>Email</th>
                                          <th class="text-center" style="width:10%;">Calificación</th>
                                          <th class="text-center">Acción</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td class="text-center">1</td>
                                          <td>Pedro Perez</td>
                                          <td >pperez@gmail.com</td>
                                          <td class="text-center">
                                              <input class="form-control text-center" type="text">
                                          </td>
                                          <td class="text-center">
                                             <button type="button" class="btn btn-info">Calificar</button>                  
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="text-center">2</td>
                                          <td>María Hernandez</td>
                                          <td>mhernamdez@gmail.com</td>
                                          <td class="text-center">
                                            <p>
                                              <input class="form-control text-center" type="text">
                                            </p>                                          
                                          </td>
                                          <td class="text-center">
                                             <button type="button" class="btn btn-info">Calificar</button>                  
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="text-center">3</td>
                                          <td>Carol Ramos</td>
                                          <td>cramos@gmail.com</td>
                                          <td class="text-center">
                                            <p>
                                              <input class="form-control text-center" type="text">
                                            </p>                                          
                                          </td>
                                          <td class="text-center">
                                             <button type="button" class="btn btn-info">Calificar</button>                  
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                        </div>
                        <div class="col-12 mb-5">
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer text-right">
                    <p class="w-100">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="toggleModal()">Cerrar</button>                  
                    </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="block-header">
      <div class="row">
         <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Listado de Evaluaciones</h2>
         </div>
         <div class="col-lg-5 col-md-6 col-sm-12">
            <form action="{{ route('teacher.evaluation.create') }}" method="get">
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
                                 <button class="btn btn-warning" title="Calificar" @click="toggleModal">
                                 <i class="zmdi zmdi-assignment"></i>
                                 </button>
                                 <button class="btn btn-info" title="Editar">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="btn btn-secondary" title="Borrar">
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
                                 <button class="btn btn-warning" title="Calificar" @click="toggleModal">
                                 <i class="zmdi zmdi-assignment"></i>
                                 </button>
                                 <button class="btn btn-info" title="Editar">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="btn btn-secondary" title="Borrar">
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
                                 <button class="btn btn-warning" title="Calificar" @click="toggleModal">
                                 <i class="zmdi zmdi-assignment"></i>
                                 </button>
                                 <button class="btn btn-info" title="Editar">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="btn btn-secondary" title="Borrar">
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
        el: '#evaluation',
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

