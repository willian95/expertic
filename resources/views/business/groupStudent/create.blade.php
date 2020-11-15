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
                     <label for="name">Buscar Estudiante</label>
                     <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Ingrese el rut del estudiante" v-model="search_student_rut" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                           <span class="input-group-text" id="basic-addon2" style="border-bottom-right-radius: 20px; border-top-right-radius: 20px; cursor:pointer" @click="SearchStudent" title="Buscar">
                                <i class="zmdi zmdi-search"></i>
                           </span>
                         </div>
                     </div>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="student_name">Nombre</label>
                    <input type="text" class="form-control" v-model="student_name" id="student_name" disabled>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                  <div class="form-group">
                    <label for="student_lastname">Apellido</label>
                    <input type="text" class="form-control" v-model="student_lastname" id="student_lastname" disabled>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal()">Cerrar</button>
              <button type="button" class="btn btn-primary" @click="AddStudent()">Agregar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>   
   <div class="block-header">
      <div class="row">
         <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Grupos de Estudiantes</h2>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row clearfix">
         <div class="col-md-12">
            <div class="card student-list">
               <div class="body">
                  <div class="modal-header">
                     <h5 class="modal-title">Grupos de Estudiantes</h5>
                  </div>
                  <div class="row justify-content-center align-items-center pt-2 pl-4 pr-4">
                     <div class="col-12 col-md-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Periodos</label>
                           <select class="form-control custom-select" v-model="period_id" @change="CheckGroup" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('period_id') }">
                              <option value="">Seleccione</option>
                              <option v-for="option in periods" v-bind:value="option.id">
                                 @{{ option.period }}
                              </option>
                           </select>
                          <small v-if="errors.hasOwnProperty('period_id')" class="text-danger ml-2">@{{ errors['period_id'][0] }}</small>
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Niveles</label>
                           <select class="form-control custom-select" v-model="level_id" @change="CheckGroup" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('level_id') }">
                              <option value="">Seleccione</option>
                              <option v-for="option in levels" v-bind:value="option.id">
                                 @{{ option.level }}
                              </option>
                           </select>
                          <small v-if="errors.hasOwnProperty('level_id')" class="text-danger ml-2">@{{ errors['level_id'][0] }}</small>
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Secciones</label>
                           <select class="form-control custom-select" v-model="section_id" @change="CheckGroup" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('section_id') }">
                              <option value="">Seleccione</option>
                              <option v-for="option in sections" v-bind:value="option.id">
                                 @{{ option.section }}
                              </option>
                           </select>
                          <small v-if="errors.hasOwnProperty('section_id')" class="text-danger ml-2">@{{ errors['section_id'][0] }}</small>
                        </div>
                     </div>
              <div class="col-12" v-if="check==1">
                <div class="row mt-4">
                  <div class="col-lg-7 col-md-6 col-sm-12">
                    <h5 class="text-dark">Alumnos</h5>
                  </div>
                  <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-info  btn-icon btn-round float-right m-l-10" type="button"  @click="toggleModal()" title="Asignar alumno">
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
                            <th class="adjust-tr-20">#</th>
                            <th class="adjust-tr-20">Rut</th>
                            <th class="adjust-tr-20">Nombre</th>
                            <th class="adjust-tr-20">Apellido</th>
                            <th class="adjust-tr-20">Acciones</th>
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
                              <button class="btn btn-secondary" @click="RemoveStudent(index)">
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
                  <button type="button" class="btn btn-primary" @click="register">Crear</button>
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

            periods:{!! $Period ? $Period : "''"!!},

            levels:{!! $Level ? $Level : "''"!!},

            sections:{!! $Section ? $Section : "''"!!},

            loading:false,

            errors:[],

            period_id:'',

            level_id:'',

            section_id:'',
     
            search_student_rut:'',

            student_name:'',

            student_lastname:'',

            student:'',

            students:[],

            check:0,
   
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

         SearchStudent(){

            let self = this;
   
            self.loading = true;
   
                  axios.post('{{ url("SearchStudent") }}', {

                        period_id:self.period_id,

                        level_id:self.level_id,

                        section_id:self.section_id,
     
                        rut:self.search_student_rut,
                                         
                  }).then(function (response) {
   
                     self.loading = false
   
                     if(response.data.success==true){

                        self.student=response.data.Student;
   
                        self.student_name=response.data.Student.student_name;

                        self.student_lastname=response.data.Student.student_lastname;

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

         },//SearchStudent()

         AddStudent(){

           if(this.student==''){
          
              iziToast.error({title: 'Error',position:'topRight',message: "Se debe indicar el estudiante a buscar"});  

           }//if(this.student=='')
           else{

             for(let i in this.students){
             
                 if(this.students[i].id==this.student.id){

                    iziToast.error({title: 'Error',position:'topRight',message: "El estudiante ya se encuentra agregado!"}); 

                    return -1;

                 }//if(this.students[i].id==this.student.id)

             }//for(let i in this.students)
             
             this.search_student_rut="";

             this.student_name='';

             this.student_lastname='';

             this.students.push(this.student);

             Swal.fire('Información!','El registro ha sido agregado con éxito a la lista.','success');

           }//if(this.student=='')

         },//AddStudent()

        RemoveStudent(index){
  
           let self = this;
  
           self.loading = true;
  
           Swal.fire({title: 'Estas seguro?',text: "No podrás revertir esto!",icon: 'warning',showCancelButton: true,confirmButtonColor: '#3085d6',cancelButtonColor: '#d33',confirmButtonText: 'Si, bórralo!',cancelButtonText: 'Cancelar'}).then((result) => {
           
              if (result.isConfirmed) {
  
                 self.students.splice(index, 1 );
  
                  Swal.fire('Eliminado!','El registro ha sido eliminado.','success');
  
              }
  
              self.loading = false;
  
           })
              
        },//removeStudent(index)

         CheckGroup(){

            let self = this;
   
            if(self.period_id=='' || self.level_id=='' || self.section_id==''){

              this.check=0;

              return -1;

            }//if(self.period_id=='' || self.level_id=='' || self.section_id=='')

                        self.loading = true;

   
                  axios.post('{{ url("CheckGroup") }}', {

                        period_id:self.period_id,

                        level_id:self.level_id,

                        section_id:self.section_id,
                                              
                  }).then(function (response) {
   
                     self.loading = false
   
                     if(response.data.success==true){

                       self.check=1;

                     }//if(response.data.success==true)
                     else{              

                        self.check=0;
   
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

         },//CheckGroup()  

         async register(){
  
           let self = this;
  
           self.loading = true;
  
           self.errors = [];
  
           axios.post('{{ url("StoreGroupStudent") }}', {
  
              period_id:self.period_id,

              level_id:self.level_id,

              section_id:self.section_id,
  
              students:self.students,
     
           }).then(function (response) {
  
              if(response.data.success==true){
  
                 Swal.fire('Información','Registro Satisfactorio','success').then(function() {
                    
                     window.location.href="{{ url('business/groupStudent/list') }}";

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
  
        },//register()        
         
       },
   
   })
   
       
</script>
@endpush

