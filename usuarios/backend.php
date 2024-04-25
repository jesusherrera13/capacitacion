<?php

// print_r($_POST);
// die;

// INICIALIZACIÓN DE VARIABLES
$sql = null;
$message = null;

// SI EXISTE EL PARÁMETRO `id`, SE ACTUALIZA O ELIMINA
if($_POST['id']) {

    // SI EXISTE EL PARÁMTRO `delete`
    if(isset($_POST['delete']) && $_POST['delete']) {

        // $sql = "delete from especialidades_medicas.usuarios where id=".$_POST['id'];
        $sql = "delete from especialidades_medicas.usuarios where id=".$_POST['id'];

        $sql = "
        update especialidades_medicas.usuarios set deleted_at=now() 
        where id=".$_POST['id'];

        $message = "<h3>Registro eliminado</h3>";
        $error = "Error al eliminar el registro";
    }
    else {
        $sql = "
        update especialidades_medicas.usuarios set nombre='".$_POST['nombre']."',apellido1='".$_POST['apellido1']."',updated_at=now() 
        where id=".$_POST['id'];

        $message = "<h3>Registro actualizado</h3>";
        $error = "Error al actualizar el registro";
    }
}
else {

   // SI NO EXISTE EL PARÁMETRO `id` Y VIENE DEL SUBMIT `guardar` ES UN NUEVO REGISTRO
    if(isset($_POST['guardar'])) {

        $sql = "insert into especialidades_medicas.usuarios (nombre,apellido1) values ('".$_POST['nombre']."','".$_POST['apellido1']."')";
        $message = "<h3>Registro guardado correctamente</h3>";
        $error = "Error al actualizar el registro";
    }
}

$conn = mysql_connect("localhost","root","");

// SI EXISTE UN ERROR EN LA CONSULTA MOSTRAMOS EL ERROR
if(!mysql_query($sql)) $message = $error;

$message.= '<a href="./">Regresar a usuarios</a>';

echo $message;
?>