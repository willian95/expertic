@extends('layouts.main')
@section("content")
<section class="content profile-page" id="evaluation">
   <div class="custom-modal-cover hide-modal" id="modal">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-md-10">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title mt-3">Calificar</h5>
                  </div>
                  <div class="modal-body">
                     <div class="row">
                        <div class="col-12">
                              <div class="table-responsive">
                                 <table class="table table-hover m-b-0">
                                    <thead>
                                       <tr>
                                          <th class="text-center">#</th>
                                          <th>Nombre</th>
                                          <th>Email</th>
                                          <th class="text-center" style="width:10%;">Calificación</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr>
                                          <td class="text-center">1</td>
                                          <td>Pedro Perez</td>
                                          <td >pperez@gmail.com</td>
                                          <td class="text-center">
                                              <input class="form-control text-center" type="text">
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="text-center">2</td>
                                          <td>María Hernandez</td>
                                          <td>mhernamdez@gmail.com</td>
                                          <td class="text-center">
                                            <p>
                                              <input class="form-control text-center" type="text">
                                            </p>                                          
                                          </td>
                                       </tr>
                                       <tr>
                                          <td class="text-center">3</td>
                                          <td>Carol Ramos</td>
                                          <td>cramos@gmail.com</td>
                                          <td class="text-center">
                                            <p>
                                              <input class="form-control text-center" type="text">
                                            </p>                                          
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                        </div>
                        <div class="col-12 mb-5">
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="toggleModal()">Cerrar</button>                  
                     <button type="button" class="btn btn-info" @click="toggleModal()">Calificar</button>                  
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="block-header">
      <div class="row">
         <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Listado de Evaluaciones</h2>
         </div>
         <div class="col-lg-5 col-md-6 col-sm-12">
            <form action="{{ route('teacher.evaluation.create') }}" method="get">
               <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="submit">
                  <i class="zmdi zmdi-plus"></i>
               </button>
            </form>
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
                              <th class="text-center adjust-tr-15">#</th>
                              <th class="text-center adjust-tr-10">Periodo</th>
                              <th class="text-center adjust-tr-10">Nivel</th>
                              <th class="text-center adjust-tr-10">Sección</th>
                              <th class="text-center adjust-tr-10">Asignatura</th>
                              <th class="text-center adjust-tr-10">Fecha</th>
                              <th class="text-center adjust-tr-10">Hora Inicio</th>
                              <th class="text-center adjust-tr-10">Hora Fin</th>
                              <th class="text-center adjust-tr-15">Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr v-for="(evaluations,index) in Evaluations.evaluations">
                              <td class="text-center">@{{evaluations.num}}</td>
                              <td class="text-center">@{{evaluations.period}}</td>                                                            
                              <td class="text-center">@{{evaluations.level}}</td>
                              <td class="text-center">@{{evaluations.section}}</td>
                              <td class="text-center">@{{evaluations.subject}}</td>
                              <td class="text-center">@{{evaluations.date2}}</td>
                              <td class="text-center">@{{evaluations.start_time2}}</td>
                              <td class="text-center">@{{evaluations.end_time2}}</td>
                              <td class="text-center"> 
                                 <button class="btn btn-warning" title="Calificar" @click="toggleModal">
                                 <i class="zmdi zmdi-assignment"></i>
                                 </button>
                                 <button class="btn btn-info" title="Editar">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="btn btn-secondary" title="Borrar" @click="destroy(evaluations.id)">
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
        el: '#evaluation',
        data:{

           Evaluations:'',

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
          
          this.getEvaluations(1);
   
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

         async destroy(id){
   
            let self = this;
   
            self.loading = true;
   
            self.errors = []
   
            Swal.fire({title: 'Estas seguro?',text: "No podrás revertir esto!",icon: 'warning',showCancelButton: true,confirmButtonColor: '#3085d6',cancelButtonColor: '#d33',confirmButtonText: 'Si, bórralo!',cancelButtonText: 'Cancelar'}).then((result) => {
            
               if (result.isConfirmed) {
   
                  axios.post('{{ url("destroyEvaluation") }}', {
   
                     id:id,
   
                  }).then(function (response) {
   
                     if(response.data.success==true){
      
                        self.getEvaluations(1);
   
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

         changePage(page){
   
            this.paginate.current_page=page;
   
            this.getEvaluations(page);
   
         },//changePage()        

         async getEvaluations(page){
   
            let self = this;
   
            self.loading = true;
   
                  axios.post('{{ url("getEvaluations") }}', {
                     
                     page:page,
                     
                  }).then(function (response) {
   
                     self.loading = false
   
                     if(response.data.success==true){
   
                        self.Evaluations=response.data.Evaluations;
   
                        self.paginate=response.data.Evaluations.paginate;
   
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
   
         },//getEvaluations    

    
        },
    
    })        
</script>
@endpush

