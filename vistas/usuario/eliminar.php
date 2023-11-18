<?php
    require_once __DIR__ . '/../../controladores/UsuarioController.php';

    $idUsuario = null;
    $usuario = null;
    $msg = null;

    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['cedula'])) {
                
                $idUsuario = $_POST['cedula'];
                $usuario = $usuarioController->eliminar($idUsuario);
    
                if ($usuario){
                    $msg = '¡Usuario eliminado exitosamente!';
                } else {
                    $msg = '¡Error al intentar eliminar usuario!';
                }
            }
        }
    } catch (Exception $e){
        $msg = '¡Error al intentar eliminar usuario!';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Eliminar Usuario</title>
</head>
<body>
    <h1>Eliminar Usuario</h1>

    <form action="" method="post">
        <label for="cedula">Cedula del Usuario:</label>
        <input type="text" id="cedula" name="cedula" required><br>
        <input type="submit" value="Eliminar Usuario">
    </form>

    <?php if ($msg): ?>
        <p><?php echo $msg; ?></p>
    <?php endif; ?>

</body>
</html>
