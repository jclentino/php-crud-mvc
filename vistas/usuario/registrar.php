<?php
    require_once __DIR__ . '/../../controladores/UsuarioController.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Crear Usuario</title>
</head>
<body>
    <h1>Crear Nuevo Usuario</h1>
    <?php
        require_once __DIR__ . '/../../controladores/UsuarioController.php'; 
        
        $msg = null; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                if (empty($_POST['cedula']) || empty($_POST['clave']) || empty($_POST['nombre']) || empty($_POST['telefono']) || empty($_POST['email'])) {
                    $msg = 'Debes completar todos los datos del formulario';
                } else {
                    $datos = array(
                        'cedula' => $_POST['cedula'],
                        'clave' => $_POST['clave'],
                        'nombre' => $_POST['nombre'],
                        'telefono' => $_POST['telefono'],
                        'email' => $_POST['email']
                    );
            
                    $usuarioAgregado = $usuarioController->agregar($datos);
        
                    if ($usuarioAgregado){
                        $msg = '¡Usuario añadido exitosamente!';
                    } else {
                        $msg = '¡Error al intentar añadir al nuevo usuario!';
                    }
                }
            } catch (Exception $e){
                $msg = '¡Error al intentar añadir al nuevo usuario!';
            }
        }
    ?>

    <form action="" method="post">
        <label for="cedula">Cédula:</label>
        <input type="text" id="cedula" name="cedula" required><br>
        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" required><br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <input type="submit" value="Crear Usuario">
    </form>

    <?php if ($msg): ?>
        <p><?php echo $msg; ?></p>
    <?php endif; ?>
</body>
</html>
