<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Crear Docente</title>
</head>
<body>
    <h1>Crear Nuevo Docente</h1>
    <?php
        require_once __DIR__ . '/../../controladores/DocenteController.php'; 

        $msg = null; 
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                if (
                    empty($_POST['nombre']) || 
                    empty($_POST['apellidos']) || 
                    empty($_POST['email']) || 
                    empty($_POST['telefono']) || 
                    empty($_POST['blog']) || 
                    // empty($_POST['profesional']) || 
                    // empty($_POST['escalaron']) || 
                    empty($_POST['idioma']) || 
                    empty($_POST['añosExperiencia']) || 
                    empty($_POST['areaTrabajo'])
                ) {
                    $msg = 'Por favor, complete todas las opciones del formulario.';
                } else {
                    if ((!isset($_POST['usuario']) || $_POST['usuario'] === "")) {
                        $msg = 'Debes selecciona un usuario valido';
                        return;
                    }
    
                    $datos = array(
                        'nombre' => $_POST['nombre'],
                        'apellidos' => $_POST['apellidos'],
                        'telefono' => $_POST['telefono'],
                        'email' => $_POST['email'],
                        'blog' => $_POST['blog'],
                        'profesional' => ($_POST['profesional'] == 'esProfesional' ? 1 : 0),
                        'escalaron' => ($_POST['escalaron'] == 'esEscalaron' ? 1 : 0),
                        'idioma' => $_POST['idioma'],
                        'aosExperiencia' => $_POST['añosExperiencia'],
                        'areaTrabajo' => $_POST['areaTrabajo'],
                        'usuario_id' => $_POST['usuario']
                    );
            
                    $docenteAgregado = $docenteController->agregar($datos);
        
                    if ($docenteAgregado){
                        $msg = 'Docente añadido exitosamente!';
                    } else {
                        $msg = '¡Error al intentar añadir al nuevo docente!';
                    }
                }
            } catch (Exception $e){
                $msg = '¡Error al intentar añadir al nuevo docente!';
            }
        }
    ?>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="number" id="telefono" name="telefono" required><br>

        <label for="blog">Blog:</label>
        <input type="text" id="blog" name="blog"><br>

        <label for="profesional">¿Es profesional?</label>
        <select id="profesional" name="profesional" required>
            <option value="esProfesional">SI</option>
            <option value="noEsProfesional">NO</option>
        </select>
        
        <label for="escalaron">¿Han escalado?</label>
        <select id="escalaron" name="escalaron" required>
            <option value="esEscalaron">SI</option>
            <option value="noEsEscalaron">NO</option>
        </select>

        <label for="idioma">Idioma:</label>
        <input type="text" id="idioma" name="idioma" required><br>

        <label for="añosExperiencia">Años de Experiencia:</label>
        <input type="number" id="añosExperiencia" name="añosExperiencia" required><br>

        <label for="areaTrabajo">Área de Trabajo:</label>
        <input type="text" id="areaTrabajo" name="areaTrabajo" required><br>

        <label for="usuario">Usuario:</label>
        <select id="usuario" name="usuario" required>
            <option value="">Selecciona un usuario</option>
            <?php
                require_once __DIR__ . '/../../controladores/UsuarioController.php';
                $usuarios = $usuarioController->listar();

                foreach ($usuarios as $usuario) {
                    echo '<option  value="' . $usuario['cedula'] . '">' . $usuario['nombre'] . '</option>';
                }
            ?>
        </select><br>
    
        <input type="submit" value="Crear Docente">
    </form>

    <?php if ($msg): ?>
        <p><?php echo $msg; ?></p>
    <?php endif; ?>
</body>
</html>
