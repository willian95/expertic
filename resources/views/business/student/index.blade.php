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
   <div class="custom-modal-cover hide-modal" id="modal">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-12 col-lg-12 col-md-12">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Estudiantes</h5>
                  </div>
                  <div class="modal-body">
                     <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-3">
                           <div class="form-group">
                              <label for="name">Buscar Apoderado</label>
                              <div class="input-group mb-3">
                                 <input type="text" class="form-control" placeholder="Ingrese el rut del apoderado" v-model="search_representative_rut" aria-describedby="basic-addon2">
                                 <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2" style="border-bottom-right-radius: 20px; border-top-right-radius: 20px; cursor:pointer" title="Buscar" @click="getRepresentative">
                                    <i class="zmdi zmdi-search"></i>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                           <div class="form-group">
                              <label for="representative_name">Nombre Apoderado</label>
                              <input type="text" class="form-control" id="representative_name" v-model="representative_name" readonly>
                              <small v-if="errors.hasOwnProperty('student.representative_id')" class="text-danger ml-2">@{{ errors['student.representative_id'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('stud.representative_id')" class="text-danger ml-2">@{{ errors['stud.representative_id'][0] }}</small>                              
                           </div>
                        </div>                     
                        <div class="col-12 col-md-6 col-lg-3">
                           <div class="form-group">
                              <label for="rut">Rut Estudiante</label>
                              <input type="text" v-model="student.rut" class="form-control" id="rut" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.rut') }">
                              <small v-if="errors.hasOwnProperty('student.rut')" class="text-danger ml-2">@{{ errors['student.rut'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('stud.rut')" class="text-danger ml-2">@{{ errors['stud.rut'][0] }}</small>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                           <div class="form-group">
                              <label for="student_name">Nombre</label>
                              <input type="text" v-model="student.student_name" class="form-control" id="student_name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.student_name') }">
                              <small v-if="errors.hasOwnProperty('student.student_name')" class="text-danger ml-2">@{{ errors['student.student_name'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('stud.student_name')" class="text-danger ml-2">@{{ errors['stud.student_name'][0] }}</small>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                           <div class="form-group">
                              <label for="student_lastname">Apellido</label>
                              <input type="text" v-model="student.student_lastname" class="form-control" id="student_lastname" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.student_lastname') }">
                              <small v-if="errors.hasOwnProperty('student.student_lastname')" class="text-danger ml-2">@{{ errors['student.student_lastname'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('stud.student_lastname')" class="text-danger ml-2">@{{ errors['stud.student_lastname'][0] }}</small>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                           <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" v-model="student.email" class="form-control" id="email" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.email') }">
                              <small v-if="errors.hasOwnProperty('student.email')" class="text-danger ml-2">@{{ errors['student.email'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('stud.email')" class="text-danger ml-2">@{{ errors['stud.email'][0] }}</small>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                           <div class="form-group"> 
                              <label for="address">Dirección</label>
                              <input type="text" class="form-control" id="student_address"  v-model="student.address" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.address') }">
                              <small v-if="errors.hasOwnProperty('student.address')" class="text-danger ml-2">@{{ errors['student.address'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('stud.address')" class="text-danger ml-2">@{{ errors['stud.address'][0] }}</small>
                           </div>
                        </div> 
                        <div class="col-12 col-md-6 col-lg-3">
                           <div class="form-group">
                              <label for="phone">Teléfono</label>
                              <input type="phone"  onKeyPress="return soloNumeros(event)" v-model="student.phone" class="form-control" id="student_phone" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.phone') }" maxlength="12">
                              <small v-if="errors.hasOwnProperty('student.phone')" class="text-danger ml-2">@{{ errors['student.phone'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('stud.phone')" class="text-danger ml-2">@{{ errors['stud.phone'][0] }}</small>
                           </div>
                        </div>  
                        <div class="col-12 col-md-6 col-lg-3">
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
                        <div class="col-12 col-md-6 col-lg-3">
                           <div class="form-group">
                              <label for="password">Contraseña</label>
                              <input type="password" v-model="student.password" class="form-control" id="password"  v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.password') }">
                              <small v-if="errors.hasOwnProperty('student.password')" class="text-danger ml-2">@{{ errors['student.password'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('stud.password')" class="text-danger ml-2">@{{ errors['stud.password'][0] }}</small>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                           <div class="form-group">
                              <label for="password_confirmation">Verificar Contraseña</label>
                              <input type="password" v-model="student.password_confirmation" class="form-control" id="password_confirmation" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('student.password_confirmation') }">
                              <small v-if="errors.hasOwnProperty('student.password_confirmation')" class="text-danger ml-2">@{{ errors['student.password_confirmation'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('stud.password_confirmation')" class="text-danger ml-2">@{{ errors['stud.password_confirmation'][0] }}</small>
                           </div>
                        </div>   
                        <div class="col-12 pb-4 text-justify">
                           <div class="form-group">
                              <label for="allergies">Alergias</label>
                              <textarea  class="form-control border rounded" name="allergies" v-model="student.allergies" id="allergies" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('allergies') }" cols="3" rows="2"></textarea>
                              <small v-if="errors.hasOwnProperty('student.allergies')" class="text-danger ml-2">@{{ errors['student.allergies'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('stud.allergies')" class="text-danger ml-2">@{{ errors['stud.allergies'][0] }}</small>
                           </div>
                        </div>                                         
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="closeModal()">Cerrar</button>
                     <button type="button" class="btn btn-primary"@click="ActionsCru">@{{buttonNameDos}}</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="block-header">
      <div class="row">
         <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Estudiantes</h2>
         </div>
         <div class="col-lg-5 col-md-6 col-sm-12">
            <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button" @click="toggleModal()">
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
                              <th class="adjust-tr-10">#</th>
                              <th class="adjust-tr-20">Rut</th>
                              <th class="adjust-tr-20">Nombre</th>
                              <th class="adjust-tr-20">Apellido</th>
                              <th class="adjust-tr-20">Email</th>
                              <th class="adjust-tr-10">Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr  v-for="(Student,index) in Students.students">
                              <td>@{{Student.num}}</td>
                              <td>
                                 <p>@{{Student.rut}}</p>
                              </td>
                              <td>
                                 <p>@{{Student.student_name}}</p>
                              </td>
                              <td>
                                 <p>@{{Student.student_lastname}}</p>
                              </td>
                              <td>
                                 <p>@{{Student.email}}</p>
                              </td>
                              <td>
                                 <button class="btn btn-info" @click="captureRecord(Student)">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="btn btn-secondary"  @click="destroy(Student.id)">
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
                     <li class="page-item" v-if="paginate.current_page > 1"><a class="page-link" href="javascript:void(0);" @click.prevent="changePage(paginate.current_page - 1)"><i class="zmdi zmdi-arrow-left"></i></a></li>
                     <li class="page-item" v-for="page in pagesNumber" v-bind:class="{ 'active': page== isActive }"><a class="page-link" href="javascript:void(0);" @click.prevent="changePage(page)">@{{page}}</a></li>
                     <li class="page-item" v-if="paginate.current_page < paginate.last_page"><a class="page-link" href="javascript:void(0);" @click.prevent="changePage(paginate.current_page + 1)"><i class="zmdi zmdi-arrow-right"></i></a></li>
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
      
       el: '#business',
   
       data:{
   
            loading:false,
   
            modal:false,
   
            errors:[],
   
            Students:'',

            search_representative_rut:'',

            representative_name:'',
   
            student:{
  
                    representative_id:'',
                    
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
   
            buttonShowDos:true, 
   
            buttonNameDos:'Crear',
   
            id:'',
   
            change:0,
            
            paginate:{
   
                   total:0,
   
                   current_page:0,
   
                   per_page:0,
   
                   last_page:0,
   
                   from:0,
   
                   to:0,
   
            },
   
            offset:3
   
   
       },
       mounted(){
          
          this.getStudents(1);
   
       },
       computed:{
   
          isActive(){
   
             return this.paginate.current_page;
   
          },//isActive()
   
          pagesNumber(){
   
               if(!this.paginate.to){
   
                  return [];
   
               }//if(!this.paginate.to)
   
               let from = this.paginate.current_page - this.offset;
   
               if (from < 1){
   
                  from = 1;
                  
               }//if (from < 1)
   
               let to = from + (this.offset * 2);
   
               if(to>=this.paginate.last_page){
   
                 to=this.paginate.last_page;
   
               }//if(to>=this.paginate.last_page)
   
               
               let pagesArray=[];
   
               while(from <= to){
   
                  pagesArray.push(from);
   
                  from++;
   
               }//while(from <= to)
   
               return pagesArray;
   
          }//pagesNumber()
   
       },//computed
       methods:{
   
           toggleModal(){
   
               document.getElementById("modal").classList.remove("hide-modal");
   
               document.getElementById("modal").classList.add("show-modal");
   
           },//toggleModal()
   
            closeModal(){
               
               this.clear();
   
               document.getElementById("modal").classList.add("hide-modal");
   
               document.getElementById("modal").classList.remove("show-modal");
   
           },//closeModal()
   
         clear:function(){

            this.search_representative_rut='';

            this.representative_name='';
   
            this.student={
  
                    representative_id:'',
                    
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
   
            this.buttonShowDos=true;
   
            this.buttonNameDos="Crear";
      
            this.id='';
   
            this.change=0;  

            this.errors=[];
 
   
         },//clear:function()
   
         async register(){
   
            let self = this;
   
            self.loading = true;
   
            self.errors = []
   
            axios.post('{{ url("storeStudent") }}', {
   
               student:self.student
   
            }).then(function (response) {
   
               if(response.data.success==true){
   
                  self.closeModal();
   
                  self.getStudents(1);
   
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
   
         captureRecord: function(value){
   
            this.clear();
   
            this.buttonNameDos="Actualizar";
   
            this.id=value.id;

            this.search_representative_rut=value.representative_rut;

            this.representative_name=value.representative_name;

            this.student.representative_id=value.representative_id;
                    
            this.student.rut=value.rut;
  
            this.student.student_name=value.student_name;
  
            this.student.student_lastname=value.student_lastname;
  
            this.student.blood_type=value.blood_type;
  
            this.student.phone=value.phone;
  
            this.student.allergies=value.allergies;
  
            this.student.address=value.address;
  
            this.student.email=value.email;
   
            this.change=1;
   
            this.toggleModal();
   
         },//captureRecord: function(value)
   
   
         cancel:function(){
   
            this.clear();
   
            this.id="";
   
            this.buttonNameDos="Crear";
   
            this.buttonShowDos=true;
   
            this.change=0;
         },
   
         async update(){
   
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
   
                  self.closeModal();
   
                  self.getStudents(1);
   
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
   
         },//update:function()
   
         async destroy(id){
   
            let self = this;
   
            self.loading = true;
   
            self.errors = []
   
            Swal.fire({title: 'Estas seguro?',text: "No podrás revertir esto!",icon: 'warning',showCancelButton: true,confirmButtonColor: '#3085d6',cancelButtonColor: '#d33',confirmButtonText: 'Si, bórralo!',cancelButtonText: 'Cancelar'}).then((result) => {
            
               if (result.isConfirmed) {
   
                  axios.post('{{ url("destroyStudent") }}', {
                     id:id,
                  }).then(function (response) {
   
                     if(response.data.success==true){
   
                        self.closeModal();
   
                        self.getStudents(1);
   
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
   
         },// destroy:function(value)
   
         ActionsCru:function(){
   
           if(this.change==0){
   
             this.register();
   
           }//if(this.change==0)
   
           else if(this.change==1){
   
             this.update();
   
           }//else if(this.change==1)
   
         },//ActionsCru:function()
   
         ActionsCc:function(){
   
            if(this.change==0){
   
             this.clear();
   
           }//if(this.change==0)
   
           else if(this.change==1 || this.change==2){
   
             this.cancel();
   
           }//else if(this.change==1)
   
         },//ActionsCc:function()
   
   
         changePage(page){
   
            this.paginate.current_page=page;
   
            this.getStudents(page);
   
         },//changePage()
   
         async getStudents(page){
   
            let self = this;
   
            self.loading = true;
   
                  axios.post('{{ url("getStudents") }}', {
                     
                     page:page,
                     
                  }).then(function (response) {
   
                     self.loading = false
   
                     if(response.data.success==true){
   
                        self.Students=response.data.Students;
   
                        self.paginate=response.data.Students.paginate;
   
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
   
         },//getStudents

         async getRepresentative(){
   
            let self = this;
   
            self.loading = true;
   
                  axios.post('{{ url("SearchRepresentative") }}', {
                     
                     rut:self.search_representative_rut,
                     
                  }).then(function (response) {
   
                     self.loading = false
   
                     if(response.data.success==true){

                        if(response.data.Representative.length>0){

                           iziToast.success({title: 'Apoderado:',position:'topRight',message: response.data.Representative[0].representative_name + ' ' + response.data.Representative[0].representative_lastname}); 

                           self.student.representative_id=response.data.Representative[0].id;

                           self.representative_name=response.data.Representative[0].representative_name + ' ' + response.data.Representative[0].representative_lastname;

                        }else{

                           iziToast.error({title: 'Error',position:'topRight',message: 'Apoderado no encontrado'}); 

                           self.student.representative_id='';

                           self.representative_name='';
  
                        }
                        
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
   
         },//getRepresentative        
   
       },
   
   })
   
</script>
@endpush


