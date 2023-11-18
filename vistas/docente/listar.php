<?php
    require_once __DIR__ . '/../../controladores/DocenteController.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>Lista de Docentes</title>
</head>
<body>
    <h1>Lista de Docentes</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Blog</th>
                <th>Profesional</th>
                <th>Escalaron</th>
                <th>Idioma</th>
                <th>Años de experiencia</th>
                <th>Area de trabajo</th>
                <th>Usuario_id</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $docentes = $docenteController->listar();

            foreach ($docentes as $docente) {
                echo "<tr>";
                echo "<td>{$docente['id']}</td>";
                echo "<td>{$docente['nombre']}</td>";
                echo "<td>{$docente['apellidos']}</td>";
                echo "<td>{$docente['email']}</td>";
                echo "<td>{$docente['telefono']}</td>";
                echo "<td>{$docente['blog']}</td>";

                if ($docente['profesional']){
                    echo "<td>SI</td>";
                } else {
                    echo "<td>NO</td>";
                }

                if ($docente['escalaron']){
                    echo "<td>SI</td>";
                } else {
                    echo "<td>NO</td>";
                }
                echo "<td>{$docente['idioma']}</td>";
                echo "<td>{$docente['aosExperiencia']}</td>";
                echo "<td>{$docente['areaTrabajo']}</td>";
                echo "<td>{$docente['usuario_id']}</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>