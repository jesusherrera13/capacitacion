<?php


// INICIALIZACIÓN DE VARIABLES
$sql = null;
$message = null;



// SI EXISTE EL PARÁMETRO `id`, SE ACTUALIZA O ELIMINA

 // verificacion de cambio de contraseña cada 3 meses 
if ($_POST['id']) {
    $conn = mysqli_connect("localhost", "root", "");
    $sql = "SELECT last_password_change FROM especialidades_medicas.usuarios WHERE id=" . $_POST['id'];
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$last_password_change = new DateTime($row['last_password_change']);
$now = new DateTime();

$interval = $last_password_change->diff($now);

if ($interval->m >= 3) {
    //  forzar cambio de contraseña
    $sql = "update especialidades_medicas.usuarios set contrasena=SHA ('123456', 256), updated_at=now(), last_password_change=now() where id=" . $_POST['id'];
   
}

    // SI EXISTE EL PARÁMTRO `delete`

    // compara si el parametro delete es verdadero con el valor de $_POST['delete'] 
    if (isset($_POST['delete']) && $_POST['delete']) {

        $sql = "delete from especialidades_medicas.usuarios where id=" . $_POST['id'];

        $sql = "
        update especialidades_medicas.usuarios set deleted_at=now() 
        where id=" . $_POST['id'];

        $message = "<h3>Registro eliminado</h3>";
        $error = "Error al eliminar el registro";
    } else {
        // Consulta a la base de datos
        $sql = "
        update especialidades_medicas.usuarios 
        set nombre='" . $_POST['nombre'] . "', apellido1='" . $_POST['apellido1'] . "', apellido2='" . $_POST['apellido2'] . "', contrasena=SHA2('" . $_POST['contrasena'] . "', 256), updated_at=now(), last_password_change=now() 
        where id=" . $_POST['id'];

      

        $message = "<h3>Registro actualizado</h3>";
        $error = "Error al actualizar el registro";
       
    }
} else {

    // SI NO EXISTE EL PARÁMETRO `id` Y VIENE DEL SUBMIT `guardar` ES UN NUEVO REGISTRO
    if (isset($_POST['guardar'])) {
        // Modificación de la consulta para incluir la contraseña
        $sql = "insert into especialidades_medicas.usuarios (nombre, apellido1, apellido2, contrasena) values ('" . $_POST['nombre'] . "','" . $_POST['apellido1'] . "','" . $_POST['apellido2'] . "', SHA2('" . $_POST['contrasena'] . "', 256))";
        
      
        $message = "<h3>Registro guardado correctamente</h3>";
        $error = "Error al actualizar el registro";

        // 
        
    }
}



$conn = mysqli_connect("localhost", "root", "");

// SI EXISTE UN ERROR EN LA CONSULTA MOSTRAMOS EL ERROR
if (!mysqli_query($conn, $sql)) $message = $error;

$message .= '<a href="./">Regresar a usuarios</a>';

echo $message;
?>
