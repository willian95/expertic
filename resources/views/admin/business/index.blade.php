@extends('layouts.main')
@section("content")
<section class="content profile-page" id="business">
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
                              <input type="file" accept="image/*" v-on:change="fileImage" class="form-control" id="logo">
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
                           <tr  v-for="(Institution,index) in Institutions">
                              <td>@{{index+1}}</td>
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
      
       el: '#business',

       data:{

            loading:false,

            modal:false,

            errors:[],

            Modules:{!! $Modules ? $Modules : "''"!!},

            Institutions:{!! $Institutions ? $Institutions : "''"!!},

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

            search:'',

            currentSort:'id',//campo por defecto que tomara para ordenar

            currentSortDir:'desc',//order asc

            pageSize:'5',//Registros por pagina

            optionspageSize: [
               { text: '5', value: 5 },
               { text: '10', value: 10 },
               { text: '25', value: 25 },
               { text: '50', value: 50 },
               { text: '100', value: 100 }
            ],//Registros por pagina

            currentPage:1,//Pagina 1

            statusFiltro:1,

       },
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
   
           },
   
            closeModal(){
               
               this.clear();
   
               document.getElementById("modal").classList.add("hide-modal");
   
               document.getElementById("modal").classList.remove("show-modal");
   
           },
   
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
   
            this.search='';
   
            this.id='';
   
            this.change=0;
   
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

               self.loading = false

               if(response.data.success==true){

                  self.clear();

                  self.Institutions=response.data.Institutions;

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

               self.loading = false

               if(response.data.success==true){

                  self.clear();

                  self.Institutions=response.data.Institutions;

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

                     self.loading = false

                     if(response.data.success==true){

                        self.clear();

                        self.Institutions=response.data.Institutions;

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
   
       },
   
   })
   
</script>
@endpush

