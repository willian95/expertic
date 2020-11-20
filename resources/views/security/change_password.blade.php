@extends('layouts.main')
@section("content")
<section class="content profile-page" id="security">
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
            <h2>Seguridad</h2>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row clearfix">
         <div class="col-md-12">
            <div class="card student-list">
               <div class="modal-header">
                  <h6 class="modal-title">Cambio de Contraseña</h6>
               </div>
               <div class="body">
                  <div class="row align-items-center pl-4 pr-4 mb-4">

                <div class="col-12 col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="password">Nueva Contraseña</label>
                    <input type="password" v-model="password" class="form-control" id="password"  v-bind:class="{ 'is-invalid': errors.hasOwnProperty('password') }">
                    <small v-if="errors.hasOwnProperty('password')" class="text-danger ml-2">@{{ errors['password'][0] }}</small>
                  </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                  <div class="form-group">
                    <label for="password_confirmation">Verificar Contraseña</label>
                    <input type="password" v-model="password_confirmation" class="form-control" id="password_confirmation" v-bind:class="{ 'is-invalid': errors.hasOwnProperty('password_confirmation') }">
                    <small v-if="errors.hasOwnProperty('password_confirmation')" class="text-danger ml-2">@{{ errors['password_confirmation'][0] }}</small>
                  </div>
                </div>
                  </div>
               </div>
               <div class="modal-footer">
                     <button type="button" class="btn btn-info" @click="register()">Cambiar</button>                  
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@push("scripts")
<script>

   const security = new Vue({
        el: '#security',
        data:{
            
         loading:false,
   
         errors:[],

         password:'',
  
         password_confirmation:'',
   
        },
        methods:{          

          async register(){
  
           let self = this;
  
           self.loading = true;
  
           self.errors = [];
  
           axios.post('{{ url("ChangePassword") }}', {
  
              password:self.password,

              password_confirmation:self.password_confirmation,

           }).then(function (response) {

              self.loading = false;
  
              if(response.data.success==true){

                  self.password="";

                  self.password_confirmation="";

                  Swal.fire('Información','Cambio Satisfactorio','success');
  
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

</script>
@endpush

