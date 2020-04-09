<?php 
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'proyecto'
    );
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--News.css-->
   <link rel="stylesheet" href="Noticias.css" >
   
   <!--Bootstrap-->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
   <!--Font Awesome-->
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

   <!--JQuery-->
   <script type="text/javascript" src="jquery-3.4.1.min.js"></script>

</head>
<body class="d-flex flex-column">

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
            <li class="nav-item nav-lejos">
                <a class="nav-link" href="#"><i class="fas fa-user-tie"></i> Ingresar as Admin</a>
            </li>
        </ul>
    </div>
    <?php 
        if(isset($_GET['idNot'])){
            $id = $_GET['idNot'];
            $query = "select * from noticias where id = $id";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){
    ?>
    <div id="page-content">
	    <div id="arriba">
            <h1><?php echo $row['Titulo']?></h1>
        </div>
        <div id="izquierda">
            <img src="<?php echo $row['Foto']?>" id="imagen"  align="right">    
                <textarea id="Contenido" value = " " readonly></textarea>
            </img>
        </div> 
        <div id="derecha">
            <h5>Otras noticias</h5><br>
            <?php
            $query2 = "select * from noticias where id <> $id  order by id desc limit 5";
            $result2 = mysqli_query($conn, $query2);
            while($row2 = mysqli_fetch_array($result2)){?>
                <div onclick="window.location.href='News.php?idNot=<?php echo $row2['ID']?>'"> 
                <img src="<?php echo $row2['Foto']?>" class="imgO"  align="left" onclick="window.location.href='News.php?idNot=<?php echo $row2['ID']?>'">
                    <p style="text-align:left" onclick="window.location.href='News.php?idNot=<?php echo $row2['ID']?>'"> <?php echo $row2['Titulo']?> </p>
                </img>
                </div>
                <br>
            <?php } ?>
        </div>
    </div>
    <script>
        document.getElementById('Contenido').innerHTML = `<?php echo $row['Noticia']?>`
    </script>
        <?php }} ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>