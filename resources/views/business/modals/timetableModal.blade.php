<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Crear Horario</h5>
         </div>
         <div class="row justify-content-center align-items-center pt-2 pl-4 pr-4">
            <div class="col-12 col-md-6">
               <div class="form-group">
                  <label class="font-weight-bold">Años</label>
                  <select class="form-control custom-select" v-model="timetable.yearId" @change="search()">
                     <option value="">Seleccione</option>
                     <option v-for="option in data" v-bind:value="option.id">
                        @{{ option.name }}
                     </option>
                  </select>
               </div>
            </div>
            <div class="col-12 col-md-6">
               <div class="form-group">
                  <label class="font-weight-bold">Secciones</label>
                  <select class="form-control custom-select" v-model="timetable.sectionId">
                     <option value="">Seleccione</option>
                     <option v-for="option in sections" v-bind:value="option.id">
                        @{{ option.name }}
                     </option>
                  </select>
               </div>
            </div>
            <div class="col-12" v-if="timetable.sectionId!=''">
               <div class="row justify-content-center">
                  <div class="col-12">
                     <label class="font-weight-bold">Seleccione la materia que desea agregar</label>
                  </div>
                  <div class="col-12 col-md-2 bg-info m-1 text-center rounded-pill font-weight-bold" v-bind:class="{ 'bg-success': matt.bg }" v-for="(matt,index) in matters">
                     <p class="p-0 m-0 align-middle p-1" style="line-height: 1em; cursor: pointer;"   @click="selectMatter(matt,index)">@{{matt.name}}</p>
                  </div>
               </div>
            </div>
            <div class="col-12 text-center" v-if="timetable.sectionId!=''">
               <h4>Horario</h4>
               <table class="table table-hover table-bordered">
                  <thead>
                     <tr class="bg-info">
                        <th scope="col" class="text-center" style="width: 5%;"><i class="zmdi zmdi-timer pr-1"></i>Horario</th>
                        <th scope="col" class="text-center"><i class="zmdi zmdi-chevron-right pr-1"></i>Lunes</th>
                        <th scope="col" class="text-center"><i class="zmdi zmdi-chevron-right pr-1"></i>Martes</th>
                        <th scope="col" class="text-center"><i class="zmdi zmdi-chevron-right pr-1"></i>Miercoles</th>
                        <th scope="col" class="text-center"><i class="zmdi zmdi-chevron-right pr-1"></i>Jueves</th>
                        <th scope="col" class="text-center"><i class="zmdi zmdi-chevron-right pr-1"></i>Viernes</th>
                        <th scope="col" class="text-center"><i class="zmdi zmdi-chevron-right pr-1"></i>Sabado</th>
                        <th scope="col" class="text-center"><i class="zmdi zmdi-chevron-right pr-1"></i>Domingo</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr v-for="(hours, index) in timetable.hours">
                        <th scope="row" style="white-space: normal;"><p>@{{hours.hour}}</p></th>
                        <th style="cursor: pointer; white-space: normal;" @click="assignSubject(index,1)"><p  v-if="hours.Monday!=''">@{{hours.Monday.name}}</p> <p v-if="hours.Monday!=''" class="p-0 m-0 text-right"><i class="zmdi zmdi-delete text-danger" title="Quitar" @click="deleteSubject(index,1)"></i></p></th>
                        <th style="cursor: pointer; white-space: normal;" @click="assignSubject(index,2)"><p  v-if="hours.Tuesday!=''">@{{hours.Tuesday.name}}</p> <p v-if="hours.Tuesday!=''" class="p-0 m-0 text-right"><i class="zmdi zmdi-delete text-danger" title="Quitar" @click="deleteSubject(index,2)"></i></p></th>
                        <th style="cursor: pointer; white-space: normal;" @click="assignSubject(index,3)"><p  v-if="hours.Wednesday!=''">@{{hours.Wednesday.name}}</p><p v-if="hours.Wednesday!=''" class="p-0 m-0 text-right"><i class="zmdi zmdi-delete text-danger" title="Quitar" @click="deleteSubject(index,3)"></i></p></th>
                        <th style="cursor: pointer; white-space: normal;" @click="assignSubject(index,4)"><p  v-if="hours.Thursday!=''">@{{hours.Thursday.name}}</p><p v-if="hours.Thursday!=''" class="p-0 m-0 text-right"><i class="zmdi zmdi-delete text-danger" title="Quitar" @click="deleteSubject(index,4)"></i></p></th>
                        <th style="cursor: pointer; white-space: normal;" @click="assignSubject(index,5)"><p  v-if="hours.Friday!=''">@{{hours.Friday.name}}</p><p v-if="hours.Friday!=''" class="p-0 m-0 text-right"><i class="zmdi zmdi-delete text-danger" title="Quitar" @click="deleteSubject(index,5)"></i></p></th>
                        <th style="cursor: pointer; white-space: normal;" @click="assignSubject(index,6)"><p  v-if="hours.Saturday!=''">@{{hours.Saturday.name}}</p><p v-if="hours.Saturday!=''" class="p-0 m-0 text-right"><i class="zmdi zmdi-delete text-danger" title="Quitar" @click="deleteSubject(index,6)"></i></p></th>
                        <th style="cursor: pointer; white-space: normal;" @click="assignSubject(index,7)"><p  v-if="hours.Sunday!=''">@{{hours.Sunday.name}}</p><p v-if="hours.Sunday!=''" class="p-0 m-0 text-right"><i class="zmdi zmdi-delete text-danger" title="Quitar" @click="deleteSubject(index,7)"></i></p></th>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Crear</button>
         </div>
      </div>
   </div>
</div>

