<?php
    require_once __DIR__ . '/../../controladores/UsuarioController.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Lista de Usuarios</title>
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Clave</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $usuarios = $usuarioController->listar();

                foreach ($usuarios as $usuario) {
                    echo "<tr>";
                    echo "<td>{$usuario['cedula']}</td>";
                    echo "<td>{$usuario['nombre']}</td>";
                    echo "<td>{$usuario['telefono']}</td>";
                    echo "<td>{$usuario['email']}</td>";
                    echo "<td>{$usuario['clave']}</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>