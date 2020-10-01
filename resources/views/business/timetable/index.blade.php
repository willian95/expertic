@extends('layouts.main')

@section("content")

    <section style="z-index: 9999;" class="content profile-page" id="timetable">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Horarios</h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button" data-toggle="modal" data-target=".bd-example-modal-xl">
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
                                            <th class="text-center">Grado</th>
                                            <th class="text-center">Sección</th>
                                            <th class="text-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="text-center">1<sup>er</sup> Año</td>
                                            <td class="text-center">A</td>
                                            <td class="text-center">
                                                <button class="btn btn-info">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="btn btn-secondary">
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
        @include('business.modals.timetableModal')
    </section>

@endsection
@push("scripts")

    <script>
        
        const timetable = new Vue({
            el: '#timetable',
            data:{


                data:{

                      0:{id: 1, name:'1er año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'},3:{id:4, name:'D'},4:{id:5, name:'E'}},matters:{0:{id:1,name:"Castellano",bg:false}, 1:{id:2,name:"Matemática",bg:false},2:{id:3,name:"Ingles",bg:false},3:{id:4,name:"Educación Física",bg:false}, 4:{id:5,name:"Ciencias Naturales",bg:false}, 5:{id:6,name:"Geografía, historia y ciudadanía",bg:false}, 6:{id:7,name:"Orientación y convivencia",bg:false}}},

                      1:{id: 2, name:'2er año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},matters:{0:{id:1,name:"Castellano",bg:false}, 1:{id:2,name:"Matemática",bg:false},2:{id:3,name:"Ingles",bg:false},3:{id:4,name:"Educación Física",bg:false}, 4:{id:5,name:"Ciencias Naturales",bg:false}, 5:{id:6,name:"Geografía, historia y ciudadanía",bg:false}, 6:{id:7,name:"Orientación y convivencia",bg:false}}},

                      2:{id: 3, name:'3er año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},matters:{0:{id:1,name:"Castellano",bg:false}, 1:{id:2,name:"Matemática",bg:false},2:{id:3,name:"Ingles",bg:false},3:{id:4,name:"Educación Física",bg:false}, 4:{id:5,name:"Biologia",bg:false}, 5:{id:6,name:"Geografía, historia y ciudadanía",bg:false}, 6:{id:7,name:"Orientación y convivencia",bg:false}, 7:{id:8,name:"Quimica",bg:false} , 8:{id:9,name:"Fisica",bg:false}}},

                      3:{id: 4, name:'4to año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},matters:{0:{id:1,name:"Castellano",bg:false}, 1:{id:2,name:"Matemática",bg:false},2:{id:3,name:"Ingles",bg:false},3:{id:4,name:"Educación Física",bg:false}, 4:{id:5,name:"Biologia",bg:false}, 5:{id:6,name:"Geografía, historia y ciudadanía",bg:false}, 6:{id:7,name:"Orientación y convivencia",bg:false}, 7:{id:8,name:"Quimica",bg:false} , 8:{id:9,name:"Fisica",bg:false},9:{id:10,name:"Formación para la soberanía nacional",bg:false}}},

                      4:{id: 5, name:'5to año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},matters:{0:{id:1,name:"Castellano",bg:false}, 1:{id:2,name:"Matemática",bg:false},2:{id:3,name:"Ingles",bg:false},3:{id:4,name:"Educación Física",bg:false}, 4:{id:5,name:"Biologia",bg:false}, 5:{id:6,name:"Geografía, historia y ciudadanía",bg:false}, 6:{id:7,name:"Orientación y convivencia",bg:false}, 7:{id:8,name:"Quimica",bg:false} , 8:{id:9,name:"Fisica",bg:false},9:{id:10,name:"Formación para la soberanía nacional",bg:false}}},

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
                
                sections:'',

                matters:'',

                matterSelected:'',

                delete:0,
            },
            methods:{

               search(){

                   this.sections="";

                   this.matters="";

                   if(this.timetable.yearId!=""){
                      
                      for(let i in this.data)
                        if(this.data[i].id==this.timetable.yearId){

                            this.timetable.yearName=this.data[i].name;
                            
                            this.timetable.sectionId="";

                            this.sections=this.data[i].sections;

                            this.matters=this.data[i].matters;

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
                           if(this.data[i].sections.id==this.timetable.sectionId)
                              this.timetable.sectionName=this.data[i].sections.name;

               },//nameSection()

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

                this.matters='';

                this.matterSelected='';

                this.delete=0;

               }//clear()

            },

        })

            
    </script>

@endpush