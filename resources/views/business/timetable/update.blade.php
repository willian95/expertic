@extends('layouts.main')
@section("content")
<section class="content profile-page" id="timetable">
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
            <h2>Crear Horario</h2>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row clearfix">
         <div class="col-md-12">
            <div class="card student-list">
               <div class="body">
                  <div class="modal-header">
                     <h5 class="modal-title">Actualizar Horario</h5>
                  </div>
                  <div class="row justify-content-center align-items-center pt-2 pl-4 pr-4">
                     <div class="col-12 col-md-3">
                        <div class="form-group">
                           <label class="font-weight-bold">Periodos</label>
                           <select class="form-control custom-select" v-model="timetable.periodId" @change="checkTimetable" disabled>
                              <option value="">Seleccione</option>
                              <option v-for="option in periods" v-bind:value="option.id">
                                 @{{ option.period }}
                              </option>
                           </select>
                        </div>
                     </div>
                     <div class="col-12 col-md-3">
                        <div class="form-group">
                           <label class="font-weight-bold">Niveles</label>
                           <select class="form-control custom-select" v-model="timetable.yearId"  @change="checkTimetable" disabled>
                              <option value="">Seleccione</option>
                              <option v-for="option in levels" v-bind:value="option.id">
                                 @{{ option.level }}
                              </option>
                           </select>
                        </div>
                     </div>
                     <div class="col-12 col-md-3">
                        <div class="form-group">
                           <label class="font-weight-bold">Secciones</label>
                           <select class="form-control custom-select" v-model="timetable.sectionId" @change="nameSection()" disabled>
                              <option value="">Seleccione</option>
                              <option v-for="option in sections" v-bind:value="option.id">
                                 @{{ option.section }}
                              </option>
                           </select>
                        </div>
                     </div>
                     <div class="col-12 col-md-3">
                        <div class="form-group">
                           <label class="font-weight-bold mr-1">Profesores</label><i class="zmdi zmdi-plus-square" title="Registrar nuevo profesor" @click="toggleModal"></i>
                           <select class="form-control custom-select" v-model="teacherId" @change="searchMatter">
                              <option value="">Seleccione</option>
                              <option v-for="teacher in teachers" v-bind:value="teacher.id">
                                 @{{ teacher.teacher_name }}&nbsp;@{{ teacher.teacher_lastname }}
                              </option>
                           </select>
                        </div>
                     </div>
                     <div class="col-12" v-if="teacherId!=''">
                        <div class="row justify-content-center">
                           <div class="col-12">
                              <label class="font-weight-bold">Seleccione la materia que desea agregar</label>
                           </div>
                           <div class="col-12 col-md-2 bg-info m-1 text-center rounded-pill font-weight-bold" v-bind:class="{ 'bg-success': matt.bg }" v-for="(matt,index) in matters">
                              <p class="p-0 m-0 align-middle p-1" style="line-height: 1em; cursor: pointer;"   @click="selectMatter(matt,index)">@{{matt.name}}</p>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 text-center" v-if="timetable.periodId!='' && timetable.yearId!=''  && timetable.sectionId!=''">
                        <h4>Horario</h4>
                        <table class="table table-hover table-bordered">
                           <thead>
                              <tr class="bg-info">
                                 <th scope="col" class="text-center" style="width: 5%;"><i class="zmdi zmdi-timer pr-1"></i>Horario</th>
                                 <th scope="col" class="text-center"><i class="zmdi zmdi-chevron-right pr-1"></i>Lunes</th>
                                 <th scope="col" class="text-center"><i class="zmdi zmdi-chevron-right pr-1"></i>Martes</th>
                                 <th scope="col" class="text-center"><i class="zmdi zmdi-chevron-right pr-1"></i>Miercoles</th>
                                 <th scope="col" class="text-center"><i class="zmdi zmdi-chevron-right pr-1"></i>Jueves</th>
                                 <th scope="col" class="text-center"><i class="zmdi zmdi-chevron-right pr-1"></i>Viernes</th>
                                 <th scope="col" class="text-center"><i class="zmdi zmdi-chevron-right pr-1"></i>Sabado</th>
                                 <th scope="col" class="text-center"><i class="zmdi zmdi-chevron-right pr-1"></i>Domingo</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr v-for="(hours, index) in timetable.hours">
                                 <th scope="row" style="white-space: normal;">
                                    <p>@{{hours.hour}}</p>
                                 </th>
                                 <th style="cursor: pointer; white-space: normal;" @click="assignSubject(index,1)">
                                    <p  v-if="hours.Monday!=''">@{{hours.Monday.name}}</p>
                                    <p v-if="hours.Monday!=''" class="p-0 m-0 text-right"><i class="zmdi zmdi-delete text-danger" title="Quitar" @click="deleteSubject(index,1)"></i></p>
                                 </th>
                                 <th style="cursor: pointer; white-space: normal;" @click="assignSubject(index,2)">
                                    <p  v-if="hours.Tuesday!=''">@{{hours.Tuesday.name}}</p>
                                    <p v-if="hours.Tuesday!=''" class="p-0 m-0 text-right"><i class="zmdi zmdi-delete text-danger" title="Quitar" @click="deleteSubject(index,2)"></i></p>
                                 </th>
                                 <th style="cursor: pointer; white-space: normal;" @click="assignSubject(index,3)">
                                    <p  v-if="hours.Wednesday!=''">@{{hours.Wednesday.name}}</p>
                                    <p v-if="hours.Wednesday!=''" class="p-0 m-0 text-right"><i class="zmdi zmdi-delete text-danger" title="Quitar" @click="deleteSubject(index,3)"></i></p>
                                 </th>
                                 <th style="cursor: pointer; white-space: normal;" @click="assignSubject(index,4)">
                                    <p  v-if="hours.Thursday!=''">@{{hours.Thursday.name}}</p>
                                    <p v-if="hours.Thursday!=''" class="p-0 m-0 text-right"><i class="zmdi zmdi-delete text-danger" title="Quitar" @click="deleteSubject(index,4)"></i></p>
                                 </th>
                                 <th style="cursor: pointer; white-space: normal;" @click="assignSubject(index,5)">
                                    <p  v-if="hours.Friday!=''">@{{hours.Friday.name}}</p>
                                    <p v-if="hours.Friday!=''" class="p-0 m-0 text-right"><i class="zmdi zmdi-delete text-danger" title="Quitar" @click="deleteSubject(index,5)"></i></p>
                                 </th>
                                 <th style="cursor: pointer; white-space: normal;" @click="assignSubject(index,6)">
                                    <p  v-if="hours.Saturday!=''">@{{hours.Saturday.name}}</p>
                                    <p v-if="hours.Saturday!=''" class="p-0 m-0 text-right"><i class="zmdi zmdi-delete text-danger" title="Quitar" @click="deleteSubject(index,6)"></i></p>
                                 </th>
                                 <th style="cursor: pointer; white-space: normal;" @click="assignSubject(index,7)">
                                    <p  v-if="hours.Sunday!=''">@{{hours.Sunday.name}}</p>
                                    <p v-if="hours.Sunday!=''" class="p-0 m-0 text-right"><i class="zmdi zmdi-delete text-danger" title="Quitar" @click="deleteSubject(index,7)"></i></p>
                                 </th>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <form action="{{ url('/business/timetable/list') }}" method="get">
                        <button  class="btn btn-primary" type="submit">Volver</button>
                     </form>  
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
   const timetable = new Vue({
       el: '#timetable',
       data:{

            loading:false,

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

            checkTimetables:false,
   
            change:0,
   
            timetable:{

               periodId:"",
               
               yearId:"",
   
               yearName:"", 
   
               sectionId:"",
   
               sectionName:"",
   
               hours:{
   
                     0:{hour:'07:00 am 08:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     1:{hour:'08:00 am 09:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     2:{hour:'09:00 am 10:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     3:{hour:'10:00 am 11:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},     
   
                     4:{hour:'11:00 am 12:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     5:{hour:'12:00 pm 01:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     6:{hour:'01:00 pm 02:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     7:{hour:'02:00 pm 03:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},  
   
                     8:{hour:'03:00 pm 04:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     9:{hour:'04:00 pm 05:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     10:{hour:'05:00 pm 06:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     11:{hour:'06:00 pm 07:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},     
   
                     12:{hour:'08:00 pm 09:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     13:{hour:'10:00 pm 11:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     14:{hour:'11:00 pm 12:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
               },
   
            },
   
            teacherId:'',

            timetables:[],

            Id:{!! $Id ? $Id : "''"!!},

            periods:{!! $Period ? $Period : "''"!!},

            levels:{!! $Level ? $Level : "''"!!},

            sections:{!! $Section ? $Section : "''"!!},
   
            teachers:{!! $Teacher ? $Teacher : "''"!!},
   
            matters:'',
   
            matterSelected:'',
   
            delete:0,

            modal:false,
       },
       mounted(){

           this.getTimeTable();
       },
       methods:{

           toggleModal(){
   
               document.getElementById("modal").classList.remove("hide-modal");
   
               document.getElementById("modal").classList.add("show-modal");
   
           },//toggleModal()
   
            closeModal(){
               
               this.clear2();
   
               document.getElementById("modal").classList.add("hide-modal");
   
               document.getElementById("modal").classList.remove("show-modal");
   
           },//closeModal()
   
         clear2:function(){
   
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
   
                  self.getTeachers();
   
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
   
            this.clear2();
   
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
   
            this.clear2();
   
            this.id="";
   
            this.buttonNameDos="Crear";
   
            this.buttonShowDos=true;
   
            this.change=0;
         },

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
   
             this.clear2();
   
           }//if(this.change==0)
   
           else if(this.change==1 || this.change==2){
   
             this.cancel();
   
           }//else if(this.change==1)
   
         },//ActionsCc:function()

         async getTeachers(){
   
            let self = this;
   
            self.loading = true;
   
                  axios.get('{{ url("getTeachersJson") }}', {
                                         
                  }).then(function (response) {
   
                     self.loading = false
   
                     if(response.data.success==true){
   
                        self.teachers=response.data.Teachers;
      
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

          search(){
                 
              this.sections="";
   
              this.matters="";
   
              this.teachers="";

              this.teacherId='';

              if(this.timetable.yearId!=""){
                 
                 for(let i in this.data)
                   if(this.data[i].id==this.timetable.yearId){
   
                       this.timetable.yearName=this.data[i].name;
                       
                       this.timetable.sectionId="";
   
                       this.sections=this.data[i].sections;
   
                       this.teachers=this.data[i].teachers;
   
                       //this.matters=this.data[i].matters;
   
                   }//if(this.data[i].id==this.timetable.yearId)
   
              }else{
   
                   this.clear();
   
              }//else
   
          },//search()
            
          nameSection(){
   
               this.timetable.sectionName="";
   
               this.matterSelected='';

               this.teacherId='';
               
               this.clearTimetable();
   
               this.searchMatter();

               this.checkTimetable();

                  for(let i in this.sections)

                      if(this.sections[i].id==this.timetable.sectionId)

                         this.timetable.sectionName=this.sections[i].name;

          },//nameSection()

          async searchMatter(){

            this.matterSelected='';
               
            let self = this;
   
            self.loading = true;
   
                  axios.post('{{ url("getMattersTimetable") }}', {

                     id:self.teacherId
                                         
                  }).then(function (response) {
   
                     self.loading = false
   
                     if(response.data.success==true){
   
                        self.matters=response.data.Matters;
      
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

          },//searchMatter()

         async checkTimetable(){

            this.matterSelected='';
               
            let self = this;
   
            self.loading = true;
   
                  axios.post('{{ url("checkTimetable") }}', {

                     period_id:self.timetable.periodId,

                     level_id:self.timetable.yearId,

                     section_id:self.timetable.sectionId,
                                         
                  }).then(function (response) {
   
                     self.loading = false
   
                     if(response.data.success==true){
                        
                        if(response.data.checkTimetable==true)

                           iziToast.error({title: 'Error',position:'topRight',message: 'Ya existe un horario creado para este periodo, nivel y sección!'});
                        
                        else

                            self.checkTimetables=false;

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

          },//checkTimetable()
   
          selectMatter(matter,index){
   
             if(this.matterSelected==""){
   
                 this.matterSelected=matter;
   
                 this.matters[index].bg=true;
   
   
             }else if(this.matterSelected.id==matter.id){
   
                if(matter.bg==true){
   
                   this.matterSelected="";
   
                   this.matters[index].bg=false;
   
                }else{
   
                    this.matterSelected=matter;
   
                    this.matters[index].bg=true;
   
                }//else
   
             }else{
   
                    this.matterSelected=matter;
   
                    this.matters[index].bg=true;
   
             }//else
             
             for(let i in this.matters){
              
                if(index!=i)
                   this.matters[i].bg=false;
   
             }//for(let i in this.matters)
   
          },//selectMatter(index)
   
   
          assignSubject(index,day){
             
             if(this.delete==0)
             if(day==1){
   
                 if(this.matterSelected!=""){
   
                   this.timetable.hours[index].Monday=this.matterSelected;
   
                 }// if(this.matterSelected!="")
   
             }else if(day==2){
   
                if(this.matterSelected!=""){
   
                   this.timetable.hours[index].Tuesday=this.matterSelected;
   
                 }// if(this.matterSelected!="")
   
             }else if(day==3){
   
                 if(this.matterSelected!=""){
   
                   this.timetable.hours[index].Wednesday=this.matterSelected;
   
                 }// if(this.matterSelected!="")
                 
             }else if(day==4){
   
                 if(this.matterSelected!=""){
   
                   this.timetable.hours[index].Thursday=this.matterSelected;
   
                 }// if(this.matterSelected!="")
   
             }else if(day==5){
   
                 if(this.matterSelected!=""){
   
                   this.timetable.hours[index].Friday=this.matterSelected;
   
                 }// if(this.matterSelected!="")
   
             }else if(day==6){
   
                 if(this.matterSelected!=""){
   
                   this.timetable.hours[index].Saturday=this.matterSelected;
   
                 }// if(this.matterSelected!="")
   
             }else if(day==7){
   
   
                 if(this.matterSelected!=""){
   
                    this.timetable.hours[index].Sunday=this.matterSelected;
   
                 }// if(this.matterSelected!="")
                
             }//else if(day==7)   
   
             this.delete=0;   
   
          },//assignSubject(index,day)
   
   
          deleteSubject(index,day){
   
              this.delete=1;

              let teacher_id='';

              let subject_id='';

              let dayN='';

              let hour=this.timetable.hours[index].hour;
             
             if(day==1){

                teacher_id=this.timetable.hours[index].Monday.teacher_id;

                subject_id=this.timetable.hours[index].Monday.id;

                dayN='Monday';
   
               this.timetable.hours[index].Monday="";
   
             }else if(day==2){

                teacher_id=this.timetable.hours[index].Tuesday.teacher_id;

                subject_id=this.timetable.hours[index].Tuesday.id;

                dayN='Tuesday';
  
               this.timetable.hours[index].Tuesday="";
   
             }else if(day==3){

                teacher_id=this.timetable.hours[index].Wednesday.teacher_id;

                subject_id=this.timetable.hours[index].Wednesday.id;

                dayN='Wednesday';

               this.timetable.hours[index].Wednesday="";
   
             }else if(day==4){

                teacher_id=this.timetable.hours[index].Thursday.teacher_id;

                subject_id=this.timetable.hours[index].Thursday.id;

                dayN='Thursday';
   
               this.timetable.hours[index].Thursday="";
   
             }else if(day==5){

                teacher_id=this.timetable.hours[index].Friday.teacher_id;
                                
                subject_id=this.timetable.hours[index].Friday.id;

                dayN='Friday';

               this.timetable.hours[index].Friday="";
   
             }else if(day==6){

                teacher_id=this.timetable.hours[index].Saturday.teacher_id;

                subject_id=this.timetable.hours[index].Saturday.id;

                dayN='Saturday';
   
               this.timetable.hours[index].Saturday="";
   
             }else if(day==7){

               teacher_id=this.timetable.hours[index].Sunday.teacher_id;

               subject_id=this.timetable.hours[index].Sunday.id;

                dayN='Sunday';

               this.timetable.hours[index].Sunday="";
   
             }//else if(day==7)  

            let self = this;
   
            self.loading = true;
   
            self.errors = [];
   
            Swal.fire({title: 'Estas seguro?',text: "No podrás revertir esto!",icon: 'warning',showCancelButton: true,confirmButtonColor: '#3085d6',cancelButtonColor: '#d33',confirmButtonText: 'Si, bórralo!',cancelButtonText: 'Cancelar'}).then((result) => {
            
               if (result.isConfirmed) {
   
                  axios.post('{{ url("deleteAssignment") }}', {

                      timetable_id:self.Id,

                      teacher_id:teacher_id,

                      subject_id:subject_id,

                      day:dayN,

                      hour:hour,

                      timetable:JSON.stringify(self.timetable),

                  }).then(function (response) {
   
                     if(response.data.success==true){
      
                        self.getTimeTable();
   
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
      
   
          },//deleteSubject(index,day)
   
          clearTimetable(){
         
             this.timetable.hours={
   
                     0:{hour:'07:00 am 08:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     1:{hour:'08:00 am 09:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     2:{hour:'09:00 am 10:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     3:{hour:'10:00 am 11:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},     
   
                     4:{hour:'11:00 am 12:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     5:{hour:'12:00 pm 01:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     6:{hour:'01:00 pm 02:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     7:{hour:'02:00 pm 03:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},  
   
                     8:{hour:'03:00 pm 04:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     9:{hour:'04:00 pm 05:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     10:{hour:'05:00 pm 06:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     11:{hour:'06:00 pm 07:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},     
   
                     12:{hour:'08:00 pm 09:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     13:{hour:'10:00 pm 11:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     14:{hour:'11:00 pm 12:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
               };
   
          },//clearTimetable()
   
          clear(){
           
           this.timetable={

               periodId:"",
               
               yearId:"",
   
               yearName:"",
   
               sectionId:"",
   
               sectionName:"",
   
               hours:{
   
                     0:{hour:'07:00 am 08:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     1:{hour:'08:00 am 09:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     2:{hour:'09:00 am 10:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     3:{hour:'10:00 am 11:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},     
   
                     4:{hour:'11:00 am 12:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     5:{hour:'12:00 pm 01:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     6:{hour:'01:00 pm 02:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     7:{hour:'02:00 pm 03:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},  
   
                     8:{hour:'03:00 pm 04:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     9:{hour:'04:00 pm 05:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     10:{hour:'05:00 pm 06:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     11:{hour:'06:00 pm 07:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},     
   
                     12:{hour:'08:00 pm 09:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     13:{hour:'10:00 pm 11:00 pm', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
                     14:{hour:'11:00 pm 12:00 am', Monday:'',Tuesday:'',Wednesday:'',Thursday:'', Friday:'',Saturday:'',Sunday:''},
   
               },
   
           };

           this.periods={!! $Period ? $Period : "''"!!};

           this.levels={!! $Level ? $Level : "''"!!};

           this.sections={!! $Section ? $Section : "''"!!};
   
           this.teachers={!! $Teacher ? $Teacher : "''"!!};
   
           this.matters='';
   
           this.matterSelected='';
   
           this.delete=0;
   
          },//clear()

         async getTimeTable(){
   
            let self = this;
   
            self.loading = true;
   
                  axios.post('{{ url("getTimeTable") }}', {
                     
                     id:self.Id,
                     
                  }).then(function (response) {
   
                     self.loading = false
   
                     if(response.data.success==true){
   
                        self.timetable=jQuery.parseJSON(response.data.Timetable.timetable);
      
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
   
         },//getTimeTable

       },
   
   })
   
       
</script>
@endpush

