<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <button class="btn btn-info btn-block" name = "Register" onclick="document.getElementById('id01').style.display='block'">Nuevo usuario</button>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Another action</a>
            
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>

        <a href="Admin.php" class="navbar-brand">Administradores</a>

        <form action="action_page.php" method="POST" align = "right" style="margin-left: 0%"> 
            <button type="submit" class="btn btn-danger" name = "Logout" >Log out</button>
        </form>
    </nav>

    <!-- The Modal -->
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'"
        class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" action="action_page.php" method="POST" style="width: 21%">
            <div class="imgcontainer" align = "center">
                <h3 align = "center">Nuevo Usuario</h3>
                <img src="../Resources/avatar.png" alt="Avatar" class="avatar" style="width: 25%" align = "center">
            </div>

            <div class="container">
                <label for="Correo"><b>Correo:</b></label>
                <input type="text" placeholder="Introduzca el correo" name="Correo" required>
                <br>
                <label for="Contra"><b>Contraseña:</b></label>
                <input type="password" placeholder="Introduzca la contraseña" name="Contra" required>
                <br>
                <button type="submit" class="btn btn-success" name="Login">Ingresar</button>
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-danger">Cancelar</button>
    
            </div>

            <div class="container" style="background-color:#f1f1f1">
            </div>
        </form>
    </div>

    <script>
    var modal = document.getElementById('id01');

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>