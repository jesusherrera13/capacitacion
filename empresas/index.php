

<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas</title>
</head>
<body>
    <h1>Catalogo de empresas</h1>
    <a href="/capacitacion2/index.php">Home</a>
    <a href="/capacitacion2/empresas/empresaForm.php">Nuevo</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>RFC</th>
                <th>Email</th>
               
            </tr>
        </thead>

        <tbody>
            <?php
            
            $conn = mysqli_connect("localhost","root","");

            // CONSULTA DE REGISTROS QUE TENGAN VACÍO EL CAMPO DE BORRADO LÓGICO
            $sql = "select id,nombre,direccion,telefono,rfc,email from especialidades_medicas.empresas where deleted_at is null";
            $result = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_array($result)) {

                // print_r($row);

                // se agregan los campos de direccion, telefono, rfc y email a la tabla de empresas 
                echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td><a href="empresaForm.php?id='.$row['id'].'">'.$row['nombre'].'</a></td>
                    <td>'.$row['direccion'].'</td>
                    <td>'.$row['telefono'].'</td>
                    <td>'.$row['rfc'].'</td>
                    <td>'.$row['email'].'</td>
                </tr>
                ';
               
            }
            ?>
        </tbody>
    </table>
</body>
</html>
