   <div class="custom-modal-cover" v-show="modal">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-md-10">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title">Profesores</h5>
                  </div>
                  <div class="modal-body">
                     <div class="row justify-content-center">
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="name">Rut</label>
                              <input type="text" class="form-control" id="name">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="name">Nombres</label>
                              <input type="text" class="form-control" id="name">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="lastname">Apellidos</label>
                              <input type="text" class="form-control" id="lastname">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" id="email">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="password">Contraseña</label>
                              <input type="text" class="form-control" id="password">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label for="url_page">Verificar Contraseña</label>
                              <input type="text" class="form-control" id="url_page">
                           </div>
                        </div>
                        <div class="col-12 pb-4 text-justify">
                           <span class="font-weight-normal">Asignaturas</span><br> 
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                              <label class="form-check-label" for="inlineCheckbox1">Lengua y Comunicación.</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                              <label class="form-check-label" for="inlineCheckbox2">Matemáticas.</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
                              <label class="form-check-label" for="inlineCheckbox3">Historia</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                              <label class="form-check-label" for="inlineCheckbox3">Geografía</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                              <label class="form-check-label" for="inlineCheckbox1">Lengua y Comunicación.</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                              <label class="form-check-label" for="inlineCheckbox2">Física</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" >
                              <label class="form-check-label" for="inlineCheckbox3">Química</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                              <label class="form-check-label" for="inlineCheckbox3">Biología</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                              <label class="form-check-label" for="inlineCheckbox3">Inglés</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3">
                              <label class="form-check-label" for="inlineCheckbox3">Educación Física</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal" @click="addTeacher()">Cerrar</button>
                     <button type="button" class="btn btn-primary">Crear</button>
                  </div>
               </div>
            </div>
         </div>
      </div>