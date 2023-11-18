<?php
    require_once __DIR__ . '/../../controladores/DocenteController.php';

    $idDocente = null;
    $docente = null;
    $msgObtenerDocente = null; 
    $msgEditarDocente = null; 

    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['busqueda'])) {
                $idDocente = $_POST['busqueda'];
                $docente = $docenteController->obtenerPorId($idDocente);
                $msgObtenerDocente = null; 
            }
        }
    } catch (Exception $e){
        $msgObtenerDocente = 'Error al intentar cargar docente';
    }

    try {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editarDocente'])) {

            $id = $_POST['identificador'];
    
            $datos = array(
                'nombre' => $_POST['nombre'],
                'apellidos' => $_POST['apellidos'],
                'email' => $_POST['email'],
                'telefono' => $_POST['telefono'],
                'blog' => $_POST['blog'],
                'profesional' => ($_POST['profesional'] == 'esProfesional' ? 1 : 0),
                'escalaron' => ($_POST['escalaron'] == 'esEscalaron' ? 1 : 0),
                'idioma' => $_POST['idioma'],
                'aosExperiencia' => $_POST['añosExperiencia'],
                'areaTrabajo' => $_POST['areaTrabajo'],
                'usuario_id' => $_POST['usuario']
            );
    
            $docenteEditado = $docenteController->editar($id, $datos);
    
            if ($docenteEditado) {
                $msgEditarDocente = 'Docente editado exitosamente!';
            } else {
                $msgEditarDocente = 'Error al editar el docente.';
            }
        }
    } catch (Exception $e){
        $msgEditarDocente = 'Error al editar el docente';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Editar Usuario</title>
</head>
<body>
    <h1>Editar Docente</h1>

    <form action="" method="post">
        <label for="busqueda">ID del Docente:</label>
        <input type="number" id="busqueda" name="busqueda" required><br>
        <input type="submit" value="Cargar Docente">
    </form>

    <?php if ($msgObtenerDocente): ?>
        <p><?php echo $msgObtenerDocente; ?></p>
    <?php endif; ?>

    <?php if ($docente): ?>
        <form action="" method="post">
            <label for="identificador">id:</label>
            <input type="text" id="identificador" name="identificador"  value="<?php echo $docente['id']; ?>" required readonly><br>

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre"  value="<?php echo $docente['nombre']; ?>" required><br>

            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $docente['apellidos']; ?>"  required><br>

            <label for="telefono">Teléfono:</label>
            <input type="number" id="telefono" name="telefono" value="<?php echo $docente['telefono']; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $docente['email']; ?>" required><br>

            <label for="blog">Blog:</label>
            <input type="text" id="blog" name="blog" value="<?php echo $docente['blog']; ?>" required ><br>


            <label for="profesional">¿Es profesional?</label>
            <select id="profesional" name="profesional" required>
                <option value="esProfesional" <?php echo ($docente['profesional'] == 1) ? 'selected' : ''; ?>>
                    SI
                </option>
                <option value="noEsProfesional"  <?php echo ($docente['profesional'] == 0) ? 'selected' : ''; ?>>
                    NO
                </option>
            </select>
        
            <label for="escalaron">¿Han escalado?</label>
            <select id="escalaron" name="escalaron" required>
                <option value="esEscalaron"  <?php echo ($docente['escalaron'] == 1) ? 'selected' : ''; ?>>
                    SI
                </option>
                <option value="noEsEscalaron"  <?php echo ($docente['escalaron'] == 0) ? 'selected' : ''; ?>>
                    NO
                </option>
            </select>


            <label for="idioma">Idioma:</label>
            <input type="text" id="idioma" name="idioma" value="<?php echo $docente['idioma']; ?>" required><br>

            <label for="añosExperiencia">Años de Experiencia:</label>
            <input type="number" id="añosExperiencia" name="añosExperiencia" value="<?php echo $docente['aosExperiencia']; ?>" required><br>

            <label for="areaTrabajo">Área de Trabajo:</label>
            <input type="text" id="areaTrabajo" name="areaTrabajo" value="<?php echo $docente['areaTrabajo']; ?>" required><br>

            <label for="usuario">Usuario:</label>
            <select id="usuario" name="usuario" required>
                <option value="">Selecciona un usuario</option>
                <?php
                    require_once __DIR__ . '/../../controladores/UsuarioController.php';
                    $usuarios = $usuarioController->listar();

                    foreach ($usuarios as $usuario) {
                        $selected = ($usuario['cedula'] == $docente['usuario_id']) ? 'selected' : '';
                        echo '<option value="' . $usuario['cedula'] . '" ' . $selected . '>' . $usuario['nombre'] . '</option>';
                    }
                ?>
            </select><br>
        
            <input type="submit" name="editarDocente" value="Editar docente">
        </form>
    <?php endif; ?>

    <?php if ($msgEditarDocente): ?>
        <p><?php echo $msgEditarDocente; ?></p>
    <?php endif; ?>
</body>
</html>
