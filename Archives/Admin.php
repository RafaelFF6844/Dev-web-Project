<?php session_start();

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'proyecto'
);

if(isset($_SESSION['status']) == 'failed'){
    if ($_SESSION['status'] == 'failed'){
        header("Location: Admin.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!--Admin.css-->
    <link rel="stylesheet" href="Adm.css" >
   
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!--JQuery-->
    <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
   
    <!--Titulo-->
    <title>Administrador</title>

    <style type="text/css">
        .global {
	        height: 270px;
	        width: auto;
	        border: 1px solid #ddd;
            overflow-y: scroll;
        }
    </style>
</head>
<body class="d-flex flex-column" > 
    <?php 
        if(isset($_SESSION['status'])){
            if($_SESSION['status'] == 'failed'){
                header("Location: ..\index.php");
            }
        }
    ?>
    <!-- Nav Bar -->
    <div class="page-header" style="background-color: #f1f1f1">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link" href="../index.php"><h2><i class="fas fa-globe-americas"></i>CoronaVirus-Life</h2></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=""><i class="fas fa-map-marked-alt"></i> Mapa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-newspaper"></i> Noticias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-thumbs-up"></i> Subscribete</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-chart-line"></i> Estadisticas</a>
            </li>
            <li class="nav-item nav-lejos" onclick="window.location.href='action_page.php?lgt=1'">
                <a class="nav-link btn btn-danger" href="#" style="margin-top: 10px"><i class="fas fa-user-tie"></i>Cerrar sesion</a>
            </li>
        </ul>
    </div>
    
    <?php if(isset($_SESSION['message1'])) { ?>
    <div class="alert alert-<?php echo $_SESSION['message-type'] ?> alert-dismissible fade show" role="alert">
        <?php echo $_SESSION['message1'];
            unset($_SESSION['message1'])?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>

    <!-- Botones -->
    <div align = "center" style="margin-left: 27%; margin-top:10px" >
       <div style="float: left" align="center"> 
            <a class="btn btn-info" onclick="edit()" data-toggle="modal" data-target="#Modal2">
                <i class="far fa-newspaper fa-2x" id="news"></i><br>
                <font size="3" id="fnews">Agregar noticia</font>
            </a>
       </div>
        <div style="float: left">
            <a class="btn btn-warning" onclick="edit2()" data-toggle="modal" data-target="#Modal3">
                <i class="far fa-address-card fa-2x" id="cases"></i><br>
                <font size="3" id="fcases">Agregar caso</font>       
            </a>
       </div>
       <div style="float: left">
            <a class="btn btn-info" onclick="edit3()">
                <i class="fas fa-users fa-2x" id="users"></i><br>
                <font size="3" id="fusers">Agregar Usuario</font>       
            </a>
       </div>
       <div style="float: left">
            <a class="btn btn-warning" onclick="edit4()" data-toggle="modal" data-target="#Modal4">
                <i class="fas fa-users fa-2x" id="Guser"></i><br>
                <font size="3" id="fguser">Gestor Usuario</font>       
            </a>
       </div>
    </div>

    <!-- Tabla Casos -->
    <div align = "center" class="global" style="background-color: #f1f1f1;position: absolute;float: left; margin-left:825px; margin-top: 230px">
        <table class="table" style="width: auto; text-align: center; ">
            <thead>
            <tr class="table-primary"><th scope="col" colspan="5" style="text-align: center"><a>Casos</a></td></tr>
                <th scope="col">Nombre</th>
                <th scope="col">Cedula</th>
                <th scope="col">Ubicacion</th>
                <th scope="col">Comentario</th>
                <th scope="col">Eliminar</th>
            </thead>
            <tbody class="table-striped">
                <?php 
                $querys = "select * from casos";
                $result_task = mysqli_query($conn, $querys);

                while($row = mysqli_fetch_array($result_task)){ ?>    
                <tr>
                    <td><?php echo $row['Nombre'] . " " . $row['Apellido']?></td>
                    <td><?php echo $row['Cedula']?></td>
                    <td style="width: 200px"><?php echo $row['Ciudad'] . ", " . $row['Pais']?></td>
                    <td style="width: 200px"><?php echo $row['Comentario']?></td>
                    <td>
                        <a class="btn btn-danger" onclick="window.location.href='action_page.php?idB=<?php echo $row['ID']?>'">
                            <i class="fas fa-trash-alt"></i><br>
                        </a> 
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Tabla Noticias -->
    <div align = "center" class="global" style="background-color: #f1f1f1;position: absolute;float: left; margin-left: 25px; margin-top: 230px">
        <table class="table" style="width: auto; text-align: center; ">
            <thead>
                <tr class="table-primary"><th scope="col" colspan="5" style="text-align: center"><a>Noticias</a></td></tr>
                <th scope="col">Foto</th>
                <th scope="col">Titulo</th>
                <th scope="col" style="width: 200px">Resumen</th>
                <th scope="col">Eliminar</th>
            </thead>
            <tbody class="table-striped">
                <?php 
                $querys = "select * from noticias";
                $result_task = mysqli_query($conn, $querys);

                while($row = mysqli_fetch_array($result_task)){ ?>    
                <tr>
                    <td>  
                        <div style="width: 200px">
                            <img src="<?php echo $row['Foto']?>" style="width: 100%" id="img<?php echo $row['ID']?>" onclick="getFullscreen(document.getElementById('img<?php echo $row['ID']?>'))"></img>
                        </div>
                    </td>
                    <td style="width: 200px"><?php echo $row['Titulo']?></td>
                    <td style="width: 200px"><?php echo $row['Resumen']?></td>
                    <td>
                        <a class="btn btn-danger" onclick="window.location.href='action_page.php?idBn=<?php echo $row['ID']?>'">
                            <i class="fas fa-trash-alt"></i><br>
                        </a> 
                        <a class="btn btn-info" onclick="EditNotice(<?php echo $row['ID']?>)">
                            <i class="fas fa-pencil-alt"></i>
                        </a> 
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'"
        class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" action="action_page.php" method="POST" style="width: 20%">
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

    <!-- Modal Noticia -->
    <div class="modal fade" id="Modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form class="modal-content animate" action="action_page.php" method="POST" style="width: 33%; height: 90%" id="FrmNtc" name="FrmNtc">
            <div class="modal-dialog" role="document" style="width: 100%">
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
                            <input type="text" class="form-control" placeholder="Titulo" value="" id="Titulo" name="Titulo"></input>
                        </div>
 
                        <h5 align="left">Resumen:</h5>
                        <div class="input-group">
                            <textarea class="form-control" placeholder="Resumen" value="" id="Resumen" name="Resumen" rows="3"></textarea>
                        </div>
                     
                        <h5 align="left">Foto:</h5>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id = "foto" aria-describedby="inputGroupFileAddon01" accept="image/png, .jpeg, .jpg, image/gif" onchange="Saver()">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            <input type="text" id="Fotos" name="FotosU" value="" style="display: none"></input>
                            <input type="text" id="select" name="select" value="guardar" style="display: none"></input>
                        </div>
                
                        <h5 align="left">Contenido:</h5>
                        <div class="input-group">
                            <textarea class="form-control" id="Noticia" placeholder="Noticia" rows="4" name="Contenido"></textarea>
                            <button type="submit" name="GuardarNoticia" id="GuardarNoticia" class="btn btn-success btn-block" onclick="Saver()">Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <!-- Modal casos -->
    <div class="modal fade" id="Modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="width: 100%;">
            <div class="modal-content">        
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel" align="center">Agregar Caso</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?php echo $_SESSION['message-type'] ?> alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['message'];
                    unset($_SESSION['message'])?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php } ?>
                <div class="modal-body">
                    <form action="action_page.php" method="POST">
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
                            <input placeholder="Contagio" class="form-control textbox-n" name="Contagio" type="text" onfocus="(this.type='date')" id="Contagio">
                        </div> 
                        <div class="form-group">
                            <textarea class="form-control" id="Comentario" rows="3" name="Comentario" placeholder="Comentario"></textarea>
                        </div>
                            <input type="submit" class="btn btn-success btn-block" name="GuardarCaso" value="Guardar Caso">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Gestor usuarios -->
    <div class="modal fade" id="Modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <form class="modal-content animate" action="action_page.php" method="POST" style="width: 16%; height: 50%">
            <div class="modal-dialog" role="document" style="width: 100%">
                <div class="modal-content">
                    <div class="modal-header" style="text-align: center"> 
                        <h4 class="modal-title" id="exampleModalLabel" align="center">Gestor usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table" style="width: auto; text-align: center;" align="center">
                        <thead>
                            <th scope="col">Usuario</th>
                            <th scope="col">Eliminar</th>
                        </thead>
                        <tbody class="table-striped">
                            <?php 
                                $querys = "select * from usuarios";
                                $result_task = mysqli_query($conn, $querys);
                                while($row = mysqli_fetch_array($result_task)){ 
                            ?>    
                            <tr>
                                <td><?php echo $row['Correo']?></td>
                                <td>
                                    <a class="btn btn-danger" onclick="window.location.href='action_page.php?idB=<?php echo $row['ID']?>'">
                                        <i class="fas fa-trash-alt"></i><br>
                                    </a> 
                                    <a class="btn btn-info" onclick="EditUser(<?php echo $row['ID']?>)">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a> 
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <!-- Modal Editor usuarios -->
    <div class="modal fade" id="Modal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <form class="modal-content animate" action="action_page.php" method="POST" style="width: 16%; height: 50%">
            <div class="modal-dialog" role="document" style="width: 100%">
                <div class="modal-content">
                    <div class="modal-header" style="text-align: center"> 
                        <h4 class="modal-title" id="exampleModalLabel" align="center">Gestor usuario</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h4 style="text-align: center" align = "center">Usuario:</h4>
                            <input type="text" value = "" name="Nuser" id="Nuser" class="form-control" placeholder="Nuevo Usuario" autofocus>
                        </div>
                        <div class="form-group">
                            <h4 style="text-align: center" align = "center">Contraseña:</h4>
                            <input type="text" value = "" name="Ncontra" id="Ncontra" class="form-control" placeholder="Nueva contraseña" autofocus>
                            <input id="ide" name="ide" value="" style="display: none"></input>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success" name="Euser" >Guardar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
    var modal = document.getElementById('id01');
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }  
    function testData(event) {
        console.log(event.target.files[0]);
    }
    function solid(){
        document.getElementById('news').className='far fa-newspaper fa-3x';
        document.getElementById('fnews').size='3';
 
        document.getElementById('cases').className='far fa-address-card fa-3x';
        document.getElementById('fcases').size='3'

        document.getElementById('users').className='fas fa-users fa-3x';
        document.getElementById('fusers').size='3'

        document.getElementById('Guser').className='fas fa-users fa-3x';
        document.getElementById('fguser').size='3'
    }
    function edit(){
        document.getElementById('news').className='far fa-newspaper fa-5x';
        document.getElementById('fnews').size='5';
 
        document.getElementById('cases').className='far fa-address-card fa-3x';
        document.getElementById('fcases').size='3'

        document.getElementById('users').className='fas fa-users fa-3x';
        document.getElementById('fusers').size='3'

        document.getElementById('Guser').className='fas fa-users fa-3x';
        document.getElementById('fguser').size='3'

        document.getElementById('select').value = 'guardar';
    }
    function edit2(){
        document.getElementById('cases').className='far fa-address-card fa-5x';
        document.getElementById('fcases').size='5';

        document.getElementById('news').className='far fa-newspaper fa-3x';
        document.getElementById('fnews').size='3';

        document.getElementById('users').className='fas fa-users fa-3x';
        document.getElementById('fusers').size='3' 

        document.getElementById('Guser').className='fas fa-users fa-3x';
        document.getElementById('fguser').size='3' 
    }
    function edit3(){
        document.getElementById('id01').style.display='block'

        document.getElementById('users').className='fas fa-users fa-5x';
        document.getElementById('fusers').size='5' 

        document.getElementById('cases').className='far fa-address-card fa-3x';
        document.getElementById('fcases').size='3';

        document.getElementById('news').className='far fa-newspaper fa-3x';
        document.getElementById('fnews').size='3';

        document.getElementById('Guser').className='fas fa-users fa-3x';
        document.getElementById('fguser').size='3'
 
    }
    function edit4(){
        document.getElementById('users').className='fas fa-users fa-3x';
        document.getElementById('fusers').size='3' 

        document.getElementById('cases').className='far fa-address-card fa-3x';
        document.getElementById('fcases').size='3';

        document.getElementById('news').className='far fa-newspaper fa-3x';
        document.getElementById('fnews').size='3';

        document.getElementById('Guser').className='fas fa-users fa-5x';
        document.getElementById('fguser').size='5'
 
    }
    function Saver(){
        const file = document.querySelector('input[type=file]').files[0];
        const reader = new FileReader();
        var form = document.getElementById('FrmNtc');

        reader.addEventListener("load", function () {
            document.getElementById('Fotos').value = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
    function getFullscreen(element){
        if(element.requestFullscreen) {
            element.requestFullscreen();
        } else if(element.mozRequestFullScreen) {
            element.mozRequestFullScreen();
        } else if(element.webkitRequestFullscreen) {
            element.webkitRequestFullscreen();
        } else if(element.msRequestFullscreen) {
            element.msRequestFullscreen();
        }
    }
    function EditUser(ID){
        var usuarios = [];
        var contra = [];

        <?php 
            $querys = "select * from usuarios";
            $result_task = mysqli_query($conn, $querys);
            $_SESSION['index'] = 1;
            while($row = mysqli_fetch_array($result_task)){ 
        ?>
            usuarios[<?php echo $row['ID'] ?>] = "<?php echo $row['Correo']?>";
            contra[<?php echo $row['ID'] ?>] = "<?php echo $row['Clave']?>";
        <?php } ?>
        document.getElementById('Nuser').value = usuarios[ID];
        document.getElementById('Ncontra').value = contra[ID];
        document.getElementById('ide').value = ID;
        $('#Modal4').modal('hide');
        $('#Modal5').modal('toggle');
        $('#Modal5').modal('show');
    }
    function EditNotice(ID){
        document.getElementById('select').value = ID;
        var titulo = [];
        var foto = [];
        var resumen = [];
        var contenido = [];

        <?php 
            $querys = "select * from noticias";
            $result_task = mysqli_query($conn, $querys);
            $_SESSION['index'] = 1;
            while($row = mysqli_fetch_array($result_task)){ 
        ?>
            titulo[<?php echo $row['ID'] ?>] = "<?php echo $row['Titulo']?>";
            foto[<?php echo $row['ID'] ?>] = "<?php echo $row['Foto']?>";
            resumen[<?php echo $row['ID'] ?>] = "<?php echo $row['Resumen']?>";
            contenido[<?php echo $row['ID'] ?>] = `<?php echo $row['Noticia']?>`;
        <?php } ?>
        document.getElementById('Titulo').value = titulo[ID];
        document.getElementById('Resumen').value = resumen[ID];
        document.getElementById('Noticia').value = String(contenido[ID]);
        document.getElementById('Fotos').value = foto[ID];
        $('#Modal2').modal('toggle');
        $('#Modal2').modal('show');
    }
    </script>
</body>
</html>