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
<?php

include ("conexion.php");

$codiI = $_POST["codiI"];
$sentencia = $mysqli->prepare("SELECT codiI, departament, descripcio, data, prioritat, tecnic, tipologia FROM INCIDENCIA WHERE codiI = ?");
$sentencia->bind_param("i", $codiI);
$sentencia->execute();
$resultado = $sentencia->get_result();
$incidencia = $resultado->fetch_assoc();
if (!$incidencia) { 
    echo '<button class="button button2"><a href="index.php">Volver</a></button>';
    echo '<br>';
    exit("No hay resultados para ese ID");
  
}

$resultado = $mysqli->query("SELECT * FROM INCIDENCIA ");
$incidencias = $resultado->fetch_all(MYSQLI_ASSOC);

?>

<div class="grid">
    <div class="header-grid">
        <span>ID</span>
        <span>Departament</span>
        <span>Descripció</span>
        <span>Data</span>
        <span>Prioritat</span>
        <span>Tecnic</span>
        <span>Tipus</span>
        <span> </span>
    </div>

    <div class="incidencia">
        <span><?php echo $incidencia["codiI"] ?></span>
        <span><?php echo $incidencia["departament"] ?></span>
        <span><?php echo $incidencia["descripcio"] ?></span>
        <span><?php echo $incidencia["data"] ?></span>
        <span><?php echo $incidencia["prioritat"] ?></span>
        <span><?php echo $incidencia["tecnic"]?></span>
        <span><?php echo $incidencia["tipologia"]?></span>
    </div>
</div>
<br><br>
<button class="button button2"><a href="index.php">Volver</a></button>
</body>
</html>

