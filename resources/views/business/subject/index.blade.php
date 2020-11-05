@extends("layouts.main")
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
            <div class="col-12 col-lg-8 col-md-8">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Asignaturas</h5>
                  </div>
                  <div class="modal-body">
                     <div class="row justify-content-center">
                        <div class="col-12">
                           <div class="form-group">
                              <label for="subject">Asignatura</label>
                              <input type="text" v-model="subject" class="form-control" id="subject" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('subject') }">
                              <small v-if="errors.hasOwnProperty('subject')" class="text-danger ml-2">@{{ errors['subject'][0] }}</small>
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
            <h2>Asignaturas</h2>
         </div>
         <div class="col-lg-5 col-md-6 col-sm-12">
            <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button" @click="toggleModal">
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
                              <th class="adjust-tr-80">Asignatura</th>
                              <th class="adjust-tr-10">Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr  v-for="(subjectItem,index) in    Subjects.subjects">
                              <td>@{{subjectItem.num}}</td>
                              <td>
                                 <p>@{{subjectItem.subject}}</p>
                              </td>
                              <td>
                                 <button class="btn btn-info" @click="captureRecord(subjectItem)">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="btn btn-secondary"  @click="destroy(subjectItem.id)">
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
   
            Subjects:'',
   
            subject:'',
   
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
          
          this.getSubjects(1);
   
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
   
            this.subject='';
                     
            this.buttonShowDos=true;
   
            this.buttonNameDos="Crear";
      
            this.id='';
   
            this.change=0;
      
         },//clear:function()
   
         async register(){
   
            let self = this;
   
            self.loading = true;
   
            self.errors = []
   
            axios.post('{{ url("storeSubject") }}', {
   
               subject:self.subject,
   
            }).then(function (response) {
   
               if(response.data.success==true){
   
                  self.closeModal();
   
                  self.getSubjects(1);
   
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
   
            this.subject=value.subject;
                  
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
   
            axios.post('{{ url("updateSubject") }}', {
   
               id:self.id,
   
               subject:self.subject,
   
            }).then(function (response) {
   
               if(response.data.success==true){
   
                  self.closeModal();
   
                  self.getSubjects(1);
   
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
   
                  axios.post('{{ url("destroySubject") }}', {
   
                     id:id,
   
                  }).then(function (response) {
   
                     if(response.data.success==true){
   
                        self.closeModal();
   
                        self.getSubjects(1);
   
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
   
            this.getSubjects(page);
   
         },//changePage()
   
         async getSubjects(page){
   
            let self = this;
   
            self.loading = true;
   
                  axios.post('{{ url("getSubjects") }}', {
                     
                     page:page,
                     
                  }).then(function (response) {
   
                     self.loading = false
   
                     if(response.data.success==true){
   
                        self.Subjects=response.data.Subjects;
   
                        self.paginate=response.data.Subjects.paginate;
   
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
   
         },//getSubjects
   
       },
   
   })
   
</script>
@endpush
