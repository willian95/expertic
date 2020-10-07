@extends('layouts.main')
@section("content")
<section class="content profile-page" id="virtualRoom">
   <div class="block-header">
      <div class="row">
         <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Crear Sala Virtual</h2>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row clearfix">
         <div class="col-md-12">
            <div class="card student-list">
               <div class="body">
                  <div class="modal-header">
                     <h5 class="modal-title">Sala Virtual</h5>
                  </div>
                  <div class="row justify-content-center align-items-center pt-2 pl-4 pr-4 mb-4">
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                           <label class="font-weight-bold" for="date">Fecha</label>
                           <input type="date" class="form-control" id="date">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                           <label class="font-weight-bold" for="beginHour">Hora de  Inicio</label>
                           <input type="time" class="form-control" id="beginHour">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                           <label class="font-weight-bold" for="endHour">Hora de  Fin</label>
                           <input type="time" class="form-control" id="endHour">
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Años</label>
                           <select class="form-control custom-select" v-model="yearId" @change="search()">
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
                           <select class="form-control custom-select" v-model="sectionId">
                              <option value="">Seleccione</option>
                              <option v-for="option in sections" v-bind:value="option.id">
                                 @{{ option.name }}
                              </option>
                           </select>
                        </div>
                     </div>
                     <div class="col-12 col-md-4">
                        <div class="form-group">
                           <label class="font-weight-bold">Asignaturas</label>
                           <select class="form-control custom-select" v-model="matterId">
                              <option value="">Seleccione</option>
                              <option v-for="option in matters" v-bind:value="option.id">
                                 @{{ option.name }}
                              </option>
                           </select>
                        </div>
                     </div>
                     <div class="col-12" v-if="matterId!=''">
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
                                          <th>#</th>
                                          <th>Nombre</th>
                                          <th>Email</th>
                                          <th class="text-center">Asiganar</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td>1</td>
                                          <td>Pedro Perez</td>
                                          <td>pperez@gmail.com</td>
                                          <td class="text-center">
                                            <p>
                                              <input class="form-check-input mb-2" type="checkbox" id="inlineCheckbox1" value="option1">
                                            </p>                                          
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>2</td>
                                          <td>María Hernandez</td>
                                          <td>mhernamdez@gmail.com</td>
                                          <td class="text-center"> 
                                            <p>
                                              <input class="form-check-input mb-2" type="checkbox" id="inlineCheckbox1" value="option1">
                                            </p>                                          
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>3</td>
                                          <td>Carol Ramos</td>
                                          <td>cramos@gmail.com</td>
                                          <td class="text-center">
                                            <p>
                                              <input class="form-check-input mb-2" type="checkbox" id="inlineCheckbox1" value="option1">
                                            </p>
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
        el: '#virtualRoom',
        data:{
           modal:false,

            data:{
   
                 0:{id: 1, name:'1er año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'},3:{id:4, name:'D'},4:{id:5, name:'E'}},matters:{0:{id:1,name:'Formación general'},1:{id:2,name:'Lengua castellana y comunicación'},2:{id:3,name:'Matemática'},3:{id:4,name:'Idioma extranjero: Inglés'}, 4:{id:5,name:'Historia y ciencias sociales'},5:{id:6,name:'Biología'},6:{id:7,name:'Química'},7:{id:8,name:'Física'},8:{id:9,name:'Educación tecnológica'},9:{id:10,name:'Artes visuales'},10:{id:11,name:'Artes musicales'},11:{id:12,name:'Educación física'},12:{id:13,name:'Filosofía y psicología'}}},
   
                 1:{id: 2, name:'2do año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},matters:{0:{id:1,name:'Formación general'},1:{id:2,name:'Lengua castellana y comunicación'},2:{id:3,name:'Matemática'},3:{id:4,name:'Idioma extranjero: Inglés'}, 4:{id:5,name:'Historia y ciencias sociales'},5:{id:6,name:'Biología'},6:{id:7,name:'Química'},7:{id:8,name:'Física'},8:{id:9,name:'Educación tecnológica'},9:{id:10,name:'Artes visuales'},10:{id:11,name:'Artes musicales'},11:{id:12,name:'Educación física'},12:{id:13,name:'Filosofía y psicología'}}},
   
                 2:{id: 3, name:'3er año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},matters:{0:{id:1,name:'Formación general'},1:{id:2,name:'Lengua castellana y comunicación'},2:{id:3,name:'Matemática'},3:{id:4,name:'Idioma extranjero: Inglés'}, 4:{id:5,name:'Historia y ciencias sociales'},5:{id:6,name:'Biología'},6:{id:7,name:'Química'},7:{id:8,name:'Física'},8:{id:9,name:'Educación tecnológica'},9:{id:10,name:'Artes visuales'},10:{id:11,name:'Artes musicales'},11:{id:12,name:'Educación física'},12:{id:13,name:'Filosofía y psicología'}}},

                 3:{id: 4, name:'4to año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},matters:{0:{id:1,name:'Formación general'},1:{id:2,name:'Lengua castellana y comunicación'},2:{id:3,name:'Matemática'},3:{id:4,name:'Idioma extranjero: Inglés'}, 4:{id:5,name:'Historia y ciencias sociales'},5:{id:6,name:'Biología'},6:{id:7,name:'Química'},7:{id:8,name:'Física'},8:{id:9,name:'Educación tecnológica'},9:{id:10,name:'Artes visuales'},10:{id:11,name:'Artes musicales'},11:{id:12,name:'Educación física'},12:{id:13,name:'Filosofía y psicología'}}},
               
                 4:{id: 5, name:'5to año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},matters:{0:{id:1,name:'Formación general'},1:{id:2,name:'Lengua castellana y comunicación'},2:{id:3,name:'Matemática'},3:{id:4,name:'Idioma extranjero: Inglés'}, 4:{id:5,name:'Historia y ciencias sociales'},5:{id:6,name:'Biología'},6:{id:7,name:'Química'},7:{id:8,name:'Física'},8:{id:9,name:'Educación tecnológica'},9:{id:10,name:'Artes visuales'},10:{id:11,name:'Artes musicales'},11:{id:12,name:'Educación física'},12:{id:13,name:'Filosofía y psicología'}}},
   
           },

           yearId:"",
   
           yearName:"", 
   
           sectionId:"",
   
           sectionName:"",

           sections:'',
      
           matters:'',

           matterId:'',

        },
        methods:{
    
            toggleModal(){
    
                if(this.modal){
                    this.modal = false
                }else{
                    this.modal = true
                }
    
            },

            search(){
                 

              this.sections="";
   
              this.matters="";

              this.sectionId="";

              this.matterId="";
   
              if(this.yearId!=""){
                 
                 for(let i in this.data)
                   if(this.data[i].id==this.yearId){
   
                       this.yearName=this.data[i].name;
                       
                       this.sectionId="";
   
                       this.sections=this.data[i].sections;
      
                       this.matters=this.data[i].matters;
   
                   }//if(this.data[i].id==this.yearId)
   
              }
   
          },//search()
    
        },
    
    })   
</script>
@endpush

