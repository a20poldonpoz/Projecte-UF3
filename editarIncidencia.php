<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignar Incidencia</title>
    <link rel="stylesheet" href="editarIncidencia.css">
    <?php include ("includes.php")?>
</head>
<body>
<?php include ("header.php")?>

<?php
include ("conexion.php");

$codiI = $_GET["codiI"];
$sentencia = $mysqli->prepare("SELECT codiI, departament, descripcio, data, prioritat FROM INCIDENCIA WHERE codiI = ?");
$sentencia->bind_param("i", $codiI);
$sentencia->execute();
$resultado = $sentencia->get_result();
$incidencia = $resultado->fetch_assoc();
if (!$incidencia) {
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
    </div>
</div>

<div class="formulari">
    <div class="col-12">
        <h1>Asignar Incidencia</h1>
        <form action="actualizar.php" method="POST">

            <input type="hidden" name="codiI" value="<?php echo $incidencia["codiI"] ?>">
            <div class="form-group">
                <select id="tecnic" name="tecnic">
                    <option value="">--- ESCOLLEIX TÈCNIC ---</option>
                    <option value="3">Ermengol Bota </option>
                    <option value="1">Álvaro Perèz</option>
                    <option value="2">Toni Díaz</option>
                </select>
            </div>

            <br>
            <div class="form-group">
                <select id="prioritat" name="prioritat">
                    <option value="">--- ESCOLLEIX GRAVETAT ---</option>
                    <option value="1">BAIXA</option>    
                    <option value="2">MITJA</option>
                    <option value="3">ALTA</option>
                </select>
            </div>
    

            <br>

            <div class="form-group">
                <select id="tipologia" name="tipologia">
                    <option value="">--- ESCOLLEIX TIPUS ---</option>
                    <option value="Hardware">Hardware</option>    
                    <option value="Software">Software</option>
                    <option value="Xarxes">Xarxes</option>
                </select>
            </div>

            <br>
            
            <div class="form-group"><button class="btn btn-success">Guardar incidencia</button></div>
        </form>
    </div>
</div>

<?php include ("footer.php")?>
</body>
</html>