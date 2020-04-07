<?php

$conexion = mysqli_connect("localhost","root","","proyecto");
$consultar="SELECT * FROM casos";
$query= mysqli_query($conexion,$consultar);
$array=mysqli_fetch_array($query);

$consultar2="SELECT * FROM noticias where id=4";
$query2= mysqli_query($conexion,$consultar2);
$array2=mysqli_fetch_array($query2);

$consultar3="SELECT * FROM noticias";
$query3= mysqli_query($conexion,$consultar3);
$array3=mysqli_fetch_array($query3);

$x=-1;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">

<!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!--JQuery-->
    <script type="text/javascript" src="Archives\jquery-3.4.1.min.js"></script>
    <!--MapBox-->
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.css' rel='stylesheet' />
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.8.1/mapbox-gl.js'></script>
   

    <title>Inicio</title>
</head>
<body class="d-flex flex-column">
<div class="page-header">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="index.php"><h2><i class="fas fa-globe-americas"></i>CoronaVirus-Life</h2></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="mapa\"><i class="fas fa-map-marked-alt"></i> Mapa</a>
        </li>
       
        <li class="nav-item">
            <a class="nav-link" href="Archives\sub.php"><i class="fas fa-thumbs-up"></i> Subscribete</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="grafico\Graficos.php"><i class="fas fa-chart-line"></i> Estadisticas</a>
        </li>
        
        <li class="nav-item nav-lejos">
            <button class="btn btn-success nav-link" onclick="login()" style="width: 100px">Login</button>
        </li>
    </ul>
</div>



<div id="page-content" >

    <div id="map"></div>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
  <?php
        foreach ($query2 as $row){ ?>
        
    <div class="carousel-item active">
        <img src="<?php echo $row['Foto']; ?>" class="img-carousel" onclick="window.location.href='Archives/News.php?idNot=<?php echo $row['ID']?>'">
        <div class="carousel-caption">
            <h5 class="title-news" ><?php echo $row['Titulo']; ?></h5>
            
        </div>
    </div>
    <?php
        }
    ?>

<?php
        foreach ($query3 as $row){ ?>
        
    <div class="carousel-item">
        <img src="<?php echo $row['Foto']; ?>" class="img-carousel" onclick="window.location.href='Archives/News.php?idNot=<?php echo $row['ID']?>'">
        <div class="carousel-caption">
            <h5 class="title-news" ><?php echo $row['Titulo']; ?></h5>
            
        </div>
    </div>
    <?php
        }
    ?>

  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>




<!-- CODIGO DE 2DO PLANO, HACEN FUNCIONES DE FONDO, NO GRAFICAS!, NO TOCAR! -->

    <div style="display:none;">
        <?php
        foreach ($query as $row){ ?>
                    <?php $y=$x+1?>


       
            <p id='i<?php echo $y; ?>'><?php echo $row['ID']; ?></p>
            <p id='c<?php echo $y; ?>'><?php echo $row['Cedula']; ?></p>
            <p id='n<?php echo $y; ?>'><?php echo $row['Nombre']; ?></p>
            <p id='a<?php echo $y; ?>'><?php echo $row['Apellido']; ?></p>
            <p id='na<?php echo $y; ?>'><?php echo $row['Nacimiento']; ?></p>
            <p id='pa<?php echo $y; ?>'><?php echo $row['Pais']; ?></p>
            <p id='ci<?php echo $y; ?>'><?php echo $row['Ciudad']; ?></p>
            <p id='la<?php echo $y; ?>'><?php echo $row['Latitud']; ?></p>
            <p id='lo<?php echo $y; ?>'><?php echo $row['Longitud']; ?></p>
            <p id='co<?php echo $y; ?>'><?php echo $row['Contagio']; ?></p>       
            <p id='com<?php echo $y; ?>'><?php echo $row['Comentario']; ?></p>            
    
            <?php $x=$y?>

        

  
    <?php
        }
    ?>
    </div>

<p id='contador' style="display:none;"  value="<?php echo $x?>"><?php echo $x?></p>
        
</div>
<script src="Archives\map.js"></script>


<!-- The Modal -->
<div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'"
        class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" action="Archives\action_page.php" method="POST" style="width: 30%">
            <div class="imgcontainer">
                <h3>Administrador</h3>
                <img src="Resources\avatar.png" alt="Avatar" class="avatar" style="width: 25%">
            </div>

            <div class="container">
                <label for="Usuario"><b>Usuario</b></label>
                <input type="text" class="imputE" placeholder="Introduzca el usuario" name="Usuario" required>
                <br>
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

</body>
</html>