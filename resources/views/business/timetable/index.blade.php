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

                      0:{id: 1, name:'1er año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'},3:{id:4, name:'D'},4:{id:5, name:'E'}},matters:{0:{id:1,name:"Castellano"}, 1:{id:2,name:"Matemática"},2:{id:3,name:"Ingles"},3:{id:4,name:"Educación Física"}, 4:{id:5,name:"Ciencias Naturales"}, 5:{id:6,name:"Geografía, historia y ciudadanía"}, 6:{id:7,name:"Orientación y convivencia"}}},

                      1:{id: 2, name:'2er año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},matters:{0:{id:1,name:"Castellano"}, 1:{id:2,name:"Matemática"},2:{id:3,name:"Ingles"},3:{id:4,name:"Educación Física"}, 4:{id:5,name:"Ciencias Naturales"}, 5:{id:6,name:"Geografía, historia y ciudadanía"}, 6:{id:7,name:"Orientación y convivencia"}}},

                      2:{id: 3, name:'3er año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},matters:{0:{id:1,name:"Castellano"}, 1:{id:2,name:"Matemática"},2:{id:3,name:"Ingles"},3:{id:4,name:"Educación Física"}, 4:{id:5,name:"Biologia"}, 5:{id:6,name:"Geografía, historia y ciudadanía"}, 6:{id:7,name:"Orientación y convivencia"}, 7:{id:8,name:"Quimica"} , 8:{id:9,name:"Fisica"}}},

                      3:{id: 4, name:'4to año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},matters:{0:{id:1,name:"Castellano"}, 1:{id:2,name:"Matemática"},2:{id:3,name:"Ingles"},3:{id:4,name:"Educación Física"}, 4:{id:5,name:"Biologia"}, 5:{id:6,name:"Geografía, historia y ciudadanía"}, 6:{id:7,name:"Orientación y convivencia"}, 7:{id:8,name:"Quimica"} , 8:{id:9,name:"Fisica"},9:{id:10,name:"Formación para la soberanía nacional"}}},

                      4:{id: 5, name:'5to año',sections:{0:{id:1, name:'A'},1:{id:2, name:'B'},2:{id:3, name:'C'}},matters:{0:{id:1,name:"Castellano"}, 1:{id:2,name:"Matemática"},2:{id:3,name:"Ingles"},3:{id:4,name:"Educación Física"}, 4:{id:5,name:"Biologia"}, 5:{id:6,name:"Geografía, historia y ciudadanía"}, 6:{id:7,name:"Orientación y convivencia"}, 7:{id:8,name:"Quimica"} , 8:{id:9,name:"Fisica"},9:{id:10,name:"Formación para la soberanía nacional"}}},

                },

                timetable:{
                    
                    yearId:"",

                    sectionId:"",

                },
                
                sections:'',

                matters:'',
            },
            methods:{

               search(){

                   this.sections="";

                   this.matters="";

                   if(this.timetable.yearId!=""){

                      for(let i in this.data)
                        if(this.data[i].id==this.timetable.yearId){

                            this.sections=this.data[i].sections;

                            this.matters=this.data[i].matters;

                        }//if(this.data[i].id==this.timetable.yearId)

                   }else{

                        this.sections="";

                        this.timetable.sectionId="";

                        this.matters="";


                   }//else

               },//search()


            },

        })

            
    </script>

@endpush