<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="Final.css" >
    <title>Document</title>
</head>
<body>  
    <!-- Button to open the modal login form -->
    <button class="btn btn-success" onclick="login()" style="width: 100px">Login</button>

    <!-- The Modal -->
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'"
        class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" action="action_page.php" method="POST" style="width: 30%">
            <div class="imgcontainer">
                <h3>Administrador</h3>
                <img src="../Resources/avatar.png" alt="Avatar" class="avatar" style="width: 25%">
            </div>

            <div class="container">
                <label for="Usuario"><b>Usuario</b></label>
                <input type="text" class="imputE" placeholder="Introduzca el usuario" name="Usuario" required>

                <label for="Contra"><b>Contraseña</b></label>
                <input type="password" class="imputE" placeholder="Introduzca la contraseña" name="Contra" required>

                <button type="submit" class="btn btn-success" name="Login">Ingresar</button>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-danger">Cancelar</button>
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
    function login(){
        <?php if(!empty($_SESSION['status'])){ ?>
            var bool = '<?php echo $_SESSION['status']?>';
        <?php }
        else{?>
            var bool = 'failed';
        <?php } ?>
         
        if(bool == "success"){
            alert("el usuario ya ha ingresado");
        } 
        else if(bool = "failed" || bool == null){
            document.getElementById('id01').style.display='block';
        }
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>