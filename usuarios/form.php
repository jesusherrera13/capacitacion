<?php

// INICIALIZACIÓN DE VARIABLES
$id = null;
$nombre = null;
$apellido1 = null;
$apellido2 = null;

// SI EXISTE EL PARÁMETRO id SE CONSULTA EL REGISTRO
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $conn = mysqli_connect("localhost", "root", "");
    $sql = "select * from especialidades_medicas.usuarios where id=" . $id;
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    $id = $_GET['id'];
    $nombre = $row['nombre'];
    $apellido1 = $row['apellido1'];
    $apellido2 = $row['apellido2'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>
    <h1>Usuario</h1>
    <form method="POST" action="backend.php">
        Nombre
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="nombre" value="<?php echo $nombre; ?>">
        <br>
        Apellido Paterno
        <input type="text" name="apellido1" value="<?php echo $apellido1; ?>">
        <br>
        Apellido Materno
        <input type="text" name="apellido2" value="<?php echo $apellido2; ?>">
        <br>
        Contraseña
        <input type="password" name="contrasena">
        <br>
        <input type="submit" name="guardar" value="Guardar">

        <?php
        // SI EXISTE EL PARÁMETRO ID SE MUESTRA EL BOTÓN DE ELIMINAR
        if ($id) {
        ?>
            <input type="submit" name="delete" value="Eliminar">
        <?php
        }
        ?>

    </form>
    <a href="./">Usuarios</a>
</body>

</html>
