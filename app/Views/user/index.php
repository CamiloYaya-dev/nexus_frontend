<!DOCTYPE html>
<html>
<head>
    <title>Usuarios</title>
    <!-- Agregar la referencia a Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Agregar la referencia a DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>
<body>
    <div class="container">
        
        <button class="btn btn-success" id="btnCrearUsuario">Crear Usuario</button>
        <h1>Listado de Usuarios</h1>

        <!-- Aplicar estilos de Bootstrap a la tabla -->
        <table id="tablaUsuarios" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if (isset($users['data']) && is_array($users['data'])) {
                        foreach ($users['data'] as $user):
                ?>
                    <tr>
                        <td><?= $user['id']; ?></td>
                        <td><?= $user['name']; ?></td>
                        <td><?= $user['email']; ?></td>
                        <td><?= $user['age']; ?></td>
                        <td>
                            <button class="btn btn-primary btn-editar" data-id="<?= $user['id']; ?>">Editar</button>
                            <button class="btn btn-danger btn-eliminar" data-id="<?= $user['id']; ?>">Eliminar</button>
                        </td>
                    </tr>
                <?php 
                        endforeach; 
                    }
                ?>
            </tbody>
        </table>
    </div>

    <?php require 'modal_confirm_delete_user.php'; ?>
    <?php require 'modal_edit_user.php'; ?>
    <?php require 'modal_create_user.php'; ?>
    <!-- Agregar la referencia a Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Agregar la referencia a jQuery y DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script><!-- Incluye los archivos de Toastr desde una CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="assets/user.js"></script>
</body>
</html>
