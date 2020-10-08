@extends('layouts.main')
@section("content")
<section class="content profile-page" id="borrowing">
   <div class="custom-modal-cover" v-show="modal">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-md-10">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title mt-3">Registrar Reservación</h5>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="name">Buscar Libro</label>
                              <div class="input-group mb-3">
                                 <input type="text" class="form-control" placeholder="Ingrese el código del libro" aria-describedby="basic-addon2">
                                 <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2" style="border-bottom-right-radius: 20px; border-top-right-radius: 20px;" title="Buscar">
                                    <i class="zmdi zmdi-search"></i>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-8">
                           <div class="form-group">
                              <label for="name">Titulo del Libro</label>
                              <input type="text" class="form-control" id="name" value="Don Quijote" readonly>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="name">Buscar Profesor / Estudiante</label>
                              <div class="input-group mb-3">
                                 <input type="text" class="form-control" placeholder="Ingrese el rut del libro" aria-describedby="basic-addon2">
                                 <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2" style="border-bottom-right-radius: 20px; border-top-right-radius: 20px;" title="Buscar">
                                    <i class="zmdi zmdi-search"></i>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-8">
                           <div class="form-group">
                              <label for="name">Nombre</label>
                              <input type="text" class="form-control" id="name" value="Diana Rojas" readonly>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="date">Fecha de Inicio</label>
                              <input type="date" class="form-control" id="name">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="date">Fecha de Fin</label>
                              <input type="date" class="form-control" id="name">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="toggleModal()">Cerrar</button>                  
                     <button type="button" class="btn btn-info" @click="toggleModal()">Reservar</button>                  
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="block-header">
      <div class="row">
         <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Listado de Reservaciones</h2>
         </div>
         <div class="col-lg-5 col-md-6 col-sm-12">
               <button class="btn btn-white btn-icon btn-round float-right m-l-10" @click="toggleModal()">
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
                              <th class="text-center">Código</th>
                              <th class="text-center">ISBN</th>
                              <th class="text-center">Título</th>
                              <th class="text-center">Autor</th>
                              <th class="text-center">Fecha Inicio</th>
                              <th class="text-center">Fecha Fin</th>
                              <th class="text-center">Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="text-center">5-001</td>
                              <td class="text-center">978-3-16-148410-0</td>
                              <td class="text-center">Seguridad Informatica</td>
                              <td class="text-center">Juan Carlos Soto</td>
                              <td class="text-center">24-11-2020</td>
                              <td class="text-center">26-11-2020</td>
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
                              <td class="text-center">6-071</td>
                              <td class="text-center">8408058215</td>
                              <td class="text-center">DON QUIJOTE DE LA MANCHA</td>
                              <td class="text-center">Miguel De Cervantes Saavedra</td>
                              <td class="text-center">10-10-2020</td>
                              <td class="text-center">13-10-2020</td>
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
                              <td class="text-center">7-051</td>
                              <td class="text-center">978-3-16-148410-0</td>
                              <td class="text-center">Obras completas, tomo I:: Don Quijote </td>
                              <td class="text-center">Cervantes Saavedra, Miguel de</td>
                              <td class="text-center">01-12-2020</td>
                              <td class="text-center">13-12-2020</td>
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
@push("scripts")
<script>
   const business = new Vue({
        el: '#borrowing',
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

