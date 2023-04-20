<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Actuacions</title>
    <?php include ("includes.php")?>
    <link rel="stylesheet" href="registrar.css">
</head>
<body>
<?php include ("header.php")?>
<?php
include ("conexion.php");

$codiI = $_POST["codiI"];
$descripcio = $_POST["descripcio"];
$visible = $_POST["visible"];


$sentencia = $mysqli->prepare("INSERT INTO ACTUACIO
(idI, descripcio, visible)
VALUES (?, ?, ?)");

$sentencia->bind_param("iss", $codiI, $descripcio, $visible);
$sentencia->execute();

?>
<button class="button button2"><a href="inici.php">Tornar</a></button>