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
            <div class="col-12 col-lg-10 col-md-10">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Profesores</h5>
                  </div>
                  <div class="modal-body">
                     <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="rut">Rut</label>
                              <input type="text" v-model="rut" class="form-control" id="rut" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('rut') }">
                              <small v-if="errors.hasOwnProperty('rut')" class="text-danger ml-2">@{{ errors['rut'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('data.rut')" class="text-danger ml-2">@{{ errors['data.rut'][0] }}</small>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="teacher_name">Nombre</label>
                              <input type="text" v-model="teacher_name" class="form-control" id="teacher_name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('teacher_name') }">
                              <small v-if="errors.hasOwnProperty('teacher_name')" class="text-danger ml-2">@{{ errors['teacher_name'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('data.teacher_name')" class="text-danger ml-2">@{{ errors['data.teacher_name'][0] }}</small>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="teacher_lastname">Apellido</label>
                              <input type="text" v-model="teacher_lastname" class="form-control" id="teacher_lastname" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('teacher_lastname') }">
                              <small v-if="errors.hasOwnProperty('teacher_lastname')" class="text-danger ml-2">@{{ errors['teacher_lastname'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('data.teacher_lastname')" class="text-danger ml-2">@{{ errors['data.teacher_lastname'][0] }}</small>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" v-model="email" class="form-control" id="email" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('email') }">
                              <small v-if="errors.hasOwnProperty('email')" class="text-danger ml-2">@{{ errors['email'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('data.email')" class="text-danger ml-2">@{{ errors['data.email'][0] }}</small>
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
                           <span class="font-weight-normal">Asignaturas</span><br> 
                           <div id='subjects' class="form-check form-check-inline" v-for="subject in Subjects">
                              <input class="form-check-input" type="checkbox" v-bind:id="'subject.id'+'subject'" v-model="subjects"  v-bind:value="subject.id">
                              <label class="form-check-label" for="inlineCheckbox1">@{{subject.subject}}</label>
                           </div>
                        </div>
                        <div class="col-12 pb-4">
                              <small v-if="errors.hasOwnProperty('subjects')" class="text-danger ml-2">@{{ errors['subjects'][0] }}</small>
                              <small v-if="errors.hasOwnProperty('data.subjects')" class="text-danger ml-2">@{{ errors['data.subjects'][0] }}</small>
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
                              <th class="adjust-tr-10">#</th>
                              <th class="adjust-tr-20">Rut</th>
                              <th class="adjust-tr-20">Nombre</th>
                              <th class="adjust-tr-20">Apellido</th>
                              <th class="adjust-tr-20">Email</th>
                              <th class="adjust-tr-10">Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr  v-for="(Teacher,index) in Teachers.teachers">
                              <td>@{{Teacher.num}}</td>
                              <td>
                                 <p>@{{Teacher.rut}}</p>
                              </td>
                              <td>
                                 <p>@{{Teacher.teacher_name}}</p>
                              </td>
                              <td>
                                 <p>@{{Teacher.teacher_lastname}}</p>
                              </td>
                              <td>
                                 <p>@{{Teacher.email}}</p>
                              </td>
                              <td>
                                 <button class="btn btn-info" @click="captureRecord(Teacher)">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="btn btn-secondary"  @click="destroy(Teacher.id)">
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
   
            Subjects:{!! $Subjects ? $Subjects : "''"!!},

            Teachers:'',
   
            rut:'',
   
            teacher_name:'',
   
            teacher_lastname:'',
   
            email:'',
   
            password:'',
   
            password_confirmation:'',
   
            subjects: [],
   
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
          
          this.getTeachers(1);
   
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
   
            this.rut='';
   
            this.teacher_name='';
   
            this.teacher_lastname='';
   
            this.email='';
   
            this.password='';
   
            this.password_confirmation='';
   
            this.subjects=[];
   
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
   
            axios.post('{{ url("storeTeacher") }}', {
   
               rut:self.rut,
   
               teacher_name:self.teacher_name,
   
               teacher_lastname:self.teacher_lastname,
   
               email:self.email,
   
               password:self.password,
   
               password_confirmation:self.password_confirmation,
   
               subjects:self.subjects,
   
            }).then(function (response) {
   
               if(response.data.success==true){
   
                  self.closeModal();
   
                  self.getTeachers(1);
   
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
   
            this.rut=value.rut;
   
            this.teacher_name=value.teacher_name;
   
            this.teacher_lastname=value.teacher_lastname;
   
            this.email=value.email;
      
            this.subjects=value.subjects;
   
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

            if (self.password!=""){
         
              data={

               id:self.id,
   
               rut:self.rut,
   
               teacher_name:self.teacher_name,
   
               teacher_lastname:self.teacher_lastname,
   
               email:self.email,
   
               password:self.password,
   
               password_confirmation:self.password_confirmation,
   
               subjects:self.subjects,
              }
   
            }else{

              data={
                 
               id:self.id,
   
               rut:self.rut,
   
               teacher_name:self.teacher_name,
   
               teacher_lastname:self.teacher_lastname,
   
               email:self.email,

   
               subjects:self.subjects,
              }

            }

            
   
            axios.post('{{ url("updateTeacher") }}', {
                
                data:data
   
            }).then(function (response) {
   
   
               if(response.data.success==true){
   
                  self.closeModal();
   
                  self.getTeachers(1);
   
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
   
                  axios.post('{{ url("destroyTeacher") }}', {
                     id:id,
                  }).then(function (response) {
   
                     if(response.data.success==true){
   
                        self.closeModal();
   
                        self.getTeachers(1);
   
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
   
            this.getTeachers(page);
   
         },//changePage()
   
         async getTeachers(page){
   
            let self = this;
   
            self.loading = true;
   
                  axios.post('{{ url("getTeachers") }}', {
                     
                     page:page,
                     
                  }).then(function (response) {
   
                     self.loading = false
   
                     if(response.data.success==true){
   
                        self.Teachers=response.data.Teachers;
   
                        self.paginate=response.data.Teachers.paginate;
   
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
   
         },//getTeachers
   
       },
   
   })
   
</script>
@endpush


