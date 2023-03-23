<?php
$host = "localhost";
$usuario = "a20poldonpoz_bd";
$contrasenia = "Pedralbes1";
$base_de_datos = "a20poldonpoz_GI3PEDRALBES";
$mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
$tecnic = $_POST["tecnic"];
$prioritat = $_POST["prioritat"];
$tipologia = $_POST["tipologia"];
$codiI = $_POST["codiI"];

echo $tecnic;
echo $prioritat;
echo $tipologia;
echo $codiI;
$sentencia = $mysqli->prepare("UPDATE INCIDENCIA SET 
tipologia = ?,
prioritat = ?,
tecnic= ?
WHERE codiI=?");

$sentencia->bind_param("ssii",$tipologia, $prioritat, $tecnic, $codiI);
$sentencia->execute();
header("Location: index.php");
?>