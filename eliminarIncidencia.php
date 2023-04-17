<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Eliminar Incidència</title>
    </head>
    <body>
        <?php include ("header.php")?>

        <?php
        include ("conexion.php");
        $resultado = $mysqli->query("SELECT * FROM INCIDENCIA ");
        $incidencias = $resultado->fetch_all(MYSQLI_ASSOC);  
        ?>
        <?php
        if (!isset($_GET["codiI"])) {
            exit("No hay id");
        }
        $codiI = $_GET["codiI"];
        $sentencia = $mysqli->prepare("DELETE FROM INCIDENCIA WHERE codiI = ?");
        $sentencia->bind_param("i", $codiI);
        $sentencia->execute();
        header("Location: mostrarincidencies.php");
    ?>
    </body>
</html>