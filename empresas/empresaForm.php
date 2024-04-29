<?php

$id = null;
$nombre = null;
$direccion  = null;
$telefono = null;
$rfc = null;
$email = null;

// Este fragmento de código PHP está comprobando si el parámetro id está presente en la URL de la página y,
// si es así, está almacenando su valor en la variable $id.
if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $conn = mysqli_connect("localhost", "root", "");
    $sql = "select * from especialidades_medicas.empresas where id=" .$id;
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    $id = $_GET['id'];
    $nombre = $row['nombre'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $rfc  = $row['rfc'];
    $email = $row['email'];

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
    <h1>Catalogo de empresas</h1>
    <form method="POST" action="backendEmpresas.php">
        Nombre
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="nombre" value="<?php echo $nombre; ?>">
        <br>
        Direccion
        <input type="text" name="direccion" value="<?php echo $direccion; ?>">
        <br>
        Telefono
        <input type="number" name="telefono" value="<?php echo $telefono; ?>">
        <br>
        RFC
        <input type="text" name="rfc" value="<?php echo $rfc; ?>">
        <br>
        email
        <input type="email" name= "email" value='<?php echo $email; ?>'>
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
    <a href="/capacitacion2/empresas/">Empresas</a>
</body>



