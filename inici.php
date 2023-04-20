<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="inici.css">
    <title>Incidencies Ins.Pedralbes</title>
    <?php include ("includes.php")?>
</head>

<body>
<?php include ("header.php")
?>
    <div class="container">

        <h1>Incidencies Institut Pedralbes</h1>

        <div class="grid">

            <div class="grid-button">
                <span><a class="btn btn-secondary" href="insertarincidencia.php">Insertar Incidencia</a></span>
                <span><a class="btn btn-secondary" href="mostrarincidencies.php">Llistat Incidencies</a></span>
                <span><a class="btn btn-secondary" href="consultarIncidencia.php">Consultar Incidencia</a></span>
                <span><a class="btn btn-secondary" href="gestioIncidencia.php">Gestió Incidencia</a></span>
            </div>
        </div>

        <?php
            include ("conexion.php");

            $resultado = $mysqli->query("SELECT DEPARTAMENT.tipus AS departamento, COUNT(INCIDENCIA.codiI) AS total_incidencias 
            FROM INCIDENCIA 
            RIGHT JOIN DEPARTAMENT ON DEPARTAMENT.idD = INCIDENCIA.departament 
            GROUP BY departamento");
            $informeDep = $resultado->fetch_all(MYSQLI_ASSOC);
        ?>


        
        <div class="informes">
            <div class="card-inf">
                <h3>Incidencies per departament</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Departament </th>
                            <th>Total d'Incidències</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($informeDep as $dep) { ?>
                            <tr>
                                <td><?php echo $dep['departamento']; ?></td>
                                <td><?php echo $dep['total_incidencias']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <?php
            $resultado = $mysqli->query("SELECT TECNIC_DEPARTAMENT.nom AS tecnic, count(*) as total_incidencias 
            FROM INCIDENCIA 
            INNER JOIN TECNIC_DEPARTAMENT ON TECNIC_DEPARTAMENT.idT = INCIDENCIA.tecnic 
            GROUP BY tecnic;");
            $recuento = $resultado->fetch_all(MYSQLI_ASSOC);
            ?>
        
            <div class="card-inf">
                <h3>Incidencias per tècnic</h3>

                <table>
                    <thead>
                        <tr>
                        <th>Técnic</th>
                        <th>Total d'incidencias</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recuento as $fila) { ?>
                        <tr>
                            <td><?php echo $fila['tecnic']; ?></td>
                            <td><?php echo $fila['total_incidencias']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    
        
    </div>
    <?php include ("footer.php")?>
</body>

</html>