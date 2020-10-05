@extends('layouts.main')
@section("content")
<section class="content profile-page" id="teacher">
   <div class="custom-modal-cover" v-show="modal">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-md-10">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Profesores</h5>
                  </div>
                  <div class="modal-body">
                     <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="name">Rut</label>
                              <input type="text" class="form-control" id="name">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="name">Nombres</label>
                              <input type="text" class="form-control" id="name">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="lastname">Apellidos</label>
                              <input type="text" class="form-control" id="lastname">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" id="email">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="password">Contraseña</label>
                              <input type="text" class="form-control" id="password">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="url_page">Verificar Contraseña</label>
                              <input type="text" class="form-control" id="url_page">
                           </div>
                        </div>
                        <div class="col-12 pb-4 text-justify">
                           <span class="font-weight-normal">Asignaturas</span><br> 
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                              <label class="form-check-label" for="inlineCheckbox1">Lengua y Comunicación.</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                              <label class="form-check-label" for="inlineCheckbox2">Matemáticas.</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
                              <label class="form-check-label" for="inlineCheckbox3">Historia</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                              <label class="form-check-label" for="inlineCheckbox3">Geografía</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                              <label class="form-check-label" for="inlineCheckbox1">Lengua y Comunicación.</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                              <label class="form-check-label" for="inlineCheckbox2">Física</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
                              <label class="form-check-label" for="inlineCheckbox3">Química</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                              <label class="form-check-label" for="inlineCheckbox3">Biología</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                              <label class="form-check-label" for="inlineCheckbox3">Inglés</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                              <label class="form-check-label" for="inlineCheckbox3">Educación Física</label>
                           </div>
                        </div>
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
            <h2>Profesores</h2>
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
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>Pedro Perez</td>
                              <td>pperez@gmail.com</td>
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
                              <td>María Hernandez</td>
                              <td>mhernamdez@gmail.com</td>
                              <td>12345678</td>
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
                              <td>Carol Ramos</td>
                              <td>cramos@gmail.com</td>
                              <td>12345678</td>
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
       el: '#teacher',
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

