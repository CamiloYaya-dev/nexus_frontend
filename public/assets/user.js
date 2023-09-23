$(document).ready(function() {
    $('#tablaUsuarios').DataTable({
        "pageLength": 5, // Establece el número de registros por página
        "language": {
            "emptyTable": "No hay datos disponibles en la tabla",
        }
    });
    $('#tablaUsuarios').on('click', '.btn-eliminar', function() {
        idToDelete = $(this).data('id'); // Obtener el ID del registro
        $('#btnConfirmarEliminar').data('id', idToDelete); // Almacenar el ID en el botón de confirmación
        $('#modalEliminar').modal('show'); // Mostrar el modal de confirmación
    });

    $('#tablaUsuarios').on('click', '.btn-editar', function () {
        userIdToUpdate = $(this).data('id'); // Obtener el ID del usuario a editar

        // Obtener los detalles del usuario y completar el formulario en el modal
        $.get('user/show/' + userIdToUpdate, function (response) {
            console.log(response)
            $('#editUserId').val(response.data.id);
            $('#editName').val(response.data.name);
            $('#editEmail').val(response.data.email);
            $('#editAge').val(response.data.age);

            // Mostrar el modal
            $('#modalEditar').modal('show');
        });
    });
    let idToDelete; // Variable global para almacenar el ID del registro a eliminar

    // Manejar el clic en el botón de confirmación de eliminación
    $('#btnConfirmarEliminar').on('click', function() {
        // Obtener el ID almacenado en el botón
        const id = $(this).data('id');
        if (!validateUserData('Delete', '', '', '', id)) {
            return; // No enviar la solicitud si la validación falla
        }

        // Realizar la solicitud DELETE al método delete en el controlador
        $.ajax({
            url: 'user/delete/' + id, // URL del controlador y ID a eliminar
            type: 'DELETE', // Método HTTP DELETE
            success: function(response) {
                $('#modalEliminar').modal('hide'); // Cerrar el modal
                toastr.success(response.message);
                setTimeout(function(){
                    window.location.reload();
                }, 1000);
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
    
    $('#btnNoEliminar').on('click', function() {
        $('#modalEliminar').modal('hide'); // Cerrar el modal
    });

    $('#btnNoGuardarEditar').on('click', function() {
        $('#modalEditar').modal('hide'); // Cerrar el modal
    });

    $('#btnNoGuardarCrearUsuario').on('click', function() {
        $('#modalCrearUsuario').modal('hide'); // Cerrar el modal
    });

    // Manejar el clic en el botón "Guardar"
    $('#btnGuardarEditar').on('click', function () {
        // Obtener los datos del formulario
        const id = $('#editUserId').val();
        const name = $('#editName').val();
        const email = $('#editEmail').val();
        const age = $('#editAge').val();

        if (!validateUserData('Update', name, email, age, id)) {
            return; // No enviar la solicitud si la validación falla
        }

        // Crear un objeto con los datos
        const userData = {
            id: id,
            name: name,
            email: email,
            age: age
        };

        // Enviar los datos al controlador "update" como JSON
        $.ajax({
            url: 'user/update/' + userIdToUpdate,
            type: 'PUT',
            contentType: 'application/json', // Especificar el tipo de contenido JSON
            data: JSON.stringify(userData), // Convertir el objeto a JSON
            success: function (response) {
                $('#modalEditar').modal('hide'); // Cerrar el modal
                toastr.success(response.message);
                setTimeout(function(){
                    window.location.reload();
                }, 1000);
            },
            error: function (error) {
                console.error(error);
            }
        });
    });

    // Manejar el clic en el botón "Crear Usuario"
    $('#btnCrearUsuario').on('click', function () {
        // Limpiar los campos del formulario en el modal
        $('#createName').val('');
        $('#createEmail').val('');
        $('#createAge').val('');

        // Mostrar el modal
        $('#modalCrearUsuario').modal('show');
    });

    // Manejar el clic en el botón "Guardar" en el modal de creación de usuario
    $('#btnGuardarCrearUsuario').on('click', function () {
        // Obtener los datos del formulario
        const name = $('#createName').val();
        const email = $('#createEmail').val();
        const age = $('#createAge').val();

        if (!validateUserData('Create', name, email, age, 0)) {
            return; // No enviar la solicitud si la validación falla
        }

        // Crear un objeto con los datos
        const userData = {
            name: name,
            email: email,
            age: age
        };

        // Enviar los datos al controlador "create" como JSON
        $.ajax({
            url: 'user/create',
            type: 'POST',
            contentType: 'application/json', // Especificar el tipo de contenido JSON
            data: JSON.stringify(userData), // Convertir el objeto a JSON
            success: function (response) {
                $('#modalCrearUsuario').modal('hide'); // Cerrar el modal
                toastr.success(response.message);
                setTimeout(function(){
                    window.location.reload();
                }, 1000);
                
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
});

// Función para validar los datos del usuario y mostrar notificaciones Toastr
function validateUserData(action, name, email, age, id) {
    let isValid = true; // Variable para rastrear si todos los campos son válidos

    if ((action === 'Create' || action === 'Update') && name.length === 0) {
        toastr.error('Por favor, ingrese un nombre válido.');
        isValid = false; // Marcar como inválido
    }

    if ((action === 'Create' || action === 'Update') && (email.length === 0 || !isValidEmail(email))) {
        toastr.error('Por favor, ingrese un correo electrónico válido.');
        isValid = false; // Marcar como inválido
    }

    if ((action === 'Create' || action === 'Update') && (isNaN(age) || age < 0 || age > 120)) {
        toastr.error('Por favor, ingrese una edad válida.');
        isValid = false; // Marcar como inválido
    }

    if ((action === 'Delete' || action === 'Update') && (isNaN(id) || id < 1)) {
        toastr.error('El id no es valido');
        isValid = false; // Marcar como inválido
    }

    return isValid; // Retorna verdadero si todos los campos son válidos
}

// Función para validar el formato de correo electrónico
function isValidEmail(email) {
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(email);
}
