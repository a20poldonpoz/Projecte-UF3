<!DOCTYPE html>
<html>
<body>
 
<?php
session_start();
if (isset($_SESSION["username"])){
    echo "Bienvenido a la parte privada<br>";
    echo "ID de sesion".$_SESSION['sid']."<br>";
    echo "<a href='logout.php'>Desconectar</a><br>";
    echo "<a href='index.php'>Inicio</a><br>";

}
else{
    echo "Eeeh, no puedes estar aqui";
   
}

?>
 
</body>
</html>