<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar ID de Incidencia</title>
    <?php include ("includes.php")?>
    <link rel="stylesheet" href="registrar.css">
</head>
<body>
    <?php include ("header.php")?>
    <h2>Buscar ID de Incidencia</h2>
    <form action="buscar.php" method="post">
        <label for="codiI">ID de la incidencia:</label>
        <input type="text" codiI="codiI" name="codiI"><br><br>
        <input type="submit" value="Buscar">
    </form>
    <?php
    if(isset($_POST['codiI'])) {
        $codiI = $_POST['codiI'];
        $host = "localhost";
        $usuario = "a20poldonpoz_bd";
        $contrasenia = "Pedralbes1";
        $base_de_datos = "a20poldonpoz_GI3PEDRALBES";
        $mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
        if ($mysqli->connect_errno) {
            echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        } 
    }
    ?>
    <br>
    <button class="button button2"><a href="index.php">Volver</a></button>
</body>
</html>
