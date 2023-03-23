<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Llistat Incidencies</title>
    <link rel="stylesheet" href="mostrar.css">
    <?php include ("includes.php")?>
</head>
<body>
<?php include ("header.php")?>
<?php

$host = "localhost";
$usuario = "a20poldonpoz_bd";
$contrasenia = "Pedralbes1";
$base_de_datos = "a20poldonpoz_GI3PEDRALBES";
$mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
if ($mysqli->connect_errno) {
    echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

$resultado = $mysqli->query("SELECT * FROM INCIDENCIA ORDER BY prioritat DESC");
$incidencias = $resultado->fetch_all(MYSQLI_ASSOC);
?>

<h1>LLISTAT D'INCIDENCIES</h1>

<div class="grid">
    <div class="header-grid">
        <span class="id">ID</span>
        <span class="dep">Departament</span>
        <span class="desc">Descripció</span>
        <span class="data">Data</span>
        <span class="prioritat">Prioritat</span>
        <span class="tecnic">Tecnic</span>
        <span class="tipus">Tipus</span>
        <span class="modificar">Modificar</span>
        <span class="eliminar">Eliminar</span>
        <span> </span>
    </div>

    
    <?php
        foreach ($incidencias as $actual) { ?>
    <div class="incidencia <?php 
        if ($actual['prioritat']=='ALTA') echo 'alta'; 
        if ($actual['prioritat']=='MITJA') echo 'mitja';
        if ($actual['prioritat']=='BAIXA') echo 'baixa';
    ?>">
        <span class="id"><?php echo $actual["codiI"] ?></span>
        <span class="dep"><?php echo $actual["departament"] ?></span>
        <span class="desc"><?php echo $actual["descripcio"] ?></span>
        <span class="data"><?php echo $actual["data"] ?></span>
        <span class="prioritat"><?php echo $actual["prioritat"] ?></span>
        <span class="tecnic"><?php echo $actual["tecnic"]?></span>
        <span class="tipus"><?php echo $actual["tipologia"]?></span>
        <span class="modificar"><a href="editarIncidencia.php?codiI=<?php echo $actual["codiI"] ?>">Editar</a></span>                
        <span class="eliminar"><a href="eliminarIncidencia.php?codiI=<?php echo $actual["codiI"] ?>"  onClick="return confirm('Estas segur que vols eliminar?')" >Eliminar</a></span>
    </div>
    <?php } ?>
</div>
<?php include ("footer.php")?>
</body>
</html>