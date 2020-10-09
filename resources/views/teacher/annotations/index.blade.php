@extends('layouts.main')
@section("content")
<section class="content profile-page" id="annotations">
   <div class="custom-modal-cover" v-show="modal">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-md-10">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title mt-3">Registrar Anotación</h5>
                  </div>
                  <div class="modal-body">
                  <div class="row justify-content-center align-items-center pt-2 pl-4 pr-4 mb-4">
                     <div class="col-12 col-md-6 col-lg-3">
                        <div class="form-group">
                           <label class="font-weight-bold" for="date">Fecha</label>
                           <input type="date" class="form-control" id="date">
                        </div>
                     </div>
                     <div class="col-12 col-md-3">
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
                     <div class="col-12 col-md-3">
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
                     <div class="col-12 col-md-3">
                        <div class="form-group">
                           <label class="font-weight-bold">Alumno</label>
                           <select class="form-control custom-select" v-model="matterId">
                              <option value="">Seleccione</option>
                              <option v-for="option in students" v-bind:value="option.id">
                                 @{{ option.name }}
                              </option>
                           </select>
                        </div>
                     </div>
                     <div class="col-12">
                       <div class="form-group">
                          <label class="font-weight-bold" for="annotation">Anotación</label>
                          <textarea  class="form-control border rounded" name="annotation"  cols="3" rows="2" id="summary"></textarea>
                        </div>
                     </div> 
                  </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="toggleModal()">Cerrar</button>                  
                     <button type="button" class="btn btn-info" @click="toggleModal()">Registrar</button>                  
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
                              <th class="text-center">#</th>
                              <th class="text-center">Año</th>
                              <th class="text-center">Sección</th>
                              <th class="text-center">Alumno</th>
                              <th class="text-center">Anotacón</th>
                              <th class="text-center">Fecha</th>
                              <td class="text-center">Acciones</td>
                           </tr>
                        </thead>
                        <tbody>
                           <tr>
                              <td class="text-center">1</td>
                              <td class="text-center">1er Año</td>
                              <td class="text-center">A</td>
                              <td class="text-center">Pedro Guitíerez</td>
                              <td class="text-center">Llegada tarde a clases</td>
                              <td class="text-center">06-10-2020</td>
                              <td class="text-center"> 
                                 <button class="btn btn-info" title="Editar">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="btn btn-secondary" title="Borrar">
                                 <i class="zmdi zmdi-delete"></i>
                                 </button>
                              </td>
                           </tr>
                           <tr>
                              <td class="text-center">1</td>
                              <td class="text-center">3er Año</td>
                              <td class="text-center">C</td>
                              <td class="text-center">Dana Márquez</td>
                              <td class="text-center">Falto a clases</td>
                              <td class="text-center">08-10-2020</td>
                              <td class="text-center"> 
                                 <button class="btn btn-info" title="Editar">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="btn btn-secondary" title="Borrar">
                                 <i class="zmdi zmdi-delete"></i>
                                 </button>
                              </td>
                           </tr>
                           <tr>
                              <td class="text-center">1</td>
                              <td class="text-center">5to Año</td>
                              <td class="text-center">B</td>
                              <td class="text-center">Noel Smith</td>
                              <td class="text-center">Falta a clases, motivo de enfermedad</td>
                              <td class="text-center">08-10-2020</td>
                              <td class="text-center"> 
                                 <button class="btn btn-info" title="Editar">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="btn btn-secondary" title="Borrar">
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
                     <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-left"></i></a></li>
                     <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                     <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                     <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                     <li class="page-item"><a class="page-link" href="javascript:void(0);">4</a></li>
                     <li class="page-item"><a class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-right"></i></a></li>
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
        el: '#annotations',
        data:{
           modal:false,

            data:{
   
                 0:{id: 1, name:'1er año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'},3:{id:4, name:'D'},4:{id:5, name:'E'}},students:{0:{id:1,name:'ADRIANA CAROLINA HERNANDEZ MONTERROZA'},1:{id:2,name:'ADRIANA MARCELA REY SANCHEZ'},2:{id:3,name:'ADRIANA MARCELA REY SANCHEZ'},3:{id:4,name:'ALEJANDRO ABONDANO ACEVEDO'}, 4:{id:5,name:'ALEXANDER CARVAJAL VARGAS'},5:{id:6,name:'ANDREA CATALINA ACERO CARO'},6:{id:7,name:'ANDREA LILIANA CRUZ GARCIA'},7:{id:8,name:'ANDRES FELIPE VILLA MONROY'},8:{id:9,name:'ANGELA PATRICIA MAHECHA PIÑEROS'},9:{id:10,name:'ANGELICA LISSETH BLANCO CONCHA'},10:{id:11,name:'ANGELICA MARIA ROCHA GARCIA'},11:{id:12,name:'DIANA CAROLINA LOPEZ RODRIGUEZ'},12:{id:13,name:'ANGIE TATIANA FERNÁNDEZ MARTÍNEZ'}}},
   
                 1:{id: 2, name:'2do año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},students:{0:{id:1,name:'BRIGITE POLANCO RUIZ'},1:{id:2,name:'CAMILO ENRIQUE GOMEZ RODRIGUEZ'},2:{id:3,name:'INGRID ROCIO GUERRERO PENAGOS'},3:{id:4,name:'IVONNE JOULIETTE BARRERA LOPEZ'}, 4:{id:5,name:'LISETH TATIANA SIERRA VILLAMIL'},5:{id:6,name:'RAFAEL ANDRES ALVAREZ CASTILLO'},6:{id:7,name:'SEBASTIÁN IREGUI GALEANO'},7:{id:8,name:'LISETH TATIANA SIERRA VILLAMIL'},8:{id:9,name:'JUAN FERNANDO BARJUCH MORENO'},9:{id:10,name:'JULIANA GAVIRIA GARCIA'},10:{id:11,name:'LEONARDO ANDRÉS DUEÑAS ROJAS'},11:{id:12,name:'ANGIE TATIANA FERNÁNDEZ MARTÍNEZ'},12:{id:13,name:'ESTEWIL CARLOS QUESADA CALDERÍN'}}},
   
                 2:{id: 3, name:'3er año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},students:{0:{id:1,name:'CAMILO VILLAMIZAR ARISTIZABAL'},1:{id:2,name:'CARLOS ANDRÉS POLO CASTELLANOS'},2:{id:3,name:'CAROL RUCHINA GOMEZ GIANINE'},3:{id:4,name:'JORGE MARIO OROZCO DUSSÁN'}, 4:{id:5,name:'MARIA ALEJANDRA BOLÍVAR GALEANO '},5:{id:6,name:'BOLÍVAR GALEANO'},6:{id:7,name:'YURANY CATALINA CIFUENTES MENDEZ'},7:{id:8,name:'LISETH TATIANA SIERRA VILLAMIL'},8:{id:9,name:'JULIANA GAVIRIA GARCIA'},9:{id:10,name:'JUAN SEBASTIAN TARQUINO ACOSTA'},10:{id:11,name:'LISETH TATIANA SIERRA VILLAMIL'},11:{id:12,name:'CARLOS FELIPE MOGOLLÓN PACHÓN'},12:{id:13,name:'GABRIEL MAURICIO NIETO BUSTOS'}}},

                 3:{id: 4, name:'4to año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},students:{0:{id:1,name:'CAMILO RODRÍGUEZ BOTERO'},1:{id:2,name:'CARLOS DIDIER CASTAÑO CONTRERAS'},2:{id:3,name:'CATHERINE OSPINA ALFONSO'},3:{id:4,name:'JUAN CAMILO ORTEGA PEÑA'}, 4:{id:5,name:'MARIA CAMILA  NIETO BUSTOS'},5:{id:6,name:'OSCAR  FABIAN CASTELLANOS ROJAS'},6:{id:7,name:'SEBASTIÁN IREGUI GALEANO'},7:{id:8,name:'LISETH TATIANA SIERRA VILLAMIL'},8:{id:9,name:'LAURA DIAZ MEJIA'},9:{id:10,name:'JULIANA GAVIRIA GARCIA'},10:{id:11,name:'DIEGO ALEJANDRO FORERO PEÑA'},11:{id:12,name:'CRISTINA ELIZABETH BARTHEL GUARDIOLA'},12:{id:13,name:'CATHERINE OSPINA ALFONSO'}}},
               
                 4:{id: 5, name:'5to año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},students:{0:{id:1,name:'CAMILO ALBERTO CORTÉS MONTEJO'},1:{id:2,name:'CARLOS FELIPE MOGOLLÓN PACHÓN '},2:{id:3,name:'DIANA CAROLINA LOPEZ RODRIGUEZ'},3:{id:4,name:'JUAN SEBASTIAN ROMERO ESCOBAR'}, 4:{id:5,name:'MARIA MARGARITA PEREZ MORENO'},5:{id:6,name:'RAFAEL ANDRES ALVAREZ CASTILLO'},6:{id:7,name:'DIEGO ALEJANDRO FORERO PEÑA'},7:{id:8,name:'LISETH TATIANA SIERRA VILLAMIL'},8:{id:9,name:'LINA MARÍA ZÚÑIGA RAMÍREZ'},9:{id:10,name:'LAURA CAMILA PUERTO CASTRO'},10:{id:11,name:'DIEGO ALEJANDRO FORERO PEÑA'},11:{id:12,name:'DANIELA HERNÁNDEZ BRAVO'},12:{id:13,name:'DANIELA HERNÁNDEZ BRAVO'}}},
   
           },

           yearId:"",
   
           yearName:"", 
   
           sectionId:"",
   
           sectionName:"",

           sections:'',
      
           students:'',

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
   
              this.students="";

              this.sectionId="";

              this.matterId="";
   
              if(this.yearId!=""){
                 
                 for(let i in this.data)
                   if(this.data[i].id==this.yearId){
   
                       this.yearName=this.data[i].name;
                       
                       this.sectionId="";
   
                       this.sections=this.data[i].sections;
      
                       this.students=this.data[i].students;
   
                   }//if(this.data[i].id==this.yearId)
   
              }
   
          },//search()
    
        },
    
    })        
</script>
@endpush

