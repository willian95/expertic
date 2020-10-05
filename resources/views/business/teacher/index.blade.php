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
                        <div class="col-12 col-md-6 col-lg-6">
                           <div class="form-group">
                              <label for="name">Rut</label>
                              <input type="text" class="form-control" id="name">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                           <div class="form-group">
                              <label for="logo">Logo</label>
                              <input type="file" class="form-control" id="logo">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                           <div class="form-group">
                              <label for="name">Nombre</label>
                              <input type="text" class="form-control" id="name">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                           <div class="form-group">
                              <label for="reason_social">Razón Social</label>
                              <input type="text" class="form-control" id="reason_social">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                           <div class="form-group">
                              <label for="address">Dirección</label>
                              <input type="text" class="form-control" id="address">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                           <div class="form-group">
                              <label for="url_page">Link Página Web</label>
                              <input type="text" class="form-control" id="url_page">
                           </div>
                        </div>
                        <div class="col-12 pb-4">
                           <span class="font-weight-normal">Módulos</span><br> 
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                              <label class="form-check-label" for="inlineCheckbox1">Biblioteca</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                              <label class="form-check-label" for="inlineCheckbox2">Certificados</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
                              <label class="form-check-label" for="inlineCheckbox3">Virtual</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                              <label class="form-check-label" for="inlineCheckbox3">Pago</label>
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
                              <th>Fecha</th>
                              <th>Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td>1</td>
                              <td>Contact</td>
                              <td>Contact@gmail.com</td>
                              <td>12345678</td>
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
                              <td>Contact 2</td>
                              <td>Contact@gmail.com</td>
                              <td>12345678</td>
                              <td>10-06-2020</td>
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
                              <td>Contact 3</td>
                              <td>Contact@gmail.com</td>
                              <td>12345678</td>
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

