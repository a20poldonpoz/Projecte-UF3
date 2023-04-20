<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Incidencia</title>
    <link rel="stylesheet" href="insertarincidencia.css">
    <?php include ("includes.php")?>
</head>
<body>
<?php include ("headerInvitat.php")?>

<div class="formulari">
    <div class="col-12">
        <h1>Insertar Incidencia</h1>
        <form action="registrarInvitat.php" method="POST">

            <div class="form-group">
                <select id="departament" name="departament">
                    <option value="">--- ESCOLLEIX DEPARTAMENT ---</option>
                    <option value="1">1 - Matematiques </option>
                    <option value="2">2 - Angles</option>
                    <option value="3">3 - Socials</option>
                </select>
            </div>

            <br>

            <div class="form-group">
                <label for="descripcio">Descripció:</label>
                <textarea class="form-control" name="descripcio" id="descripcio" cols="30" rows="10" minlength="10" maxlength="200" required></textarea>
            </div>       

            <br>
            
            <div class="form-group"><button class="btn btn-success">Enviar incidencia</button></div>
        </form>
    </div>
</div>

<?php include ("footer.php")?>
</body>
</html>