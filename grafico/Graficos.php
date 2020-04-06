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
    <link rel="stylesheet" href="../estilo.css">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="librerias/plotly-latest.min.js"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="librerias/plotly-latest.min.js"></script>


<!--Bootstrap-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   
    <title>Estadisticas</title>
</head>
<body class="d-flex flex-column">
<div class="page-header">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" href="../index.php"><h2><i class="fas fa-globe-americas"></i>CoronaVirus-Life</h2></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="mapa\"><i class="fas fa-map-marked-alt"></i> Mapa</a>
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
            <button class="btn btn-success nav-link" onclick="login()" style="width: 100px">Login</button>
        </li>
    </ul>
</div>


<div id="page-content" >


<div class="container">
<div class="row"> 
<div class="col-sm-12">

<div class="panel panel-primary">
<div class="panel panel-heading">
    <h3 class="g-titulo">Graficas De Casos por Signo Zodiacal</h3>
<div>
    <div class="panel panel-body">

   

    <div id="grafico1" style="float: left; width: 33%"></div>
    
    <div id="grafico2" style="float: left; width: 33%"></div>
    
    <div id="grafico3" style="float: left; width: 33%"></div>

    <script>
        var parametros = [];
        var valores = [];
        var aries = 0
        var libra=0
        var tauro=0
        var escorpio =0
        var geminis=0
        var sagitario =0
        var cancer =0
        var capricornio = 0
        var leo =0
        var acuario =0
        var virgo =0
        var piscis =0

        <?php 
            $query = "SELECT Nacimiento FROM casos";
            $result = mysqli_query($conn, $query);
            while($row = mysqli_fetch_array($result)){?>
                var fecha = '<?php echo $row['Nacimiento'] ?>'
                var dia = parseInt(fecha.substring(8,10))
                var mes = parseInt(fecha.substring(5,7)) 

                if((dia>=21&&mes==3)||(dia<=20&&mes==4))
                    aries++
                if((dia>=24&&mes==9)||(dia<=23&&mes==10))
                    libra++
                if((dia>=21&&mes==4)||(dia<=21&&mes==5))
                    tauro++
                if((dia>=24&&mes==10)||(dia<=22&&mes==11))
                    escorpio++
                if((dia>=22&&mes==5)||(dia<=21&&mes==6))
                    geminis++
                if((dia>=23&&mes==11)||(dia<=21&&mes==12))
                    sagitario++
                if((dia>=21&&mes==6)||(dia<=23&&mes==7))
                    cancer++
                if((dia>=22&&mes==12)||(dia<=20&&mes==1))
                    capricornio++
                if((dia>=24&&mes==7)||(dia<=23&&mes==8))
                    leo++
                if((dia>=21&&mes==1)||(dia<=19&&mes==2))
                    acuario++
                if((dia>=24&&mes==8)||(dia<=23&&mes==9))
                    virgo++
                if((dia>=20&&mes==2)||(dia<=20&&mes==3))
                    piscis++
            <?php } 
        ?>
        parametros.push('aries');
        valores.push(aries);
        parametros.push('libra');
        valores.push(libra);
        parametros.push('tauro');
        valores.push(tauro);
        parametros.push('escorpio');
        valores.push(escorpio);
        parametros.push('geminis');
        valores.push(geminis);
        parametros.push('sagitario');
        valores.push(sagitario);
        parametros.push('cancer');
        valores.push(cancer);
        parametros.push('capricornio');
        valores.push(capricornio);
        parametros.push('leo');
        valores.push(leo);
        parametros.push('acuario');
        valores.push(acuario);
        parametros.push('virgo');
        valores.push(virgo);
        parametros.push('piscis');
        valores.push(piscis);
        var data1 = [{
            x: parametros,
            y: valores,
            type: "lineal"
        }];
        var data2 = [{
            x: parametros,
            y: valores,
            type: "bar"
        }];
        var data3 = [{
            x: parametros,
            y: valores,
            type: "box"
        }];
        var layout = {
            title:'casos por signo',
        };
        var layout2 = {
            title:'casos por signo'
        };
        var layout3 = {
            title:'casos por signo'
        };
        Plotly.newPlot("grafico1",data1, layout);
        Plotly.newPlot("grafico2",data2, layout2);
        Plotly.newPlot("grafico3",data3, layout3);

        function selected(){
            var fecha = document.getElementById('sl01').value;
            window.location.href='index.php?fecha='+fecha;
        }
        
    </script>
    
    </div>
    </div>
    </div>
</div>
</div>

</div>

</div>
</div>
</div>
</div>
</div>


<!-- The Modal -->
<div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'"
        class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" action="Archives\action_page.php" method="POST" style="width: 30%">
            <div class="imgcontainer">
                <h3>Administrador</h3>
                <img src="../Resources\avatar.png" alt="Avatar" class="avatar" style="width: 25%">
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