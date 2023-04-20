<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Incidencies Ins.Pedralbes</title>
    <?php include ("includes.php")?>
</head>
<body>

    <header>
        <img src="logo.png" alt="logo">
    </header>
    <br><br>
    <h1 class="title">Login</h1>
    <form method="post" action="login.php">
    Usuari: <input type="text" name="userid"><br>
    Contrasenya: <input type="password" name="password"><br>
    <input type="submit" value="Login">
    <a class="comvidat" href='iniciInvitat.php'>Entrar com a comvitat</a><br>
    </form>

    <?php include ("footer.php")?>
</body>

</html>
