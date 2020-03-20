<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if($_SESSION['status'] == 'failed'){?>
        <script>alert("debe iniciar sesion para acceder a esta ventana");</script>
    <?php 
        header("Location: index.php");
    }?>
    
    <form action="action_page.php" method="POST">
        <button type="submit" name = "Logout">Log out</button>
    </form>
    <button type="submit" name = "Register">Nuevo usuario</button>

</body>
</html>