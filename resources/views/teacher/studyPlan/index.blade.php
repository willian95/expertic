@extends('layouts.main')
@section("content")
<section class="content profile-page" id="studyPlan">
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
                     <h5 class="modal-title mt-3">Registrar Plan de Estudio</h5>
                  </div>
                  <div class="modal-body">
                  <div class="row justify-content-center align-items-center pt-2 pl-4 pr-4 mb-4">
                     <div class="col-12 col-md-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Periodos</label>
                           <select class="form-control custom-select" v-model="period_id" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('period_id') }" @change="getLevels" v-bind:disabled="edit==1">
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
                           <select class="form-control custom-select" v-model="level_id" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('level_id') }" @change="getSections" v-bind:disabled="edit==1">
                              <option value="">Seleccione</option>
                              <option v-for="option in levels" v-bind:value="option.level_id">
                                 @{{ option.level }}
                              </option>
                           </select>
                          <small v-if="errors.hasOwnProperty('level_id')" class="text-danger ml-2">@{{ errors['level_id'][0] }}</small>
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Secciones</label>
                           <select class="form-control custom-select" v-model="section_id" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('section_id') }" v-bind:disabled="edit==1">
                              <option value="">Seleccione</option>
                              <option v-for="option in sections" v-bind:value="option.section_id">
                                 @{{ option.section }}
                              </option>
                           </select>
                          <small v-if="errors.hasOwnProperty('section_id')" class="text-danger ml-2">@{{ errors['section_id'][0] }}</small>
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Asignaturas</label>
                           <select class="form-control custom-select" v-model="subject_id" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('subject_id') }" v-bind:disabled="edit==1">
                              <option value="">Seleccione</option>
                              <option v-for="option in Subjects" v-bind:value="option.id">
                                 @{{ option.subject }}
                              </option>
                           </select>
                          <small v-if="errors.hasOwnProperty('subject_id')" class="text-danger ml-2">@{{ errors['subject_id'][0] }}</small>
                        </div>
                     </div>                     
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                           <label class="font-weight-bold" for="start_date_study_plan">Fecha Inicio</label>
                           <input type="date" class="form-control" id="start_date_study_plan"  v-model="start_date_study_plan" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('start_date_study_plan') }" v-bind:disabled="edit==1">
                           <small v-if="errors.hasOwnProperty('start_date_study_plan')" class="text-danger ml-2">@{{ errors['start_date_study_plan'][0] }}</small>
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                           <label class="font-weight-bold" for="end_date_study_plan">Fecha Fin</label>
                           <input type="date" class="form-control" id="end_date_study_plan"  v-model="end_date_study_plan" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('end_date_study_plan') }" v-bind:disabled="edit==1">
                           <small v-if="errors.hasOwnProperty('end_date_study_plan')" class="text-danger ml-2">@{{ errors['end_date_study_plan'][0] }}</small>
                        </div>
                     </div>
                     <div class="col-12">
                       <div class="form-group">
                          <label class="font-weight-bold" for="title">Titulo</label>
                          <input type="text" class="form-control" name="title"  v-model="title" cols="3" rows="2" id="title" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('title') }"> 
                          <small v-if="errors.hasOwnProperty('title')" class="text-danger ml-2">@{{ errors['title'][0] }}</small>
                        </div>
                     </div>                     
                     <div class="col-12">
                       <div class="form-group">
                          <label class="font-weight-bold" for="content">Contenido</label>
                          <textarea  class="form-control border rounded" name="content"  v-model="content" cols="3" rows="2" id="content" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('content') }"></textarea>
                          <small v-if="errors.hasOwnProperty('content')" class="text-danger ml-2">@{{ errors['content'][0] }}</small>
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
            <h2>Listado de Anotaciones</h2>
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
                              <th class="adjust-tr-10">#</th>
                              <th class="adjust-tr-10">Periodo</th>
                              <th class="adjust-tr-10">Nivel</th>
                              <th class="adjust-tr-10">Sección</th>
                              <th class="adjust-tr-10">Asignatura</th>
                              <th class="adjust-tr-10">Fecha Inicio</th>                             
                              <th class="adjust-tr-10">Fecha Fin</th>
                              <th class="adjust-tr-10">Titulo</th>
                              <th class="adjust-tr-10">Contenido</th>
                              <th class="adjust-tr-10">Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr  v-for="(Study,index) in StudyPlans.studyPlans">
                              <td>@{{Study.num}}</td>
                              <td>
                                 <p>@{{Study.period}}</p>
                              </td>                                                            
                              <td>
                                 <p>@{{Study.level}}</p>
                              </td>
                              <td>
                                 <p>@{{Study.section}}</p>
                              </td>
                              <td>
                                 <p>@{{Study.subject}}</p>
                              </td>
                              <td>
                                 <p>@{{Study.start_date_study_plan2}}</p>
                              </td>
                              <td>
                                 <p>@{{Study.end_date_study_plan2}}</p>
                              </td>                              
                              <td>
                                 <p>@{{Study.title}}</p>
                              </td>
                              <td>
                                 <p>@{{Study.content}}</p>
                              </td>
                              <td>
                                 <button class="btn btn-info" @click="captureRecord(Study)">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="btn btn-secondary"  @click="destroy(Study.id)">
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
        el: '#studyPlan',
        data:{
            
         loading:false,
   
         modal:false,
   
         errors:[],

         periods:{!! $Period ? $Period : "''"!!},

         Subjects:{!! $Subjects ? $Subjects : "''"!!},

         levels:'',

         sections:'',

         period_id:'',

         level_id:'',

         section_id:'',

         subject_id:'',

         student_id:'',

         content:'',

         title:'',

         start_date_study_plan:'',

         end_date_study_plan:'',

         StudyPlans:'',

         edit:0,

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
   
         offset:3,
        },
       mounted(){
          
          this.getStudyPlans(1);
   
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
           
           async getLevels(){
  
             let self = this;
  
             self.loading = true;
  
             self.errors = [];

             self.level_id='';

             self.section_id='';

             self.student_id='';

             axios.post('{{ url("/business/groupStudent/getLevels") }}', {
  
                period_id:self.period_id,
     
             }).then(function (response) {

                self.loading = false

                if(response.data.success==true){
  
                  self.levels=response.data.Levels;
  
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
  
          },//getLevels() 

          async getSections(){
  
             let self = this;
  
             self.loading = true;
  
             self.errors = [];

             self.section_id='';

             self.student_id='';

             axios.post('{{ url("/business/groupStudent/getSections") }}', {
  
                period_id:self.period_id,

                level_id:self.level_id,
     
             }).then(function (response) {

                self.loading = false

                if(response.data.success==true){
  
                  self.sections=response.data.Sections;
  
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
  
          },//getSections() 

         clear:function(){

            this.edit=0;

            self.errors = [];

            this.levels='';

            this.sections='';

            this.students='';

            this.period_id='';

            this.level_id='';

            this.section_id='';

            this.subject_id='';

            this.student_id='';

            this.content='';

            this.title='';

            this.start_date_study_plan='';

            this.end_date_study_plan='';
                     
            this.buttonShowDos=true;
   
            this.buttonNameDos="Crear";
      
            this.id='';
   
            this.change=0;
      
         },//clear:function()              

          async register(){
  
           let self = this;
  
           self.loading = true;
  
           self.errors = [];
  
           axios.post('{{ url("StoreStudyPlan") }}', {
  
              period_id:self.period_id,

              level_id:self.level_id,

              section_id:self.section_id,
  
              student_id:self.student_id,

              start_date_study_plan:self.start_date_study_plan,

              end_date_study_plan:self.end_date_study_plan,

              subject_id:self.subject_id,

              title:self.title,

              content:self.content,

           }).then(function (response) {

              self.loading = false;
  
              if(response.data.success==true){
  
                  self.closeModal();
   
                  self.getStudyPlans(1);
   
                  Swal.fire('Información','Registro Satisfactorio','success');
  
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

         captureRecord: function(value){

            this.clear();

            this.edit=1;

            this.buttonNameDos="Actualizar";
   
            this.id=value.id;

            this.period_id=value.period_id;

            this.getLevels();

            this.level_id=value.level_id;
            
            this.getSections();

            this.section_id=value.section_id;

            this.start_date_study_plan=value.start_date_study_plan;

            this.end_date_study_plan=value.end_date_study_plan;

            this.subject_id=value.subject_id;
            
            this.title=value.title;

            this.content=value.content;
                  
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
   
            self.errors = []
   
            axios.post('{{ url("updateStudyPlan") }}', {
   
              id:self.id,

              period_id:self.period_id,

              level_id:self.level_id,

              section_id:self.section_id,
  
              student_id:self.student_id,

              start_date_study_plan:self.start_date_study_plan,

              end_date_study_plan:self.end_date_study_plan,

              subject_id:self.subject_id,

              title:self.title,

              content:self.content,
   
            }).then(function (response) {
   
               if(response.data.success==true){
   
                  self.closeModal();
   
                  self.getStudyPlans(1);
   
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
   
                  axios.post('{{ url("destroyStudyPlan") }}', {
   
                     id:id,
   
                  }).then(function (response) {
   
                     if(response.data.success==true){
   
                        self.closeModal();
   
                        self.getStudyPlans(1);
   
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

               self.loading = false;

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
   
            this.getStudyPlans(page);
   
         },//changePage()        

         async getStudyPlans(page){
   
            let self = this;
   
            self.loading = true;
   
                  axios.post('{{ url("getStudyPlans") }}', {
                     
                     page:page,
                     
                  }).then(function (response) {
   
                     self.loading = false
   
                     if(response.data.success==true){
   
                        self.StudyPlans=response.data.StudyPlans;
   
                        self.paginate=response.data.StudyPlans.paginate;
   
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
   
         },//getStudyPlans    

        },  
    
    })        
</script>
@endpush

