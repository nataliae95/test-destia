<div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
   <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTaskModalLabel">Editar Tarea</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="editTaskForm" class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Titulo <small>*</small></label> 
                        <input type="text" class="form-control" id="task_edit_name" name="name" >
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Descripcion <small>*</small></label> 
                        <textarea name="description" class="form-control" id="task_edit_description"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Estado <small>*</small></label>
                        <select class="form-select" name="status_id" id="task_edit_status">
                           <option value="1">Pendiente</option>
                           <option value="2">Completada</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Prioridad <small>*</small></label>
                        <select class="form-select" name="priority_id" id="task_edit_priority">
                            <option value="1">Alta</option>
                            <option value="2">Media</option>
                            <option value="2">Baja</option>
                        </select>
                    </div>
                    <div>
                    
                        <div class="col-12">
                        <input type="hidden" id="task_edit" >
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
    </div>
</div>