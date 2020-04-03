<?php

$conexion = mysqli_connect("localhost","root","123","proyecto");
$consultar="SELECT * FROM casos";
$query= mysqli_query($conexion,$consultar);
$array=mysqli_fetch_array($query);

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
        
        <li class="nav-item nav-lejos">
            <a class="nav-link" href="#"><i class="fas fa-user-tie"></i> Ingresar as Admin</a>
        </li>
    </ul>
</div>



<div id="page-content" >

    <div id="map"></div>

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

</body>
</html>