<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Incidencies Ins.Pedralbes</title>
    <?php include ("includes.php")?>
</head>

<body>
<?php include ("headerInvitat.php")
?>
    <div class="container">

        <h1>Incidencies Institut Pedralbes</h1>

        <div class="grid">

            <div class="grid-button">
                <span><a class="btn btn-secondary" href="insertarIncidenciaInvitat.php">Insertar Incidencia</a></span>
                <span><a class="btn btn-secondary" href="consultarIncidenciaInvitat.php">Consultar Incidencia</a></span>
            </div>
        </div>

        <?php
            include ("conexion.php");

            $resultado = $mysqli->query("SELECT COUNT(departament), INCIDENCIA.departament FROM INCIDENCIA GROUP BY INCIDENCIA.departament;");
            $informeDep = $resultado->fetch_all(MYSQLI_ASSOC);
        ?>

        
    </div>
    <?php include ("footer.php")?>
</body>

</html>