<?php

 class plantilla{

static $instancia=null;
static function aplicar(){
  self::$instancia = new plantilla();

}
   function __construct(){
    $CI = &get_instance();


     ?>
<!Doctype html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
   <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"
   integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew=="
   crossorigin=""></script>
</head>
<body>

  <div class ="container">
    <div>

      <h1 style="color:#E6EE9C;" >Incidentes en Elecciones</h1>
  
      <hr />
      <div style="min-heigh:300px;">


     <?php
   }

   function __destruct(){
     ?>
   </div>
    </div>
   </div>
   <hr/>
   Derechos Reservados, jhonnilapauta@gmail.com
  </div>
 </body>
</html>
     <?php
   }
 }
