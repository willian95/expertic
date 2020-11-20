@extends('layouts.main')
@section("content")
<section class="content profile-page" id="teacher">
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
   <div class="block-header">
      <div class="row">
         <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Gestionar Evaluación</h2>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row clearfix">
         <div class="col-md-12">
            <div class="card student-list">
               <div class="modal-header">
                  <h6 class="modal-title">Evaluación</h6>
               </div>
               <div class="body">
                  <div class="row align-items-center pl-4 pr-4 mb-4">
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Periodos</label>
                           <select class="form-control custom-select" v-model="period_id" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('period_id') }" @change="getLevels">
                              <option value="">Seleccione</option>
                              <option v-for="option in periods" v-bind:value="option.id">
                                 @{{ option.period }}
                              </option>
                           </select>
                          <small v-if="errors.hasOwnProperty('period_id')" class="text-danger ml-2">@{{ errors['period_id'][0] }}</small>
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Niveles</label>
                           <select class="form-control custom-select" v-model="level_id" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('level_id') }" @change="getSections">
                              <option value="">Seleccione</option>
                              <option v-for="option in levels" v-bind:value="option.level_id">
                                 @{{ option.level }}
                              </option>
                           </select>
                          <small v-if="errors.hasOwnProperty('level_id')" class="text-danger ml-2">@{{ errors['level_id'][0] }}</small>
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Secciones</label>
                           <select class="form-control custom-select" v-model="section_id" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('section_id') }" @change="getStudents">
                              <option value="">Seleccione</option>
                              <option v-for="option in sections" v-bind:value="option.section_id">
                                 @{{ option.section }}
                              </option>
                           </select>
                          <small v-if="errors.hasOwnProperty('section_id')" class="text-danger ml-2">@{{ errors['section_id'][0] }}</small>
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                           <label class="font-weight-bold">Asignaturas</label>
                           <select class="form-control custom-select" v-model="subject_id" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('subject_id') }">
                              <option value="">Seleccione</option>
                              <option v-for="option in Subjects" v-bind:value="option.id">
                                 @{{ option.subject }}
                              </option>
                           </select>
                          <small v-if="errors.hasOwnProperty('subject_id')" class="text-danger ml-2">@{{ errors['subject_id'][0] }}</small>
                        </div>
                     </div>                     
                     <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                           <label class="font-weight-bold" for="date">Fecha</label>
                           <input type="date" class="form-control" id="date"  v-model="date" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('date') }">
                           <small v-if="errors.hasOwnProperty('date')" class="text-danger ml-2">@{{ errors['date'][0] }}</small>
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                           <label class="font-weight-bold" for="start">Hora de  Inicio</label>
                           <input type="time" class="form-control" id="start" v-model="start_time"  v-bind:class="{ 'is-invalid': errors.hasOwnProperty('start_time') }">
                           <small v-if="errors.hasOwnProperty('start_time')" class="text-danger ml-2">@{{ errors['start_time'][0] }}</small>
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                           <label class="font-weight-bold" for="end">Hora de  Fin</label>
                           <input type="time" class="form-control" id="end" v-model="end_time" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('end_time') }">
                           <small v-if="errors.hasOwnProperty('end_time')" class="text-danger ml-2">@{{ errors['end_time'][0] }}</small>
                        </div>
                     </div>
                     <div class="col-12" v-if="students.length>0">
                        <div class="row mt-4">
                           <div class="col-lg-7 col-md-6 col-sm-12">
                              <label class="font-weight-bold">Listado de Alumnos</label>
                           </div>
                        </div>
                        <div class="row clearfix">
                           <div class="col-md-12">
                              <div class="table-responsive">
                                 <table class="table table-hover m-b-0">
                                    <thead>
                                       <tr>
                                          <th class="adjust-tr-25">#</th>
                                          <th class="adjust-tr-25">Nombre</th>
                                          <th class="adjust-tr-25">Email</th>
                                          <th class="adjust-tr-25 text-center">Asignar</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr v-for="(option,index) in students">
                                          <td><p>@{{index+1}}</p></td>
                                          <td><p>@{{option.student_names}}</p></td>
                                          <td><p>@{{option.student_email}}</p></td>
                                          <td class="text-center" style="text-align: center; vertical-align: middle;">
                                             <input class="form-check-input" type="checkbox" v-bind:id="option.id" v-model="students_evaluations"  v-bind:value="option.student_id">
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 <small v-if="errors.hasOwnProperty('students')" class="text-danger ml-2">@{{ errors['students'][0] }}</small>
                              </div>
                           </div>
                        </div>
                     </div> 
                  </div>
               </div>
               <div class="modal-footer">
                     <button type="button" class="btn btn-info" @click="register()">Crear</button>                  
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@push("scripts")
<script>
   
   let start_time='';

   let end_time='';

   const teacher = new Vue({
        el: '#teacher',
        data:{
            
         loading:false,
   
         errors:[],

         periods:{!! $Period ? $Period : "''"!!},

         Subjects:{!! $Subjects ? $Subjects : "''"!!},

         levels:'',

         sections:'',

         students:'',

         students_evaluations:[],

         period_id:'',

         level_id:'',

         section_id:'',

         subject_id:'',

         student_id:'',

         date:'',

         start_time:'',

         end_time:'',
   
        },
        methods:{
           
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

          async getStudents(){
  
             let self = this;
  
             self.loading = true;
  
             self.errors = [];

             self.student_id='';
             
             axios.post('{{ url("/business/groupStudent/getStudents") }}', {
  
                period_id:self.period_id,

                level_id:self.level_id,

                section_id:self.section_id,
       
             }).then(function (response) {

                self.loading = false

                if(response.data.success==true){
  
                  self.students=response.data.Students;
  
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
  
          },//getStudents()   
  
          async register(){
  
           let self = this;
  
           self.loading = true;
  
           self.errors = [];
  
           axios.post('{{ url("StoreEvaluation") }}', {
  
              period_id:self.period_id,

              level_id:self.level_id,

              section_id:self.section_id,
  
              date:self.date,

              subject_id:self.subject_id,

              start_time:self.start_time,

              end_time:self.end_time,

              students:self.students_evaluations,

           }).then(function (response) {

              self.loading = false;
  
              if(response.data.success==true){
        
                  Swal.fire('Información','Registro Satisfactorio','success').then(function() {
                    
                     window.location.href="{{ url('/teacher/evaluation/list') }}";

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
    
    });

   $('#start').timepicker({
      uiLibrary: 'bootstrap4'
   });

   $('#end').timepicker({
      uiLibrary: 'bootstrap4'
   });

   $( "#start" ).change(function() {
       teacher.start_time=$( "#start" ).val();
   });

   $( "#end" ).change(function() {
       teacher.end_time=$( "#end" ).val();
   });

</script>
@endpush

