<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
</head>
<body>
    <h1>Usuarios</h1>
    <a href="../index.php">Home</a>
    <a href="form.php">Nuevo</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>   
            </tr>
        </thead>

        <tbody>
            <?php
            
            $conn = mysqli_connect("localhost","root","");

            // CONSULTA DE REGISTROS QUE TENGAN VACÍO EL CAMPO DE BORRADO LÓGICO
            $sql = "select id,nombre,apellido1,apellido2 from especialidades_medicas.usuarios where deleted_at is null";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)) {

                // print_r($row);

                
                echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td><a href="form.php?id='.$row['id'].'">'.$row['nombre'].'</a></td>
                    <td>'.$row['apellido1'].'</td>
                    <td>'.$row['apellido2'].'</td>
                </tr>
                ';
               
            }
            ?>
        </tbody>
    </table>
</body>
</html>
