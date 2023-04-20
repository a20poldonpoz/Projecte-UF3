<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informació d'Incidencia</title>
    <?php include ("includes.php")?>
    <link rel="stylesheet" href="gestio.css">
</head>
<body>
<?php include ("header.php")?>
<h2>Informació d'Incidencia</h2>
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

<?php
$resultados = $mysqli->query("SELECT * FROM ACTUACIO WHERE IdI = $codiI");
$actuaciones = $resultados->fetch_all(MYSQLI_ASSOC);
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

<h2>Llistat Actuacions</h2>

<div class="grid">
    <div class="header-grid1">
        <span>ID</span>
        <span>Descripció</span>
        <span>Data</span>
        <span>Visible</span>
    </div>

    <?php
    foreach ($actuaciones as $actuacion) { ?>
        <div class="actuacio">
            <span><?php echo $actuacion["idA"] ?></span>
            <span><?php echo $actuacion["descripcio"] ?></span>
            <span><?php echo $actuacion["data"]?></span>
            <span><?php echo $actuacion["visible"]?></span>
        </div>
    <?php } ?>

</div>

<div class="formulari">
    <div class="col-12">
        <h1>Insertar Accions</h1>
        <form action="accions.php" method="POST">
        
            <div class="form-group">
                <input type="hidden" name="codiI" value="<?php echo $codiI ?>">
                <label for="descripcio">Descripció:</label>
                <textarea class="form-control" name="descripcio" id="descripcio" cols="10" rows="10" minlength="10" maxlength="200" required></textarea>
            </div>  
            <br>
            <div class="form-group">
                <select id="visible" name="visible">
                    <option value="">--- ACCIO VISIBLE ---</option>
                    <option value="SI">SI</option>
                    <option value="NO">NO</option>
                </select>
            </div>

            <br>
            
            <div class="form-group"><button class="btn btn-success">Enviar incidencia</button></div>
        </form>
    </div>
</div>

<button>
        <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 1024 1024"><path d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z"></path></svg>
        <a href="inici.php">Tornar</a>
</button>
</body>
</html>

