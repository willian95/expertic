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
                    <small v-if="errors.hasOwnProperty('Repre.rut')" class="text-danger ml-2">@{{ errors['Repre.rut'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="viewfinder_representative_name">Nombre</label>
                    <input type="text" class="form-control"  v-model="representative.representative_name" id="viewfinder_representative_name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.representative_name') }">
                    <small v-if="errors.hasOwnProperty('representative.representative_name')" class="text-danger ml-2">@{{ errors['representative.representative_name'][0] }}</small>
                    <small v-if="errors.hasOwnProperty('Repre.representative_name')" class="text-danger ml-2">@{{ errors['Repre.representative_name'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="viewfinder_representative_lastname">Apellido</label>
                    <input type="text" class="form-control" v-model="representative.representative_lastname" id="viewfinder_representative_lastname" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.representative_lastname') }">
                    <small v-if="errors.hasOwnProperty('representative.representative_lastname')" class="text-danger ml-2">@{{ errors['representative.representative_lastname'][0] }}</small>
                    <small v-if="errors.hasOwnProperty('Repre.representative_lastname')" class="text-danger ml-2">@{{ errors['Repre.representative_lastname'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-8 col-lg-8">
                  <div class="form-group">
                    <label for="viewfinder_address">Dirección</label>
                    <input type="text" v-model="representative.address" class="form-control" id="viewfinder_address" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.address') }">
                    <small v-if="errors.hasOwnProperty('representative.address')" class="text-danger ml-2">@{{ errors['representative.address'][0] }}</small>
                    <small v-if="errors.hasOwnProperty('Repre.address')" class="text-danger ml-2">@{{ errors['Repre.address'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                  <div class="form-group">
                    <label for="viewfinder_email">Email</label>
                    <input type="email" v-model="representative.email" class="form-control" id="viewfinder_email" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.email') }">
                    <small v-if="errors.hasOwnProperty('representative.email')" class="text-danger ml-2">@{{ errors['representative.email'][0] }}</small>
                    <small v-if="errors.hasOwnProperty('Repre.email')" class="text-danger ml-2">@{{ errors['Repre.email'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="viewfinder_phone">Teléfono</label>
                    <input type="viewfinder_phone"  onKeyPress="return soloNumeros(event)" v-model="representative.phone" class="form-control" id="phone" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.phone') }" maxlength="12">
                    <small v-if="errors.hasOwnProperty('representative.phone')" class="text-danger ml-2">@{{ errors['representative.phone'][0] }}</small>
                    <small v-if="errors.hasOwnProperty('Repre.phone')" class="text-danger ml-2">@{{ errors['Repre.phone'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="viewfinder_password">Contraseña</label>
                    <input type="password" v-model="representative.password" class="form-control" id="viewfinder_password"  v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.password') }">
                    <small v-if="errors.hasOwnProperty('representative.password')" class="text-danger ml-2">@{{ errors['representative.password'][0] }}</small>
                    <small v-if="errors.hasOwnProperty('Repre.password')" class="text-danger ml-2">@{{ errors['Repre.password'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="viewfinder_password_confirmation">Verificar Contraseña</label>
                    <input type="password" v-model="representative.password_confirmation" class="form-control" id="viewfinder_password_confirmation" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative.password_confirmation') }">
                    <small v-if="errors.hasOwnProperty('representative.password_confirmation')" class="text-danger ml-2">@{{ errors['representative.password_confirmation'][0] }}</small>
                    <small v-if="errors.hasOwnProperty('Repre.password_confirmation')" class="text-danger ml-2">@{{ errors['Repre.password_confirmation'][0] }}</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal2()">Cerrar</button>
              <button type="button" class="btn btn-primary" @click="StoreRepresentativeViewfinder()" v-if="change==0">Agregar</button>
              <button type="button" class="btn btn-primary" @click="updateViewfinder" v-if="change==1">Modificar</button>
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
                    <small v-if="errors.hasOwnProperty('stud.rut')" class="text-danger ml-2">@{{ errors['stud.rut'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="student_name">Nombre</label>
                    <input type="text" class="form-control" v-model="student.student_name" id="student_name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.student_name') }">
                    <small v-if="errors.hasOwnProperty('student.student_name')" class="text-danger ml-2">@{{ errors['student.student_name'][0] }}</small>
                    <small v-if="errors.hasOwnProperty('stud.student_name')" class="text-danger ml-2">@{{ errors['stud.student_name'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="student_lastname">Apellido</label>
                    <input type="text" class="form-control" v-model="student.student_lastname" id="student_lastname" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.student_lastname') }">
                    <small v-if="errors.hasOwnProperty('student.student_lastname')" class="text-danger ml-2">@{{ errors['student.student_lastname'][0] }}</small>
                    <small v-if="errors.hasOwnProperty('stud.student_lastname')" class="text-danger ml-2">@{{ errors['stud.student_lastname'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="phone"  onKeyPress="return soloNumeros(event)" v-model="student.phone" class="form-control" id="student_phone" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.phone') }" maxlength="12">
                    <small v-if="errors.hasOwnProperty('student.phone')" class="text-danger ml-2">@{{ errors['student.phone'][0] }}</small>
                    <small v-if="errors.hasOwnProperty('stud.phone')" class="text-danger ml-2">@{{ errors['stud.phone'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group"> 
                    <label for="address">Dirección</label>
                    <input type="text" class="form-control" id="student_address"  v-model="student.address" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.address') }">
                    <small v-if="errors.hasOwnProperty('student.address')" class="text-danger ml-2">@{{ errors['student.address'][0] }}</small>
                    <small v-if="errors.hasOwnProperty('stud.address')" class="text-danger ml-2">@{{ errors['stud.address'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" v-model="student.email" class="form-control" id="email" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.email') ,  'is-invalid':error_email  }">
                    <small v-if="errors.hasOwnProperty('student.email')" class="text-danger ml-2">@{{ errors['student.email'][0] }}</small>
                    <small v-if="errors.hasOwnProperty('stud.email')" class="text-danger ml-2">@{{ errors['stud.email'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="student_password">Contraseña</label>
                    <input type="password" v-model="student.password" class="form-control" id="student_password"  v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.password') }">
                    <small v-if="errors.hasOwnProperty('student.password')" class="text-danger ml-2">@{{ errors['student.password'][0] }}</small>
                    <small v-if="errors.hasOwnProperty('stud.password')" class="text-danger ml-2">@{{ errors['stud.password'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="password_confirmation">Verificar Contraseña</label>
                    <input type="password" v-model="student.password_confirmation" class="form-control" id="student_password_confirmation" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.password_confirmation') }">
                    <small v-if="errors.hasOwnProperty('student.password_confirmation')" class="text-danger ml-2">@{{ errors['student.password_confirmation'][0] }}</small>
                    <small v-if="errors.hasOwnProperty('stud.password_confirmation')" class="text-danger ml-2">@{{ errors['stud.password_confirmation'][0] }}</small>
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
                    <small v-if="errors.hasOwnProperty('stud.blood_type')" class="text-danger ml-2">@{{ errors['stud.blood_type'][0] }}</small>
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
              <button type="button" class="btn btn-primary" @click="registerStudent" v-if="change==0">Agregar</button>
              <button type="button" class="btn btn-primary" @click="updateStudent" v-if="change==1">Modificar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="block-header">
    <div class="row">
      <div class="col-lg-7 col-md-6 col-sm-12">
        <h2>Actualizar Datos del Apoderado</h2>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-md-12">
        <div class="card student-list">
          <div class="body">
            <div class="modal-header">
              <h5 class="modal-title">Actualizar Apoderado</h5>
            </div>
            <div class="row align-items-center pt-2 pl-4 pr-4 mb-4">
              <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="rut">Rut</label>
                  <input type="text" class="form-control" v-model="rut" id="rut" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('rut') }">
                  <small v-if="errors.hasOwnProperty('rut')" class="text-danger ml-2">@{{ errors['rut'][0] }}</small>
                  <small v-if="errors.hasOwnProperty('data.rut')" class="text-danger ml-2">@{{ errors['data.rut'][0] }}</small>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="representative_name">Nombre</label>
                  <input type="text" class="form-control" v-model="representative_name" id="representative_name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative_name') }">
                  <small v-if="errors.hasOwnProperty('representative_name')" class="text-danger ml-2">@{{ errors['representative_name'][0] }}</small>
                  <small v-if="errors.hasOwnProperty('data.representative_name')" class="text-danger ml-2">@{{ errors['data.representative_name'][0] }}</small>                  
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="representative_lastname">Apellido</label>
                  <input type="text" class="form-control" v-model="representative_lastname"  id="representative_lastname" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('representative_lastname') }">
                  <small v-if="errors.hasOwnProperty('representative_lastname')" class="text-danger ml-2">@{{ errors['representative_lastname'][0] }}</small>
                  <small v-if="errors.hasOwnProperty('data.representative_lastname')" class="text-danger ml-2">@{{ errors['data.representative_lastname'][0] }}</small>
                </div>
              </div>
              <div class="col-12 col-md-8 col-lg-8">
                <div class="form-group">
                  <label for="address">Dirección</label>
                  <input type="text" class="form-control" v-model="address" id="address" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('address') }">
                  <small v-if="errors.hasOwnProperty('address')" class="text-danger ml-2">@{{ errors['address'][0] }}</small>
                  <small v-if="errors.hasOwnProperty('data.address')" class="text-danger ml-2">@{{ errors['data.address'][0] }}</small>
                </div>
              </div>
              <div class="col-12 col-md-4 col-lg-4">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" v-model="email" class="form-control" id="email" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('email') }">
                  <small v-if="errors.hasOwnProperty('email')" class="text-danger ml-2">@{{ errors['email'][0] }}</small>
                  <small v-if="errors.hasOwnProperty('data.email')" class="text-danger ml-2">@{{ errors['data.email'][0] }}</small>
                </div>
              </div>
              <div class="col-12 col-md-6 col-lg-4">
                <div class="form-group">
                  <label for="phone">Teléfono</label>
                  <input type="phone" onKeyPress="return soloNumeros(event)" v-model="phone" class="form-control" id="phone" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('phone') }" maxlength="12">
                  <small v-if="errors.hasOwnProperty('phone')" class="text-danger ml-2">@{{ errors['phone'][0] }}</small>
                  <small v-if="errors.hasOwnProperty('data.phone')" class="text-danger ml-2">@{{ errors['data.phone'][0] }}</small>
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
                              <button class="btn btn-secondary" @click="destroy(viewf.id)">
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
                              <button class="btn btn-secondary" @click="destroyStudent(stud.id)">
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
              <button type="button" class="btn btn-primary"  @click="updateRepresentativeLeading()" title="Actualizar">Actualizar</button>
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
  
           Representative:{!! $Representative ? $Representative : "''"!!},

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

                    representative_id: '',

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

        this.rut=this.Representative.rut;
  
        this.representative_name=this.Representative.representative_name;
  
        this.representative_lastname=this.Representative.representative_lastname;
  
        this. address=this.Representative.address;
  
        this.phone=this.Representative.phone;
  
        this.leading=this.Representative.leading;
  
        this.email=this.Representative.email;

        this.students=this.Representative.students;

        this.student.representative_id=this.Representative.id;

        this.viewfinders=this.Representative.viewfinder;

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
  
        async StoreRepresentativeViewfinder(){
           
           let self = this;
  
           self.loading = true;
  
           self.errors = [];
  
           axios.post('{{ url("StoreRepresentativeViewfinder") }}', {

              representative_id:self.Representative.id,
  
              representative:self.representative,
  
           }).then(function (response) {
  
              if(response.data.success==true){

                 self.getRepresentatives2(self.Representative.id);

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
  
        clearStudent(){
  
           this.student={

                    representative_id: this.Representative.id,

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

               this.representative.id=value.id;

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

               this.id=value.id;

               this.representative_id=this.Representative.id;

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

        async updateRepresentativeLeading(){
   
            let self = this;
   
            self.loading = true;
   
            self.errors = [];

            let data={};

            if (self.password!=""){
         
              data={

                    id:this.Representative.id,
   
                    rut:this.rut,
  
                    representative_name:this.representative_name,
  
                    representative_lastname:this.representative_lastname,
  
                    address:this.address,
  
                    phone:this.phone,
  
                    leading:1,
  
                    email:this.email,
   
                    password:this.password,
   
                    password_confirmation:this.password_confirmation,
   
                    students:this.students,
              }
   
            }else{

              data={
                 
                    id:this.Representative.id,
   
                    rut:this.rut,
  
                    representative_name:this.representative_name,
  
                    representative_lastname:this.representative_lastname,
  
                    address:this.address,
  
                    phone:this.phone,
  
                    leading:1,
  
                    email:this.email,

                    students:this.students,
              }

            }

            axios.post('{{ url("updateRepresentativeLeading") }}', {
                
                data:data
   
            }).then(function (response) {
   
   
               if(response.data.success==true){
   
      
                Swal.fire('Información','Actualización Satisfactorio','success').then(function() {
                    
                     window.location.href="{{ url('business/representative/list') }}";

                });
   
               }//if(response.data.success==true)
               else{         
   
                  iziToast.error({title: 'Error',position:'topRight',message: response.data.msg});   
   
               }//else if(response.data.success==false)
   
            }).catch(err => {
   
               self.loading = false
   
               self.errors = err.response.data.errors
   
               if(self.errors){
   
                  iziToast.error({title: 'Error',position:'topRight',message: "Hay algunos campos que debes revisar"});
   
               }else{
   
                  iziToast.error({title: 'Error',position:'topRight',message: "Ha ocurrido un problema"});  
   
               }
               
            }); 
   
        },//updateRepresentativeLeading()

        async updateViewfinder(){
   
            let self = this;
   
            self.loading = true;
   
            self.errors = [];

            let Repre={};

            if (self.representative.password!=""){
         
              Repre={

                    id:self.representative.id,
   
                    rut:self.representative.rut,
  
                    representative_name:self.representative.representative_name,
  
                    representative_lastname:self.representative.representative_lastname,
  
                    address:self.representative.address,
  
                    phone:self.representative.phone,
  
                    leading:0,
  
                    email:self.representative.email,
   
                    password:self.representative.password,
   
                    password_confirmation:self.representative.password_confirmation,
   
              }
   
            }else{

              Repre={
                 
                    id:self.representative.id,
   
                    rut:self.representative.rut,
  
                    representative_name:self.representative.representative_name,
  
                    representative_lastname:self.representative.representative_lastname,
  
                    address:self.representative.address,
  
                    phone:self.representative.phone,
  
                    leading:0,
  
                    email:self.representative.email,
              }

            }

            axios.post('{{ url("UpdateRepresentativeViewfinder") }}', {
                
                Repre:Repre
   
            }).then(function (response) {
   
               if(response.data.success==true){
   
                 self.getRepresentatives2(self.Representative.id);

                 self.clearViewfinder();
  
                 self.closeModal2();
  
                 self.loading = false;

                Swal.fire('Información','Actualización Satisfactorio','success');
   
               }//if(response.data.success==true)
               else{         
   
                  iziToast.error({title: 'Error',position:'topRight',message: response.data.msg});   
   
               }//else if(response.data.success==false)
   
            }).catch(err => {
   
               self.loading = false
   
               self.errors = err.response.data.errors
   
               if(self.errors){
   
                  iziToast.error({title: 'Error',position:'topRight',message: "Hay algunos campos que debes revisar"});
   
               }else{
   
                  iziToast.error({title: 'Error',position:'topRight',message: "Ha ocurrido un problema"});  
   
               }
               
            }); 
   
        },//updateViewfinder()

        async destroy(id){
   
            let self = this;
   
            self.loading = true;
   
            self.errors = [];
   
            Swal.fire({title: 'Estas seguro?',text: "No podrás revertir esto!",icon: 'warning',showCancelButton: true,confirmButtonColor: '#3085d6',cancelButtonColor: '#d33',confirmButtonText: 'Si, bórralo!',cancelButtonText: 'Cancelar'}).then((result) => {
            
               if (result.isConfirmed) {
   
                  axios.post('{{ url("destroyRepresentative") }}', {

                     id:id,

                  }).then(function (response) {
   
                     if(response.data.success==true){
         
                        self.getRepresentatives2(id);

                        Swal.fire('Eliminado!','El registro ha sido eliminado.','success');
                        
                     }//if(response.data.success==true)
                     else{              
   
                        iziToast.error({title: 'Error',position:'topRight',message: response.data.msg}); 
   
                     }//else if(response.data.success==false)
   
                   }).catch(err => {
   
                     self.loading = false
   
                     self.errors = err.response.data.errors
   
                     if(self.errors){
   
                        iziToast.error({title: 'Error',position:'topRight',message: "Hay algunos campos que debes revisar"});  
   
                     }else{
   
                        iziToast.error({title: 'Error',position:'topRight',message: "Ha ocurrido un problema"});  
   
                     }
               
                   }); 
               }
   
               self.loading = false
   
            })
   
         },// destroy:function(id)

         async registerStudent(){
   
            let self = this;
   
            self.loading = true;
   
            self.errors = []
   
            axios.post('{{ url("storeStudent") }}', {
   
               student:self.student
   
            }).then(function (response) {
   
               if(response.data.success==true){
   
                  self.closeModal();

                  self.clearStudent();
   
                  self.getRepresentatives2(self.Representative.id);
   
                  Swal.fire('Información','Registro Satisfactorio','success');
   
               }//if(response.data.success==true)
               else{       
   
                  iziToast.error({title: 'Error',position:'topRight',message: response.data.msg}); 
   
               }//else if(response.data.success==false)
   
            }).catch(err => {
   
               self.loading = false
   
               self.errors = err.response.data.errors
   
               if(self.errors){
   
                  iziToast.error({title: 'Error',position:'topRight',message: "Hay algunos campos que debes revisar"});  
              
               }else{
   
                  iziToast.error({title: 'Error',position:'topRight',message: "Ha ocurrido un problema"}); 
   
               }
               
            }); 
   
         },//register:function()

         async updateStudent(){
   
            let self = this;
   
            self.loading = true;
   
            self.errors = [];

            let data={};

            if (self.student.password!=""){
         
              data={

               id:self.id,
   
               representative_id:self.student.representative_id,
                    
               rut:self.student.rut,
  
               student_name:self.student.student_name,
  
               student_lastname:self.student.student_lastname,
  
               blood_type:self.student.blood_type,
  
               phone:self.student.phone,
  
               allergies:self.student.allergies,
  
               address:self.student.address,
  
               email:self.student.email,
  
               password:self.student.password,
  
               password_confirmation:self.student.password_confirmation,
              }
   
            }else{

              data={
                 
               id:self.id,
   
               representative_id:self.student.representative_id,
                    
               rut:self.student.rut,
  
               student_name:self.student.student_name,
  
               student_lastname:self.student.student_lastname,
  
               blood_type:self.student.blood_type,
  
               phone:self.student.phone,
  
               allergies:self.student.allergies,
  
               address:self.student.address,
  
               email:self.student.email,

              }

            }

            axios.post('{{ url("updateStudent") }}', {
                
                stud:data
   
            }).then(function (response) {
   
               if(response.data.success==true){
      
                  self.getRepresentatives2(self.Representative.id);

                  self.clearStudent();

                  self.closeModal();

                  Swal.fire('Información','Actualizo Satisfactorio','success');
   
               }//if(response.data.success==true)
               else{         
   
                  iziToast.error({title: 'Error',position:'topRight',message: response.data.msg});   
   
               }//else if(response.data.success==false)
   
            }).catch(err => {
   
               self.loading = false
   
               self.errors = err.response.data.errors
   
               if(self.errors){
   
                  iziToast.error({title: 'Error',position:'topRight',message: "Hay algunos campos que debes revisar"});
   
               }else{
   
                  iziToast.error({title: 'Error',position:'topRight',message: "Ha ocurrido un problema"});  
   
               }
               
            }); 
   
         },//updateStudent()

        async destroyStudent(id){
   
            let self = this;
   
            self.loading = true;
   
            self.errors = []
   
            Swal.fire({title: 'Estas seguro?',text: "No podrás revertir esto!",icon: 'warning',showCancelButton: true,confirmButtonColor: '#3085d6',cancelButtonColor: '#d33',confirmButtonText: 'Si, bórralo!',cancelButtonText: 'Cancelar'}).then((result) => {
            
               if (result.isConfirmed) {
   
                  axios.post('{{ url("destroyStudent") }}', {

                     id:id,

                  }).then(function (response) {
   
                     if(response.data.success==true){
   
                        self.getRepresentatives2(self.Representative.id);
   
                        Swal.fire('Eliminado!','El registro ha sido eliminado.','success');
                        
                     }//if(response.data.success==true)
                     else{              
   
                        iziToast.error({title: 'Error',position:'topRight',message: response.data.msg}); 
   
                     }//else if(response.data.success==false)
   
                   }).catch(err => {
   
                     self.loading = false
   
                     self.errors = err.response.data.errors
   
                     if(self.errors){
   
                        iziToast.error({title: 'Error',position:'topRight',message: "Hay algunos campos que debes revisar"});  
   
                     }else{
   
                        iziToast.error({title: 'Error',position:'topRight',message: "Ha ocurrido un problema"});  
   
                     }
               
                   }); 
               }
   
               self.loading = false
   
            })
   
         },// destroyStudent(id)

        async getRepresentatives2(id){
   
            let self = this;
   
            self.loading = true;
   
                  axios.post('{{ url("getRepresentatives2") }}', {
                     
                     id:id,
                     
                  }).then(function (response) {
   
                     self.loading = false
   
                     if(response.data.success==true){
      
                        self.rut=response.data.Representative.rut;
  
                        self.representative_name=response.data.Representative.representative_name;
  
                        self.representative_lastname=response.data.Representative.representative_lastname;
  
                        self. address=response.data.Representative.address;
  
                        self.phone=response.data.Representative.phone;
  
                        self.leading=response.data.Representative.leading;
  
                        self.email=response.data.Representative.email;

                        self.students=response.data.Representative.students;

                        self.viewfinders=response.data.Representative.viewfinder;
   
                     }//if(response.data.success==true)
                     else{              
   
                        iziToast.error({title: 'Error',position:'topRight',message: response.data.msg}); 
   
                     }//else if(response.data.success==false)
   
                   }).catch(err => {
   
                     self.loading = false
   
                     self.errors = err.response.data.errors
   
                     if(self.errors){
   
                        iziToast.error({title: 'Error',position:'topRight',message: "Hay algunos campos que debes revisar"});  
   
                     }else{
   
                        iziToast.error({title: 'Error',position:'topRight',message: "Ha ocurrido un problema"});  
   
                     }
               
                   }); 
   
         },//getRepresentatives()
  
      },
  
  })
  
</script>
@endpush

