<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Incidencia</title>
    <?php include ("includes.php")?>
    <link rel="stylesheet" href="registrar.css">
</head>
<body>
<?php include ("headerInvitat.php")?>
<?php

$host = "localhost";
$usuario = "a20poldonpoz_bd";
$contrasenia = "Pedralbes1";
$base_de_datos = "a20poldonpoz_GI3PEDRALBES";
$mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$departament = $_POST["departament"];
$descripcio = $_POST["descripcio"];


$sentencia = $mysqli->prepare("INSERT INTO INCIDENCIA 
(departament, descripcio, prioritat)
VALUES (?, ?, ?) ");

$sentencia->bind_param("iss", $departament, $descripcio, $prioritat);
$sentencia->execute();

$incidencia_id = $mysqli->insert_id;


$resultado = $mysqli->query("SELECT * FROM INCIDENCIA");
$incidencias = $resultado->fetch_all(MYSQLI_ASSOC);

echo "Su ID de incidencia es: " . $incidencia_id;

?>
<br>
<button class="button button2"><a href="iniciInvitat.php">Tornar</a></button>



</body>
</html>