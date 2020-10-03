

@extends('layouts.main')
@section("content")
<section class="content profile-page" id="timetable">
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
                     <h5 class="modal-title">Crear Horario</h5>
                  </div>
                  <div class="row justify-content-center align-items-center pt-2 pl-4 pr-4">
                     <div class="col-12 col-md-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Años</label>
                           <select class="form-control custom-select" v-model="timetable.yearId" @change="search()">
                              <option value="">Seleccione</option>
                              <option v-for="option in data" v-bind:value="option.id">
                                 @{{ option.name }}
                              </option>
                           </select>
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Secciones</label>
                           <select class="form-control custom-select" v-model="timetable.sectionId" @change="nameSection()">
                              <option value="">Seleccione</option>
                              <option v-for="option in sections" v-bind:value="option.id">
                                 @{{ option.name }}
                              </option>
                           </select>
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Profesores</label>
                           <select class="form-control custom-select" v-model="teacherId" @change="searchMatter">
                              <option value="">Seleccione</option>
                              <option v-for="teacher in teachers" v-bind:value="teacher.id">
                                 @{{ teacher.name }}&nbsp;@{{ teacher.lastname }}
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
                     <div class="col-12 text-center" v-if="timetable.sectionId!=''">
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
                     <button type="button" class="btn btn-primary" @click="create">Crear</button>
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
   
   
           data:{
   
                 0:{id: 1, name:'1er año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'},3:{id:4, name:'D'},4:{id:5, name:'E'}},teachers:{0:{id:1,name:'Abigail',lastname:'Perez',matters:{0:{id:1,name:'Castellano',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},1:{id:2,name:'Adriana',lastname:'Diaz',matters:{0:{id:2,name:'Matemática',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},2:{id:3,name:'Abel',lastname:'Prada',matters:{0:{id:3,name:'Ingles',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},3:{id:4,name:'Adrián',lastname:'Mendez',matters:{0:{id:4,name:'Educación Física',bg:false}}},4:{id:5,name:'Alba',lastname:'Blanco',matters:{0:{id:5,name:'Ciencias Naturales',bg:false}}},5:{id:6,name:'Alicia',lastname:'Bermudez',matters:{0:{id:6,name:'Geografía, historia y ciudadanía',bg:false}}}}},
   
                 1:{id: 2, name:'2do año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},teachers:{0:{id:1,name:'Abigail',lastname:'Perez',matters:{0:{id:1,name:'Castellano',bg:false}}},1:{id:2,name:'Adriana',lastname:'Diaz',matters:{0:{id:2,name:'Matemática',bg:false}}},2:{id:3,name:'Abel',lastname:'Prada',matters:{0:{id:3,name:'Ingles',bg:false}}},3:{id:4,name:'Adrián',lastname:'Mendez',matters:{0:{id:4,name:'Educación Física',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},4:{id:5,name:'Alba',lastname:'Blanco',matters:{0:{id:5,name:'Ciencias Naturales',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},5:{id:6,name:'Alicia',lastname:'Bermudez',matters:{0:{id:6,name:'Geografía, historia y ciudadanía',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}}}},
   
                 2:{id: 3, name:'3er año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},teachers:{0:{id:1,name:'Abigail',lastname:'Perez',matters:{0:{id:1,name:'Castellano',bg:false}}},1:{id:2,name:'Adriana',lastname:'Diaz',matters:{0:{id:2,name:'Matemática',bg:false}}},2:{id:3,name:'Abel',lastname:'Prada',matters:{0:{id:3,name:'Ingles',bg:false}}},3:{id:4,name:'Adrián',lastname:'Mendez',matters:{0:{id:4,name:'Educación Física',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},4:{id:5,name:'Alba',lastname:'Blanco',matters:{0:{id:5,name:'Ciencias Naturales',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},5:{id:6,name:'Alicia',lastname:'Bermudez',matters:{0:{id:6,name:'Geografía, historia y ciudadanía',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},6:{id:11,name:'Marcos',lastname:'Ruiz',matters:{0:{id:9,name:'Quimica',bg:false}}},7:{id:12,name:'Guzman',lastname:'Ramírez',matters:{0:{id:10,name:'Fisica',bg:false}}},8:{id:10,name:'Juan',lastname:'García',matters:{0:{id:8,name:'Biologia',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}}}},

                 3:{id: 4, name:'4to año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},teachers:{0:{id:7,name:'Beatriz',lastname:'Fernández',matters:{0:{id:6,name:'Geografía, historia y ciudadanía',bg:false}}},1:{id:8,name:'Carlos',lastname:'López',matters:{0:{id:3,name:'Ingles',bg:false}}},2:{id:9,name:'Richard',lastname:'Martínez',matters:{0:{id:1,name:'Castellano',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},3:{id:10,name:'Juan',lastname:'García',matters:{0:{id:8,name:'Biologia',bg:false}}},4:{id:11,name:'Marcos',lastname:'Ruiz',matters:{0:{id:9,name:'Quimica',bg:false}}},5:{id:12,name:'Guzman',lastname:'Ramírez',matters:{0:{id:10,name:'Fisica',bg:false}}},6:{id:13,name:'Olga',lastname:'Flores',matters:{0:{id:1,name:'Formación para la soberanía nacional',bg:false}}},7:{id:14,name:'Carmen',lastname:'Acosta',matters:{0:{id:2,name:'Matemática',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},8:{id:15,name:'Henrry',lastname:'Aguirre',matters:{0:{id:4,name:'Educación Física',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},9:{id:16,name:'Daniel',lastname:'Rojas',matters:{0:{id:6,name:'Geografía, historia y ciudadanía',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}}}},
               
                 4:{id: 5, name:'5to año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},teachers:{0:{id:7,name:'Beatriz',lastname:'Fernández',matters:{0:{id:6,name:'Geografía, historia y ciudadanía',bg:false}}},1:{id:8,name:'Carlos',lastname:'López',matters:{0:{id:3,name:'Ingles',bg:false}}},2:{id:9,name:'Richard',lastname:'Martínez',matters:{0:{id:1,name:'Castellano',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},3:{id:10,name:'Juan',lastname:'García',matters:{0:{id:8,name:'Biologia',bg:false}}},4:{id:11,name:'Marcos',lastname:'Ruiz',matters:{0:{id:9,name:'Quimica',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},5:{id:12,name:'Guzman',lastname:'Ramírez',matters:{0:{id:10,name:'Fisica',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},6:{id:13,name:'Olga',lastname:'Flores',matters:{0:{id:1,name:'Formación para la soberanía nacional',bg:false},1:{id:7,name:'Orientación y convivencia',bg:false}}},7:{id:14,name:'Carmen',lastname:'Acosta',matters:{0:{id:2,name:'Matemática',bg:false}}},8:{id:15,name:'Henrry',lastname:'Aguirre',matters:{0:{id:4,name:'Educación Física',bg:false}}},9:{id:16,name:'Daniel',lastname:'Rojas',matters:{0:{id:6,name:'Geografía, historia y ciudadanía',bg:false}}}}},
   
           },
   
           timetable:{
               
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
           
           sections:'',
   
           teachers:'',
   
           matters:'',
   
           matterSelected:'',
   
           delete:0,
       },
       methods:{
   
          search(){
   
              this.sections="";
   
              this.matters="";
   
              this.teachers="";
   
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
               
               this.clearTimetable();
   
               for(let i in this.matters)
                   this.matters[i].bg=false;
             
               for(let i in this.data)
                  for(let j in this.data[i].sections)
                      if(this.data[i].sections[j].id==this.timetable.sectionId)
                         this.timetable.sectionName=this.data[i].sections[j].name;
   
          },//nameSection()

          searchMatter(){

               this.matterSelected='';
               
               for(let i in this.matters)
                   this.matters[i].bg=false;

              for(let i in this.teachers)
                if(this.teachers[i].id==this.teacherId)
                  this.matters=this.teachers[i].matters;

          },//searchMatter()
   
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
             
             if(day==1){
   
               this.timetable.hours[index].Monday="";
   
             }else if(day==2){
   
               this.timetable.hours[index].Tuesday="";
   
             }else if(day==3){
   
               this.timetable.hours[index].Wednesday="";
   
             }else if(day==4){
   
               this.timetable.hours[index].Thursday="";
   
             }else if(day==5){
   
               this.timetable.hours[index].Friday="";
   
             }else if(day==6){
   
               this.timetable.hours[index].Saturday="";
   
             }else if(day==7){
   
               this.timetable.hours[index].Sunday="";
   
             }//else if(day==7)      
   
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
   
           
           this.sections='';
   
           this.teachers='';
   
           this.matters='';
   
           this.matterSelected='';
   
           this.delete=0;
   
          },//clear()
   
          create(){
   
   
              this.timetables.push(this.timetable);
   
              this.clear();
   
   
              $('.bd-example-modal-xl').css("overflow", "auto");
              
              $('.bd-example-modal-xl').modal('hide');
   
          },//create()
   
          destroy(index){
   
              Swal.fire({
                   title: 'Estas seguro',
                   text: "¡No podrás revertir esto!",
                   icon: 'warning',
                   showCancelButton: true,
                   confirmButtonColor: '#3085d6',
                   cancelButtonColor: '#d33',
                   confirmButtonText: '¡Sí, bórralo!'
               }).then((result) => {
                   if (result.isConfirmed) {
                       Swal.fire(
                           'Eliminado!',
                           'Su registro ha sido eliminado.',
                           'success'
                       )
                       this.timetables.splice(index, 1);
                   }
               });
   
          },//dedestroylete()
   
       },
   
   })
   
       
</script>
@endpush

