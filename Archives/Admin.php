<?php session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Admin.css-->
    <link rel="stylesheet" href="Admin.css" >
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <title>Administrador</title>
</head>
<body>
    <?php 
        if(isset($_SESSION['status'])){
            if($_SESSION['status'] == 'failed'){
                header("Location: index.php");
            }
        }
    ?>
    <nav class="navbar navbar-dark bg-dark">
        <li class="nav-item dropdown">
            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Menu
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <button class="btn btn-info btn-block" name = "Register" onclick="document.getElementById('id01').style.display='block'">Nuev o usuario</button>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Another action</a>
            
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>

        <a href="Admin.php" class="navbar-brand">Administradores</a>

        <form action="action_page.php" method="POST" align = "right" style="margin-left: 0%; background: rgba(245, 252, 145, 0)ñ"> 
            <button type="submit" class="btn btn-danger" name = "Logout" >Log out</button>
        </form>
    </nav>

    <?php if(isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?php echo $_SESSION['message-type'] ?> alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['message'];
            unset($_SESSION['message'])?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

    <div  id="ext">
       <div style="float: left" align="center"> 
            <a class="btn btn-info" onclick="edit()" data-toggle="modal" data-target="#Modal2">
                <i class="far fa-newspaper fa-3x" id="news"></i><br>
                <font size="4" id="fnews">Agregar noticia</font>
            </a>
       </div>
       <div style="float: left">
            <a class="btn btn-warning" onclick="edit2()" data-toggle="modal" data-target="#Modal3">
                <i class="far fa-address-card fa-3x" id="cases"></i><br>
                <font size="4" id="fcases">Agregar caso</font>       
            </a>
       </div>
    </div>


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
                <label for="Correo"><b>Usuario:</b></label>
                <input type="text" class="imputE" placeholder="Introduzca el usuario" name="Usuario" required>
                <br>
                <label for="Contra"><b>Contraseña:</b></label>
                <input type="password" class="imputE" placeholder="Introduzca la contraseña" name="Contra" required>
                <br>
                <button type="submit" class="btn btn-success" name="Register">Ingresar</button>
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="btn btn-danger">Cancelar</button>
    
            </div>

            <div class="container" style="background-color:#f1f1f1">
            </div>
        </form>
    </div>

    <!-- Modal2 -->
    <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel" align="center">Agregar noticia</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <h5 align="left">Titulo:</h5>
                    <div class="input-group mb-3"> 
                        <input type="text" class="form-control" placeholder="Titulo">
                    </div>
 
                    <h5 align="left">Resumen:</h5>
                    <div class="input-group">
                        <textarea class="form-control" placeholder="Resumen" rows="3"></textarea>
                    </div>
                     
                    <h5 align="left">Foto:</h5>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input"  id = "foto" aria-describedby="inputGroupFileAddon01" accept="image/png, .jpeg, .jpg, image/gif" onchange="testData(event)">
                        <label class="custom-file-label" for="inputGroupFile01" >Choose file</label>
                    </div>
                
                    <h5 align="left">Contenido:</h5>
                    <div class="input-group">
                        <textarea class="form-control" placeholder="Noticia" rows="4"></textarea>
                        <button class="btn btn-success btn-block" onclick="document.getElementById('id02').style.display='block'">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal3 -->
    <div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel" align="center">Agregar Caso</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                <form action="tasks.php" method="POST">
                <div class="form-group">
                    <input type="text" name="Cedula" id="Cedula" class="form-control" placeholder="Cedula" autofocus>
                </div> 
                <div class="form-group">
                    <input type="text" name="Nombre" id="Nombre" class="form-control" placeholder="Nombre" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="Apellido" id="Apellido" class="form-control" placeholder="Apellido" autofocus>
                </div>
                <div class="form-group">
                    <input placeholder="Nacimiento" class="form-control textbox-n" name="Nacimiento" type="text" onfocus="(this.type='date')" id="date">
                </div>
                <div class="form-group">
                    <input type="text" name="Pais" id="Pais" class="form-control" placeholder="Pais" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="Ciudad" id="Ciudad" class="form-control" placeholder="Ciudad" autofocus>
                </div>
                <div class="form-group">
                    <input type="text" name="Latitud" id="Latitud" class="form-control" placeholder="Latitud">
                </div>
                <div class="form-group">
                    <input type="text" name="Longitud" id="Longitud" class="form-control" placeholder="Longitud" autofocus>
                </div>
                <div class="form-group">
                    <input placeholder="Contagio" class="form-control textbox-n" name="FContagio" type="text" onfocus="(this.type='date2')" id="date2">
                </div> 
                <div class="form-group">
                    <textarea class="form-control" id="Descripcion" rows="3" name="Descripcion" placeholder="Comentario"></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="Guardar" value="Guardar">
            </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    var modal = document.getElementById('id01');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    
    function testData(event) {
        console.log(event.target.files[0]);
        console.log('Esto funciona');
    }
    function edit(){
        document.getElementById('news').className='far fa-newspaper fa-7x';
        document.getElementById('ext').style.marginLeft="0%";
        document.getElementById('fnews').size='4';
 
        document.getElementById('cases').className='far fa-address-card fa-3x';
        document.getElementById('fcases').size='1';
    }
    
    function edit2(){
        document.getElementById('cases').className='far fa-address-card fa-7x';
        document.getElementById('fcases').size='4';
        document.getElementById('ext').style.marginLeft="0%";

        document.getElementById('news').className='far fa-newspaper fa-3x';
        document.getElementById('fnews').size='1';

    }
   </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>