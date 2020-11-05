@extends('layouts.main')
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
            <div class="col-12 col-lg-10 col-md-10">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Instituciones</h5>
                  </div>
                  <div class="modal-body">
                     <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-6">
                           <div class="form-group">
                              <label for="rut">Rut</label>
                              <input type="text" v-model="rut" class="form-control" id="rut" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('rut') }">
                              <small v-if="errors.hasOwnProperty('rut')" class="text-danger ml-2">@{{ errors['rut'][0] }}</small>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                           <div class="form-group">
                              <label for="logo">Logo</label>
                              <input type="file" accept="image/jpeg, image/png" v-on:change="fileImage" class="form-control" id="logo">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                           <div class="form-group">
                              <label for="institution_name">Nombre</label>
                              <input type="text" v-model="institution_name" class="form-control" id="institution_name" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('institution_name') }">
                              <small v-if="errors.hasOwnProperty('institution_name')" class="text-danger ml-2">@{{ errors['institution_name'][0] }}</small>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                           <div class="form-group">
                              <label for="reason_social">Razón Social</label>
                              <input type="text" v-model="reason_social" class="form-control" id="reason_social" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('reason_social') }">
                              <small v-if="errors.hasOwnProperty('reason_social')" class="text-danger ml-2">@{{ errors['reason_social'][0] }}</small>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                           <div class="form-group">
                              <label for="address">Dirección</label>
                              <input type="text" v-model="address" class="form-control" id="address" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('address') }">
                              <small v-if="errors.hasOwnProperty('address')" class="text-danger ml-2">@{{ errors['address'][0] }}</small>
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                           <div class="form-group">
                              <label for="website_link">Link Página Web</label>
                              <input type="text" v-model="website_link" class="form-control" id="website_link">
                           </div>
                        </div>
                        <div class="col-12 pb-4">
                           <span class="font-weight-normal">Módulos</span><br> 
                           <div id='modules' class="form-check form-check-inline" v-for="module in Modules">
                              <input class="form-check-input" type="checkbox" v-bind:id="'module.id'+'module'" v-model="modules"  v-bind:value="module.id">
                              <label class="form-check-label" for="inlineCheckbox1">@{{module.module_name}}</label>
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
            <h2>Instituciones</h2>
         </div>
         <div class="col-lg-5 col-md-6 col-sm-12">
            <button class="btn btn-white btn-icon btn-round float-right m-l-10" type="button" data-toggle="modal" data-target="#businessModal" @click="toggleModal()">
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
                              <th class="adjust-tr-10">Rut</th>
                              <th class="adjust-tr-10">Nombre</th>
                              <th class="adjust-tr-10">Razón Social</th>
                              <th class="adjust-tr-10">Dirección</th>
                              <th class="adjust-tr-10">Link Página Web</th>
                              <th class="adjust-tr-10">Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr  v-for="(Institution,index) in Institutions.institutions">
                              <td>@{{Institution.num}}</td>
                              <td>
                                 <p>@{{Institution.rut}}</p>
                              </td>
                              <td>
                                 <p>@{{Institution.institution_name}}</p>
                              </td>
                              <td>
                                 <p>@{{Institution.reason_social}}</p>
                              </td>
                              <td>
                                 <p>@{{Institution.address}}</p>
                              </td>
                              <td>
                                 <p>@{{Institution.website_link}}</p>
                              </td>
                              <td>
                                 <button class="btn btn-info" @click="captureRecord(Institution)">
                                 <i class="zmdi zmdi-edit"></i>
                                 </button>
                                 <button class="btn btn-secondary"  @click="destroy(Institution.id)">
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
   
            Modules:{!! $Modules ? $Modules : "''"!!},
   
            Institutions:'',
   
            rut:'',
   
            institution_name:'',
   
            reason_social:'',
   
            address:'',
   
            website_link:'',
   
            logo:'',
   
            modules: [],
   
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
          
          this.getInstitutions(1);
   
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
   
         fileImage:function(event){
   
            // Reference to the DOM input element
            var input = event.target;
   
            let self = this;
   
            // Ensure that you have a file before attempting to read it
            if (input.files && input.files[0]) {
   
               // create a new FileReader to read this image and convert to base64 format
               var reader = new FileReader();
   
               // Define a callback function to run, when FileReader finishes its job
               reader.onload = (e) => {
   
                  // Note: arrow function used here, so that "this.imgLogo" refers to the imgLogo of Vue component
                  // Read image as base64 and set to imgLogo
                  self.logo = e.target.result;
   
               }
               // Start the reader job - read file as a data url (base64 format)
               reader.readAsDataURL(input.files[0]);
   
            }
   
           },//file:function(event)
   
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
   
            this.rut='';
   
            this.institution_name='';
   
            this.reason_social='';
   
            this.address='';
   
            this.website_link='';
   
            this.logo='';
   
            this.modules=[];
   
            this.buttonShowDos=true;
   
            this.buttonNameDos="Crear";
      
            this.id='';
   
            this.change=0;
   
            document.getElementById("logo").value = '';
   
   
         },//clear:function()
   
         async register(){
   
            let self = this;
   
            self.loading = true;
   
            self.errors = []
   
            axios.post('{{ url("storeBusiness") }}', {
   
               rut:self.rut,
   
               institution_name:self.institution_name,
   
               reason_social:self.reason_social,
   
               address:self.address,
   
               website_link:self.website_link,
   
               logo:self.logo,
   
               modules:self.modules,
   
            }).then(function (response) {
   
               
   
               if(response.data.success==true){
   
                  self.closeModal();
   
                  self.getInstitutions(1);
   
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
   
            this.rut=value.rut;
   
            this.institution_name=value.institution_name;
   
            this.reason_social=value.reason_social;
   
            this.address=value.address;
   
            this.website_link=value.website_link;
   
            this.modules=value.modules;
   
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
   
            axios.post('{{ url("updateBusiness") }}', {
   
               id:self.id,
   
               rut:self.rut,
   
               institution_name:self.institution_name,
   
               reason_social:self.reason_social,
   
               address:self.address,
   
               website_link:self.website_link,
   
               logo:self.logo,
   
               modules:self.modules,
   
            }).then(function (response) {
   
   
               if(response.data.success==true){
   
                  self.closeModal();
   
                  self.getInstitutions(1);
   
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
   
                  axios.post('{{ url("destroyBusiness") }}', {
                     id:id,
                  }).then(function (response) {
   
                     if(response.data.success==true){
   
                        self.closeModal();
   
                        self.getInstitutions(1);
   
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
   
            this.getInstitutions(page);
   
         },//changePage()
   
         async getInstitutions(page){
   
            let self = this;
   
            self.loading = true;
   
                  axios.post('{{ url("getInstitutions") }}', {
                     
                     page:page,
                     
                  }).then(function (response) {
   
                     self.loading = false
   
                     if(response.data.success==true){
   
                        self.Institutions=response.data.Institutions;
   
                        self.paginate=response.data.Institutions.paginate;
   
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
   
         },//getInstitutions
   
       },
   
   })
   
</script>
@endpush

