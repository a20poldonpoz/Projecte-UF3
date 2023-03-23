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
<?php include ("header.php")?>
    <div class="container">

        <h1>Gestio d'incidencies Intitut Pedralbes</h1>

        <div class="grid">
            <div class="grid-header">
                <span>Usuari</span>
                <span>Administrador</span>
            </div>
            <div class="grid-button">
                <span><a class="btn btn-secondary" href="insertarincidencia.php">Insertar Incidencia</a></span>
                <span><a class="btn btn-secondary" href="mostrarincidencies.php">Llistat Incidencies</a></span>
                <span><a class="btn btn-secondary" href="consultarIncidencia.php">Consultar Incidencia</a></span>
                <span><a class="btn btn-secondary" href="gestioIncidencia.php">Gestió Incidencia</a></span>
            </div>
        </div>
    </div>
    <?php include ("footer.php")?>
</body>

</html>