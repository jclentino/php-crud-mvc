<?php
    require_once __DIR__ . '/../../controladores/DocenteController.php';

    $idDocente = null;
    $docente = null;
    $msg = null;

    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['id'])) {
                
                $idDocente = $_POST['id'];
                $docente = $docenteController->eliminar($idDocente);
    
                if ($docente){
                    $msg = 'Docente eliminado exitosamente!';
                } else {
                    $msg = '¡Error al intentar eliminar docente!';
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
    <title>Eliminar Docente</title>
</head>
<body>
    <h1>Eliminar Docente</h1>

    <form action="" method="post">
        <label for="id">Id del Docente:</label>
        <input type="text" id="id" name="id" required><br>
        <input type="submit" value="Eliminar Docente">
    </form>

    <?php if ($msg): ?>
        <p><?php echo $msg; ?></p>
    <?php endif; ?>
</body>
</html>
