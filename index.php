<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Aplicación MVC</title>
</head>
<body>
    <h1>Aplicación MVC</h1>
    <nav>
        <ul>
            <h3>Usuarios</h3>
            <li><a href="index.php?action=listarUsuarios">Listar Usuarios</a></li>
            <li><a href="index.php?action=crearUsuarios">Registrar Usuarios</a></li>
            <li><a href="index.php?action=editarUsuarios">Editar Usuarios</a></li>
            <li><a href="index.php?action=eliminarUsuarios">Eliminar Usuarios</a></li>
        </ul>
        <ul>
            <h3>Docentes</h3>
            <li><a href="index.php?action=listarDocentes">Listar Docentes</a></li>
            <li><a href="index.php?action=crearDocentes">Registrar Docentes</a></li>
            <li><a href="index.php?action=editarDocentes">Editar Docentes</a></li>
            <li><a href="index.php?action=eliminarDocentes">Eliminar Docentes</a></li>
        </ul>
    </nav>

    <div id="contenido">
        <?php
            if (isset($_GET['action'])) {
                $action = $_GET['action'];

                switch ($action) {
                    // usuarios 
                    case 'listarUsuarios':
                        include 'vistas/usuario/listar.php';
                        break;
                    case 'crearUsuarios':
                        include 'vistas/usuario/registrar.php';
                        break;
                    case 'editarUsuarios':
                        include 'vistas/usuario/editar.php';
                        break;
                    case 'eliminarUsuarios':
                        include 'vistas/usuario/eliminar.php';
                        break;

                    // docentes 
                    case 'listarDocentes':
                        include 'vistas/docente/listar.php';
                        break;
                    case 'crearDocentes':
                        include 'vistas/docente/registrar.php';
                        break;
                    case 'editarDocentes':
                        include 'vistas/docente/editar.php';
                        break;
                    case 'eliminarDocentes':
                        include 'vistas/docente/eliminar.php';
                        break;
                    default:
                        echo "Acción no válida.";
                        break;
                }
            } else {
                include 'vistas/usuario/listar.php';
            }
        ?>
    </div>
</body>
</html>
