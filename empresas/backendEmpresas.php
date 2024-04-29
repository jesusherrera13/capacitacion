<?php

// declaracion de variables
$sql = null;
$message = null;


// conexion a la base de datos
$conn = mysqli_connect("localhost", "root", "");


 // compara si el parametro id es verdadero con el valor de $_POST['id']
    if($_POST['id']) {
    // compara si el parametro delete es verdadero con el valor de $_POST['delete'] 
    if (isset($_POST['delete']) && $_POST['delete']) {

        $sql = "delete from especialidades_medicas.empresas where id=" . $_POST['id'];

        $sql = "
        update especialidades_medicas.empresas set deleted_at=now() 
        where id=" . $_POST['id'];

        $message = "<h3>Registro eliminado</h3>";
        $error = "Error al eliminar el registro";
    } else {
        // Consulta a la base de datos
        $sql = "
        update especialidades_medicas.empresas 
        set nombre='" . $_POST['nombre'] . "', direccion='" . $_POST['direccion'] . "', telefono='" . $_POST['telefono'] . "', rfc='" . $_POST['rfc'] . "', email='" . $_POST['email'] . "'
        where id=" . $_POST['id'];
        // valida si la consulta tiene un error y lo muestra
        if (!mysqli_query($conn, $sql)) {
            $message = mysqli_error($conn);
        } else {
            $message = "<h3>Registro modificados de los datos de la empresa</h3>";
        }
        
    }
    } else{

    // SI NO EXISTE EL PARÁMETRO `id` Y VIENE DEL SUBMIT `guardar` ES UN NUEVO REGISTRO
    if (isset($_POST['guardar'])) {
        // Modificación de la consulta para incluir la contraseña
        $sql = "insert into especialidades_medicas.empresas (nombre, direccion, telefono, rfc,email) values ('" . $_POST['nombre'] . "','" . $_POST['direccion'] . "','" . $_POST['telefono'] . "','" . $_POST['rfc'] . "', '" . $_POST['email'] . "')";
    // valida si la consulta tiene un error y lo muestra
    if (!mysqli_query($conn, $sql)) {
        $message = mysqli_error($conn);
    } else {
        $message = "<h3>Registro modificados de los datos de la empresa</h3>";
    }
    }
    }
    
$message .= '<a href="/capacitacion2/empresas/">Regresar al catalogo de empresas</a>';

echo $message;
?>
