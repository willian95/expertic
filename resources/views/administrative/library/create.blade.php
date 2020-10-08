@extends('layouts.main')
@section("content")
<section class="content profile-page" id="virtualRoom">
   <div class="block-header">
      <div class="row">
         <div class="col-lg-7 col-md-6 col-sm-12">
            <h2>Registrar Libro</h2>
         </div>
      </div>
   </div>
   <div class="container-fluid">
      <div class="row clearfix">
         <div class="col-md-12">
            <div class="card student-list">
               <div class="body">
                  <div class="modal-header">
                     <h5 class="modal-title">Registrar Libro</h5>
                  </div>
                  <div class="row  align-items-center pt-2 pl-4 pr-4 mb-4">
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                           <label class="font-weight-bold" for="code">Código</label>
                           <input type="text" class="form-control" id="code">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label class="font-weight-bold" for="editorial">Editorial</label>
                           <input type="text" class="form-control" id="editorial">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label class="font-weight-bold" for="isbn">ISBN</label>
                           <input type="text" class="form-control" id="isbn">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label class="font-weight-bold" for="edition">Edición</label>
                           <input type="text" class="form-control" id="edition">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label class="font-weight-bold" for="title">Título</label>
                           <input type="text" class="form-control" id="title">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label class="font-weight-bold" for="language">Idioma</label>
                           <input type="text" class="form-control" id="language">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label class="font-weight-bold" for="subTitle">Sub Título</label>
                           <input type="text" class="form-control" id="subTitle">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label class="font-weight-bold" for="specimens">Ejemplares</label>
                           <input type="text" class="form-control" id="specimens">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label class="font-weight-bold" for="author">Autor</label>
                           <input type="text" class="form-control" id="author">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label class="font-weight-bold" for="numberPage">Número de Páginas</label>
                           <input type="text" class="form-control" id="numberPage">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label class="font-weight-bold" for="yearPublication">Año de Publicación</label>
                           <input type="text" class="form-control" id="yearPublication">
                        </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-4">
                        <div class="form-group">
                          <label class="font-weight-bold" for="type">Tipo</label><br>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                              <label class="form-check-label" for="inlineRadio1">Digital</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                              <label class="form-check-label" for="inlineRadio2">Físico</label>
                           </div>                     
                        </div>
                     </div>
                      <div class="col-12">
                        <div class="form-group">
                          <label class="font-weight-bold" for="summary">Resumen</label>
                          <textarea  class="form-control border rounded" name="summary"  cols="3" rows="2" id="summary"></textarea>
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
        el: '#library',
        data:{
         

        },
        methods:{
    
      
    
        },
    
    })   
</script>
@endpush

