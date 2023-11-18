<?php
    require_once __DIR__ . '/../../controladores/UsuarioController.php';

    $idUsuario = null;
    $usuario = null;
    $msgObtenerUsuario = null; 
    $msgEditarUsuario = null; 

    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['busqueda'])) {
                $idUsuario = $_POST['busqueda'];
                $usuario = $usuarioController->obtenerPorId($idUsuario);
                $msgObtenerUsuario = null; 
            }
        }
    } catch (Exception $e){
        $msgObtenerUsuario = 'Error al intentar cargar usuario';
    }

    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editarUsuario'])) {

            $cedula = $_POST['cedula'];
            $clave = $_POST['clave'];
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $email = $_POST['email'];
    
            $datos = array(
                'clave' => $clave,
                'nombre' => $nombre,
                'telefono' => $telefono,
                'email' => $email
            );
    
            $usuarioEditado = $usuarioController->editar($cedula, $datos);
    
            if ($usuarioEditado) {
                $msgEditarUsuario = 'Usuario editado exitosamente!';
            } else {
                $msgEditarUsuario = 'Error al editar el usuario.';
            }
        }
    } catch (Exception $e){
        $msgEditarUsuario = 'Error al editar el usuario';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Usuario</h1>

    <form action="" method="post">
        <label for="busqueda">Cedula del Usuario:</label>
        <input type="text" id="busqueda" name="busqueda" required><br>
        <input type="submit" value="Cargar Usuario">
    </form>

    <?php if ($msgObtenerUsuario): ?>
        <p><?php echo $msgObtenerUsuario; ?></p>
    <?php endif; ?>

    <?php if ($usuario): ?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $idUsuario; ?>">
            <label for="cedula">Cédula:</label>
            <input type="text" id="cedula" name="cedula" value="<?php echo $usuario['cedula']; ?>" required readonly><br>
            <label for="clave">Contraseña:</label>
            <input type="password" id="clave" name="clave" value="<?php echo $usuario['clave']; ?>" required><br>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>" required><br>
            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $usuario['telefono']; ?>" required><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $usuario['email']; ?>" required><br>
            <input type="submit" name="editarUsuario" value="Guardar Cambios">
        </form>
    <?php endif; ?>

    <?php if ($msgEditarUsuario): ?>
        <p><?php echo $msgEditarUsuario; ?></p>
    <?php endif; ?>
</body>
</html>
