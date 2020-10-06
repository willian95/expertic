@extends('layouts.main')
@section("content")
<section class="content profile-page" id="attorney">
   <div class="custom-modal-cover" v-show="modal">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-md-10">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Registrar Alumno</h5>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="name">Rut Estudiante</label>
                              <input type="text" class="form-control" id="name">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="name">Nombre</label>
                              <input type="text" class="form-control" id="name">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="lastname">Apellido</label>
                              <input type="text" class="form-control" id="lastname">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="lastname">Email</label>
                              <input type="text" class="form-control" id="lastname">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="phone">Teléfono</label>
                              <input type="phone" class="form-control" id="phone">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="exampleFormControlSelect1">Grupo Sanguineo</label>
                              <select class="form-control custom-select  rounded-pill" id="exampleFormControlSelect1">
                                 <option>Seleccione</option>
                                 <option>O-</option>
                                 <option>O+</option>
                                 <option>A−</option>
                                 <option>A+</option>
                                 <option>B−</option>
                                 <option>B+</option>
                                 <option>AB−</option>
                                 <option>AB+</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-12">
                           <div class="form-group">
                              <label for="address">Dirección</label>
                              <input type="text" class="form-control" id="address">
                           </div>
                        </div>
                        <div class="col-12 pb-4 text-justify">
                           <span class="font-weight-normal">Alergías</span><br> 
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                              <label class="form-check-label" for="inlineCheckbox1">Asma</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                              <label class="form-check-label" for="inlineCheckbox2">Rinitis</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
                              <label class="form-check-label" for="inlineCheckbox3">Barbecue</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                              <label class="form-check-label" for="inlineCheckbox3">Dermatitis</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                              <label class="form-check-label" for="inlineCheckbox1">Dermatitis de contacto</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                              <label class="form-check-label" for="inlineCheckbox2">Urticaria</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
                              <label class="form-check-label" for="inlineCheckbox3">Alergia a los alimentos</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                              <label class="form-check-label" for="inlineCheckbox3">Alergia a los medicamentos</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                              <label class="form-check-label" for="inlineCheckbox3">Alergia a las picaduras de insectos</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                              <label class="form-check-label" for="inlineCheckbox3">Anafilaxia</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="toggleModal()">Cerrar</button>
                     <button type="button" class="btn btn-primary" @click="toggleModal()">Crear</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="block-header">
      <div class="row">
         <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Registrar Apoderado</h2>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row clearfix">
         <div class="col-md-12">
            <div class="card student-list">
               <div class="body">
                  <div class="modal-header">
                     <h5 class="modal-title">Registrar Apoderado</h5>
                  </div>
                  <div class="row justify-content-center align-items-center pt-2 pl-4 pr-4 mb-4">
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                           <label for="name">Rut</label>
                           <input type="text" class="form-control" id="name">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                           <label for="name">Nombre</label>
                           <input type="text" class="form-control" id="name">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                           <label for="lastname">Apellido</label>
                           <input type="text" class="form-control" id="lastname">
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="form-group">
                           <label for="address">Dirección</label>
                           <input type="text" class="form-control" id="address">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                           <label for="lastname">Email</label>
                           <input type="text" class="form-control" id="lastname">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                           <label for="phone">Teléfono</label>
                           <input type="phone" class="form-control" id="phone">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                           <label for="password">Clave</label>
                           <input type="text" class="form-control" id="password">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                           <label for="password">Confirmar contraseña</label>
                           <input type="text" class="form-control" id="password">
                        </div>
                     </div>
                     <div class="col-12">
                        <span class="font-weight-normal">Rol</span><br> 
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                           <label class="form-check-label" for="inlineRadio1">Principal</label>
                        </div>
                        <div class="form-check form-check-inline">
                           <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                           <label class="form-check-label" for="inlineRadio2">Visor</label>
                        </div>
                     </div>
                     <div class="col-12">
                        <div class="row mt-4">
                           <div class="col-lg-7 col-md-6 col-sm-12">
                              <h4 class="text-dark">Listado de alumnos</h4>
                           </div>
                           <div class="col-lg-5 col-md-6 col-sm-12">
                              <button class="btn btn-info  btn-icon btn-round float-right m-l-10" type="button" data-toggle="modal" data-target="#businessModal" @click="toggleModal()" title="Registrar alumno">
                              <i class="zmdi zmdi-plus"></i>
                              </button>
                           </div>
                        </div>
                        <div class="row clearfix">
                           <div class="col-md-12">
                              <div class="table-responsive">
                                 <table class="table table-hover m-b-0">
                                    <thead>
                                       <tr>
                                          <th>#</th>
                                          <th>Nombre</th>
                                          <th>Email</th>
                                          <th>Acciones</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>1</td>
                                          <td>Pedro Perez</td>
                                          <td>pperez@gmail.com</td>
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
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-primary">Crear</button>
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
   const business = new Vue({
        el: '#attorney',
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

