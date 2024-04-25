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
            </tr>
        </thead>

        <tbody>
            <?php
            
            $conn = mysql_connect("localhost","root","");

            // CONSULTA DE REGISTROS QUE TENGAN VACÍO EL CAMPO DE BORRADO LÓGICO
            $sql = "select id,concat(nombre,' ',apellido1) as nombre_completo from especialidades_medicas.usuarios where deleted_at is null";
            $result = mysql_query($sql);

            while($row = mysql_fetch_array($result)) {

                // print_r($row);

                
                echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td><a href="form.php?id='.$row['id'].'">'.$row['nombre_completo'].'</a></td>
                </tr>
                ';
               
            }
            ?>
        </tbody>
    </table>
</body>
</html>
