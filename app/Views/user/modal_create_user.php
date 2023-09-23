<!-- Modal para crear usuario -->
<div class="modal fade" id="modalCrearUsuario" tabindex="-1" role="dialog" aria-labelledby="modalCrearUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCrearUsuarioLabel">Crear Usuario</h5>
            </div>
            <div class="modal-body">
                <!-- Formulario para crear un nuevo usuario -->
                <form id="formCrearUsuario">
                    <div class="form-group">
                        <label for="createName">Nombre</label>
                        <input type="text" class="form-control" id="createName" name="name">
                    </div>
                    <div class="form-group">
                        <label for="createEmail">Correo Electrónico</label>
                        <input type="email" class="form-control" id="createEmail" name="email">
                    </div>
                    <div class="form-group">
                        <label for="createAge">Edad</label>
                        <input type="number" class="form-control" id="createAge" name="age">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnNoGuardarCrearUsuario">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarCrearUsuario">Guardar</button>
            </div>
        </div>
    </div>
</div>
