<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Crear Horario</h5>
        </div>
            <div class="row pt-2 pl-4 pr-5">
                <div class="col-4">

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
                <div class="col-4">

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

            </div>




        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary">Crear</button>
        </div>
    </div>
  </div>
</div>