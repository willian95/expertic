@extends('layouts.main')
@section("content")
<section class="content profile-page" id="business">
  <div class="preloader" v-if="loading">
    <svg class="loader" width="200" height="200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-ripple" style="background:0 0">
      <circle cx="50" cy="50" r="4.719" fill="none" stroke="#1d3f72" stroke-width="2">
        <animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="3" keySplines="0 0.2 0.8 1" begin="-1.5s" repeatCount="indefinite"/>
        <animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="3" keySplines="0.2 0 0.8 1" begin="-1.5s" repeatCount="indefinite"/>
      </circle>
      <circle cx="50" cy="50" r="27.591" fill="none" stroke="#5699d2" stroke-width="2">
        <animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="3" keySplines="0 0.2 0.8 1" begin="0s" repeatCount="indefinite"/>
        <animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="3" keySplines="0.2 0 0.8 1" begin="0s" repeatCount="indefinite"/>
      </circle>
    </svg>
  </div>
  <div class="custom-modal-cover  hide-modal mb-4" id="modal2">
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-12 col-lg-10 col-md-10">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Registrar Apoderado Visor</h5>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="viewfinder_rut">Rut</label>
                    <input type="text" class="form-control" v-model="representative.rut" id="viewfinder_rut" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.rut') }">
                    <small v-if="errors.hasOwnProperty('representative.rut')" class="text-danger ml-2">@{{ errors['representative.rut'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="viewfinder_representative_name">Nombre</label>
                    <input type="text" class="form-control"  v-model="representative.representative_name" id="viewfinder_representative_name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.representative_name') }">
                    <small v-if="errors.hasOwnProperty('representative.representative_name')" class="text-danger ml-2">@{{ errors['representative.representative_name'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="viewfinder_representative_lastname">Apellido</label>
                    <input type="text" class="form-control" v-model="representative.representative_lastname" id="viewfinder_representative_lastname" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.representative_lastname') }">
                    <small v-if="errors.hasOwnProperty('representative.representative_lastname')" class="text-danger ml-2">@{{ errors['representative.representative_lastname'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-8 col-lg-8">
                  <div class="form-group">
                    <label for="viewfinder_address">Dirección</label>
                    <input type="text" v-model="representative.address" class="form-control" id="viewfinder_address" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.address') }">
                    <small v-if="errors.hasOwnProperty('representative.address')" class="text-danger ml-2">@{{ errors['representative.address'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                  <div class="form-group">
                    <label for="viewfinder_email">Email</label>
                    <input type="email" v-model="representative.email" class="form-control" id="viewfinder_email" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.email') }">
                    <small v-if="errors.hasOwnProperty('representative.email')" class="text-danger ml-2">@{{ errors['representative.email'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="viewfinder_phone">Teléfono</label>
                    <input type="viewfinder_phone"  onKeyPress="return soloNumeros(event)" v-model="representative.phone" class="form-control" id="phone" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.phone') }" maxlength="12">
                    <small v-if="errors.hasOwnProperty('representative.phone')" class="text-danger ml-2">@{{ errors['representative.phone'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="viewfinder_password">Contraseña</label>
                    <input type="password" v-model="representative.password" class="form-control" id="viewfinder_password"  v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.password') }">
                    <small v-if="errors.hasOwnProperty('representative.password')" class="text-danger ml-2">@{{ errors['representative.password'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="viewfinder_password_confirmation">Verificar Contraseña</label>
                    <input type="password" v-model="representative.password_confirmation" class="form-control" id="viewfinder_password_confirmation" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.password_confirmation') }">
                    <small v-if="errors.hasOwnProperty('representative.password_confirmation')" class="text-danger ml-2">@{{ errors['representative.password_confirmation'][0] }}</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal2()">Cerrar</button>
              <button type="button" class="btn btn-primary" @click="addViewfinder(0)" v-if="change==0">Agregar</button>
              <button type="button" class="btn btn-primary" @click="update(1)" v-if="change==1">Modificar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="custom-modal-cover  hide-modal" id="modal">
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
                    <input type="text" class="form-control" v-model="student.rut" id="student_rut" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.rut'),  'is-invalid':error_rut }">
                    <small v-if="errors.hasOwnProperty('student.rut')" class="text-danger ml-2">@{{ errors['student.rut'][0] }}</small>
                    <small v-if="error_rut!=''" class="text-danger ml-2">@{{error_rut }}</small>                              
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="student_name">Nombre</label>
                    <input type="text" class="form-control" v-model="student.student_name" id="student_name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.student_name') }">
                    <small v-if="errors.hasOwnProperty('student.student_name')" class="text-danger ml-2">@{{ errors['student.student_name'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="student_lastname">Apellido</label>
                    <input type="text" class="form-control" v-model="student.student_lastname" id="student_lastname" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.student_lastname') }">
                    <small v-if="errors.hasOwnProperty('student.student_lastname')" class="text-danger ml-2">@{{ errors['student.student_lastname'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="phone"  onKeyPress="return soloNumeros(event)" v-model="student.phone" class="form-control" id="student_phone" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.phone') }" maxlength="12">
                    <small v-if="errors.hasOwnProperty('student.phone')" class="text-danger ml-2">@{{ errors['student.phone'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" class="form-control" id="student_address"  v-model="student.address" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.address') }">
                    <small v-if="errors.hasOwnProperty('student.address')" class="text-danger ml-2">@{{ errors['student.address'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" v-model="student.email" class="form-control" id="email" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.email') ,  'is-invalid':error_email  }">
                    <small v-if="errors.hasOwnProperty('student.email')" class="text-danger ml-2">@{{ errors['student.email'][0] }}</small>
                    <small v-if="error_email!=''" class="text-danger ml-2">@{{error_email}}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="student_password">Contraseña</label>
                    <input type="password" v-model="student.password" class="form-control" id="student_password"  v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.password') }">
                    <small v-if="errors.hasOwnProperty('student.password')" class="text-danger ml-2">@{{ errors['student.password'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="password_confirmation">Verificar Contraseña</label>
                    <input type="password" v-model="student.password_confirmation" class="form-control" id="student_password_confirmation" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.password_confirmation') }">
                    <small v-if="errors.hasOwnProperty('student.password_confirmation')" class="text-danger ml-2">@{{ errors['student.password_confirmation'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="blood_type">Grupo Sanguineo</label>
                    <select class="form-control custom-select  ounded-pill" v-model="student.blood_type" id="blood_type" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.blood_type') }">
                      <option value="">Seleccione</option>
                      <option value="O-">O-</option>
                      <option value="O+">O+</option>
                      <option value="A−">A−</option>
                      <option value="A+">A+</option>
                      <option value="B−">B−</option>
                      <option value="B+">B+</option>
                      <option value="AB−">AB−</option>
                      <option value="AB+">AB+</option>
                    </select>
                    <small v-if="errors.hasOwnProperty('student.blood_type')" class="text-danger ml-2">@{{ errors['student.blood_type'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 pb-4 text-justify">
                  <div class="form-group">
                    <label for="allergies">Alergias</label>
                    <textarea  class="form-control border rounded" name="allergies" v-model="student.allergies" id="allergies" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('allergies') }" cols="3" rows="2"></textarea>
                    <small v-if="errors.hasOwnProperty('student.allergies')" class="text-danger ml-2">@{{ errors['student.allergies'][0] }}</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal()">Cerrar</button>
              <button type="button" class="btn btn-primary" @click="validateStudent(1)" v-if="change==0">Agregar</button>
              <button type="button" class="btn btn-primary" @click="update(2)" v-if="change==1">Modificar</button>
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
            <div class="row align-items-center pt-2 pl-4 pr-4 mb-4">
              <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="rut">Rut</label>
                  <input type="text" class="form-control" v-model="rut" id="rut" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('rut') }">
                  <small v-if="errors.hasOwnProperty('rut')" class="text-danger ml-2">@{{ errors['rut'][0] }}</small>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="representative_name">Nombre</label>
                  <input type="text" class="form-control" v-model="representative_name" id="representative_name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative_name') }">
                  <small v-if="errors.hasOwnProperty('representative_name')" class="text-danger ml-2">@{{ errors['representative_name'][0] }}</small>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="representative_lastname">Apellido</label>
                  <input type="text" class="form-control" v-model="representative_lastname"  id="representative_lastname" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative_lastname') }">
                  <small v-if="errors.hasOwnProperty('representative_lastname')" class="text-danger ml-2">@{{ errors['representative_lastname'][0] }}</small>
                </div>
              </div>
              <div class="col-12 col-md-8 col-lg-8">
                <div class="form-group">
                  <label for="address">Dirección</label>
                  <input type="text" class="form-control" v-model="address" id="address" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('address') }">
                  <small v-if="errors.hasOwnProperty('address')" class="text-danger ml-2">@{{ errors['address'][0] }}</small>
                </div>
              </div>
              <div class="col-12 col-md-4 col-lg-4">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" v-model="email" class="form-control" id="email" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('email') }">
                  <small v-if="errors.hasOwnProperty('email')" class="text-danger ml-2">@{{ errors['email'][0] }}</small>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="phone">Teléfono</label>
                  <input type="phone" onKeyPress="return soloNumeros(event)" v-model="phone" class="form-control" id="phone" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('phone') }" maxlength="12">
                  <small v-if="errors.hasOwnProperty('phone')" class="text-danger ml-2">@{{ errors['phone'][0] }}</small>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="password">Contraseña</label>
                  <input type="password" v-model="password" class="form-control" id="password"  v-bind:class="{ 'is-invalid': errors.hasOwnProperty('password') }">
                  <small v-if="errors.hasOwnProperty('password')" class="text-danger ml-2">@{{ errors['password'][0] }}</small>
                  <small v-if="errors.hasOwnProperty('data.password')" class="text-danger ml-2">@{{ errors['data.password'][0] }}</small>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="password_confirmation">Verificar Contraseña</label>
                  <input type="password" v-model="password_confirmation" class="form-control" id="password_confirmation" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('password_confirmation') }">
                  <small v-if="errors.hasOwnProperty('password_confirmation')" class="text-danger ml-2">@{{ errors['password_confirmation'][0] }}</small>
                  <small v-if="errors.hasOwnProperty('data.password_confirmation')" class="text-danger ml-2">@{{ errors['data.password_confirmation'][0] }}</small>
                </div>
              </div>
              <div class="col-12">
                <div class="row mt-4">
                  <div class="col-lg-7 col-md-6 col-sm-12">
                    <h5 class="text-dark">Apoderado Visor</h5>
                  </div>
                  <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-info  btn-icon btn-round float-right m-l-10" type="button"  @click="toggleModal2()" title="Registrar Apoderado Visor" v-if="viewfinders.length==0">
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
                            <th class="adjust-tr-5">#</th>
                            <th class="adjust-tr-10">Rut</th>
                            <th class="adjust-tr-10">Nombre</th>
                            <th class="adjust-tr-10">Apellido</th>
                            <th class="adjust-tr-10">Email</th>
                            <th class="adjust-tr-5">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr  v-for="(viewf,index) in viewfinders">
                            <td>
                              <p>@{{index+1}}</p>
                            </td>
                            <td>
                              <p>@{{viewf.rut}}</p>
                            </td>
                            <td>
                              <p>@{{viewf.representative_name}}</p>
                            </td>
                            <td>
                              <p>@{{viewf.representative_lastname}}</p>
                            </td>
                            <td>
                              <p>@{{viewf.email}}</p>
                            </td>
                            <td>
                              <button class="btn btn-info" @click="captureRecord(index,viewf,1)">
                              <i class="zmdi zmdi-edit"></i>
                              </button>
                              <button class="btn btn-secondary" @click="removeRepresentative(index)">
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
              <div class="col-12">
                <div class="row mt-4">
                  <div class="col-lg-7 col-md-6 col-sm-12">
                    <h5 class="text-dark">Alumnos</h5>
                  </div>
                  <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-info  btn-icon btn-round float-right m-l-10" type="button"  @click="toggleModal()" title="Registrar alumno">
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
                            <th class="adjust-tr-5">#</th>
                            <th class="adjust-tr-10">Rut</th>
                            <th class="adjust-tr-10">Nombre</th>
                            <th class="adjust-tr-10">Apellido</th>
                            <th class="adjust-tr-10">Email</th>
                            <th class="adjust-tr-5">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr  v-for="(stud,index) in students">
                            <td>
                              <p>@{{index+1}}</p>
                            </td>
                            <td>
                              <p>@{{stud.rut}}</p>
                            </td>
                            <td>
                              <p>@{{stud.student_name}}</p>
                            </td>
                            <td>
                              <p>@{{stud.student_lastname}}</p>
                            </td>
                            <td>
                              <p>@{{stud.email}}</p>
                            </td>
                            <td>
                              <button class="btn btn-info" @click="captureRecord(index,stud,2)">
                              <i class="zmdi zmdi-edit"></i>
                              </button>
                              <button class="btn btn-secondary" @click="removeStudent(index)">
                              <i class="zmdi zmdi-delete"></i>
                              </button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <small v-if="errors.hasOwnProperty('students')" class="text-danger">@{{ errors['students'][0] }}</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary"  @click="register()" title="Crear">Crear</button>
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
     
      el: '#business',
  
      data:{
  
           loading:false,
  
           modal:false,
  
           errors:[],
     
           rut:'',
  
           representative_name:'',
  
           representative_lastname:'',
  
           address:'',
  
           phone:'',
  
           leading:1,
  
           email:'',
  
           password:'',
  
           password_confirmation:'',
  
           representative:{
  
           rut:'',
  
           representative_name:'',
  
           representative_lastname:'',
  
           address:'',
  
           phone:'',
  
           leading:0,
  
           email:'',
  
           password:'',
  
           password_confirmation:'',
  
           },
  
           viewfinders:[],
  
           student:{
  
                    rut:'',
  
                    student_name:'',
  
                    student_lastname:'',
  
                    blood_type:'',
  
                    phone:'',
  
                    allergies:'',
  
                    address:'',
  
                    email:'',
  
                    password:'',
  
                    password_confirmation:'',
           },
  
           error_rut:'',
  
           error_email:'',
  
           students:[],
  
           id:'',

           change:0,
  
      },
      mounted(){   
      },
      methods:{
  
        toggleModal(){
  
           document.getElementById("modal").classList.remove("hide-modal");
  
           document.getElementById("modal").classList.add("show-modal");
  
        },//toggleModal()
  
        closeModal(){
                 
              document.getElementById("modal").classList.add("hide-modal");
  
              document.getElementById("modal").classList.remove("show-modal");
  
          },//closeModal()
  
           toggleModal2(){
  
              document.getElementById("modal2").classList.remove("hide-modal");
  
              document.getElementById("modal2").classList.add("show-modal");
  
              this.clearStudent();
  
          },//toggleModal2()
  
           closeModal2(){
                 
              document.getElementById("modal2").classList.add("hide-modal");
  
              document.getElementById("modal2").classList.remove("show-modal");
  
              this.clearViewfinder();
  
          },//closeModal2()
  
        clearViewfinder(){
  
           this.representative={
  
                                 rut:'',
  
                                 representative_name:'',
  
                                 representative_lastname:'',
  
                                 address:'',
  
                                 phone:'',
  
                                 leading:0,
  
                                 email:'',
  
                                 password:'',
  
                                 password_confirmation:'',
  
                              };
  
           this.errors = [];
  
           this.id='';

           this.change=0;
  
        },//clearViewfinder()
  
        async addViewfinder(op){
           
           let self = this;
  
           self.loading = true;
  
           self.errors = [];
  
           axios.post('{{ url("storeViewfinder") }}', {
  
              representative:self.representative,
  
           }).then(function (response) {
  
              if(response.data.success==true){

                 if(op==1){

                    self.viewfinders.splice(self.id, 1 );

                 }//if(op==1)
  
                 self.viewfinders.push(self.representative);
  
                 self.clearViewfinder();
  
                 self.closeModal2();
  
                 self.loading = false;
  
                 Swal.fire('Información','Registro Agregado Satisfactoriamente','success');
  
              }//if(response.data.success==true)
              else{       
  
                 iziToast.error({title: 'Error',position:'topRight',message: response.data.msg}); 
  
              }//else if(response.data.success==false)
  
           }).catch(err => {
  
              self.loading = false;
  
              self.errors = err.response.data.errors;
  
              if(self.errors){
  
                 iziToast.error({title: 'Error',position:'topRight',message: "Hay algunos campos que debes revisar"});  
             
              }else{
  
                 iziToast.error({title: 'Error',position:'topRight',message: "Ha ocurrido un problema"}); 
  
              }
              
           }); 
  
        },//addViewfinder() 
  
        removeRepresentative(index){
  
           let self = this;
  
           self.loading = true;
  
           self.errors = [];
  
           Swal.fire({title: 'Estas seguro?',text: "No podrás revertir esto!",icon: 'warning',showCancelButton: true,confirmButtonColor: '#3085d6',cancelButtonColor: '#d33',confirmButtonText: 'Si, bórralo!',cancelButtonText: 'Cancelar'}).then((result) => {
           
              if (result.isConfirmed) {
  
                 self.viewfinders.splice(index, 1 );
  
                  Swal.fire('Eliminado!','El registro ha sido eliminado.','success');
  
              }
  
              self.loading = false;
  
           })
              
        },//removeStudent(index)  
  
        validateStudent(op){
  
           let self = this; 
  
           let error_msj;
  
           this.error_rut='';
  
           this.error_email='';
  
           let win=0;

           let i=0;
  
           for (let value of this.students) {
  
              if(self.student.rut==value.rut){

                 if((this.id!=i && op == 2) || (op == 1)){

                     this.error_rut="El campo rut ya se encuentra agregado";
  
                     win=1;

                 }//if((this.id!=i && op ==2) || (op==1))
                 
              }//if(student.rut==value.rut)
  
              if(self.student.email==value.email){

                 if((this.id!=i && op ==2) || (op==1)){

                     this.error_email="El campo email ya se encuentra agregado";
  
                     win=1;

                 }//if((this.id!=i && op ==2) || (op==1))
                  
              }//if(student.email==value.email)

              i=i+1;
           }  
  
           this.addStudent(op);      
  
        },//validateStudent()  
  
        async addStudent(op){
           
           let self = this;
  
           self.loading = true;
  
           self.errors = [];
  
           axios.post('{{ url("storeRepresentativeStudent") }}', {
  
              student:self.student,
  
           }).then(function (response) {
  
              if(response.data.success==true){

                 if(op==1){

                     self.students.push(self.student);

                 }else{

                     self.students[self.id].rut=self.student.rut;
  
                     self.students[self.id].student_name=self.student.student_name;
  
                     self.students[self.id].student_lastname=self.student.student_lastname;
  
                     self.students[self.id].blood_type=self.student.blood_type;
  
                     self.students[self.id].phone=self.student.phone;
  
                     self.students[self.id].allergies=self.student.allergies;
  
                     self.students[self.id].address=self.student.address;
  
                     self.students[self.id].email=self.student.email;
  
                     self.students[self.id].password=self.student.password;
  
                     self.students[self.id].password_confirmation=self.student.password_confirmation;

                 }//else if(op==1)
  
  
                 self.clearStudent();
  
                 self.closeModal();
  
                 self.loading = false;
  
                 Swal.fire('Información','Registro Agregado Satisfactoriamente','success');
  
              }//if(response.data.success==true)
              else{       
  
                 iziToast.error({title: 'Error',position:'topRight',message: response.data.msg}); 
  
              }//else if(response.data.success==false)
  
           }).catch(err => {
  
              self.loading = false;
  
              self.errors = err.response.data.errors;
  
              if(self.errors){
  
                 iziToast.error({title: 'Error',position:'topRight',message: "Hay algunos campos que debes revisar"});  
             
              }else{
  
                 iziToast.error({title: 'Error',position:'topRight',message: "Ha ocurrido un problema"}); 
  
              }
              
           }); 
  
        },//addStudent()  
        
        removeStudent(index){
  
           let self = this;
  
           self.loading = true;
  
           self.errors = [];
  
           Swal.fire({title: 'Estas seguro?',text: "No podrás revertir esto!",icon: 'warning',showCancelButton: true,confirmButtonColor: '#3085d6',cancelButtonColor: '#d33',confirmButtonText: 'Si, bórralo!',cancelButtonText: 'Cancelar'}).then((result) => {
           
              if (result.isConfirmed) {
  
                 self.students.splice(index, 1 );
  
                  Swal.fire('Eliminado!','El registro ha sido eliminado.','success');
  
              }
  
              self.loading = false;
  
           })
              
        },//removeStudent(index) 
  
        clearStudent(){
  
           this.student={
  
                    rut:'',
  
                    student_name:'',
  
                    student_lastname:'',
  
                    blood_type:'',
  
                    phone:'',
  
                    allergies:'',
  
                    address:'',
  
                    email:'',
  
                    password:'',
  
                    password_confirmation:'',
           };
  
           this.errors = [];
  
           this.id='';

           this.change=0;
  
        },//clearStudent()
  
        async register(){
  
           let self = this;
  
           self.loading = true;
  
           self.errors = [];
  
           axios.post('{{ url("storeRepresentative") }}', {
  
              rut:self.rut,
  
              representative_name:self.representative_name,
  
              representative_lastname:self.representative_lastname,
  
              address:self.address,
  
              phone:self.phone,
     
              email:self.email,
  
              leading:1,
  
              password:self.password,
  
              password_confirmation:self.password_confirmation,
  
              viewfinders:self.viewfinders,
  
              students:self.students,
     
           }).then(function (response) {
  
              if(response.data.success==true){
  
                 Swal.fire('Información','Registro Satisfactorio','success').then(function() {
                    
                     window.location.href="{{ url('business/representative/list') }}";

                 });
  
              }//if(response.data.success==true)
              else{       
  
                 iziToast.error({title: 'Error',position:'topRight',message: response.data.msg}); 
  
              }//else if(response.data.success==false)
  
           }).catch(err => {
  
              self.loading = false
  
              self.errors = err.response.data.errors;
  
              if(self.errors){
  
                 iziToast.error({title: 'Error',position:'topRight',message: "Hay algunos campos que debes revisar"});  
             
              }else{
  
                 iziToast.error({title: 'Error',position:'topRight',message: "Ha ocurrido un problema"}); 
  
              }
              
           }); 
  
        },//register:function()
  
        captureRecord: function(index,value,op){

           if(op==1){
           
               this.clearViewfinder();

               this.toggleModal2();

               this.id=index;

               this.representative.rut=value.rut;
  
               this.representative.representative_name=value.representative_name;
  
               this.representative.representative_lastname=value.representative_lastname;
  
               this.representative.address=value.address;
  
               this.representative.phone=value.phone;
    
               this.representative.email=value.email;

               this.representative.leading=0;
  
               this.representative.password=value.password;
  
               this.representative.password_confirmation=value.password_confirmation;
  
           }//if(op==1)
           else{

               this.clearStudent();

               this.toggleModal();

               this.id=index;

               this.student.rut=value.rut;
  
               this.student.student_name=value.student_name;
  
               this.student.student_lastname=value.student_lastname;
  
               this.student.blood_type=value.blood_type;
  
               this.student.phone=value.phone;
  
               this.student.allergies=value.allergies;
  
               this.student.address=value.address;
  
               this.student.email=value.email;
  
               this.student.password=value.password;
  
               this.student.password_confirmation=value.password_confirmation;
           
           }//else if(op==1)

           this.change=1;

        },//captureRecord: function(value)


        update(op){

           if(op==1){

             this.addViewfinder(1);

           }else{

            this.validateStudent(2);
             
           }//else if(op==1)

        },//update(op)
  
      },
  
  })
  
</script>
@endpush

