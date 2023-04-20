<?php

include ("conexion.php");

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
header("Location: inici.php");
?>