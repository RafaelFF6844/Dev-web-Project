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
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <script src="librerias/plotly-latest.min.js"></script>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    
    <title>Document</title>
</head>
<body>
<div class="container">
<div class="row"> 
<div class="col-sm-12">

<div class="panel panel-primary">
<div class="panel panel-heading">
    Graficas De los Zigno Del Zodiaco
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
</body>
</html>