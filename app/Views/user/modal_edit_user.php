<!-- Modal para editar usuario -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="modalEditarLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditarLabel">Editar Usuario</h5>
            </div>
            <div class="modal-body">
                <!-- Formulario para editar los datos del usuario -->
                <form id="formEditar">
                    <input type="hidden" name="id" id="editUserId">
                    <div class="form-group">
                        <label for="editName">Nombre</label>
                        <input type="text" class="form-control" id="editName" name="name">
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Correo Electrónico</label>
                        <input type="email" class="form-control" id="editEmail" name="email">
                    </div>
                    <div class="form-group">
                        <label for="editAge">Edad</label>
                        <input type="number" class="form-control" id="editAge" name="age">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnNoGuardarEditar">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarEditar">Guardar</button>
            </div>
        </div>
    </div>
</div>
