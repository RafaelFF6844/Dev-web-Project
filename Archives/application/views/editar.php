<?php plantilla ::aplicar();

$CI = &get_instance();
$map =  new wan_map();
$map ->fecha = date('Y-m-d');

$map->id=$id;

if($_POST){

   foreach ($map as $prop=>$val) {
   $map-> $prop = $_POST[$prop];
  }
if($map ->id >0){

      $CI->db->where('id',$map->id);
    $CI->db->update('casos',$map);

  }else{
         $CI->db->insert('casos',$map);
          $map->id=$CI->db->insert_id();
    }




}

?>

<style>
    body {background-color: #424242; }
    </style>
   
<div class="container-fluid">
<div class="table-bordered">
<table class="table">
<h3 class="hidden-xs bg-primary">Incidentes en las Elecciones </h3>

<form method="post" action="">
<div class="input-group form-group">
  <div class="input-group input-group-lg">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-lg">Fecha</span>
  </div>

  <input type="date" name="fecha" required id="fecha"  required class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
  <input type="hidden"  name='id'/>
  <div class="text-right">
  <button type = "submit" class="btn btn-dark">Guardar</button>
  </div>
</div>
</div>






<div class="col-xs-4">
      <div class="input-group form-group-sm mb-3" >
  <div class="input-group-prepend" >
    <span class="input-group-text" id="inputGroup-sizing-default" >CEDULA</span>
  </div>
  <input type="text" name="Cedula" required id="Cedula" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-sm">

</div>

<div class="col-xs-4">
      <div class="input-group form-group-sm mb-3" >
  <div class="input-group-prepend" >
    <span class="input-group-text" id="inputGroup-sizing-default" >Nombre</span>
  </div>
  <input type="text" name="Nombre" required id="Nombre" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-sm">

</div>


 
    
<hr>
  <div class="input-group input-group-lg">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-lg">Apellido</span>
  </div>
  <input type="text" name="Apellido" required id="Apellido" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
</div>
</hr>


<div class="col-xs-4">
      <div class="input-group form-group-sm mb-3" >
  <div class="input-group-prepend" >
    <span class="input-group-text" id="inputGroup-sizing-default" >Nacimiento</span>
  </div>
  <input type="date" name="Nacimiento" required id="Nacimiento" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-sm">

</div>


<div class="col-xs-4">
      <div class="input-group form-group-sm mb-3" >
  <div class="input-group-prepend" >
    <span class="input-group-text" id="inputGroup-sizing-default" >Pais</span>
  </div>
  <input type="text" name="Pais" required id="Pais" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-sm">

</div>

<div class="col-xs-4">
      <div class="input-group form-group-sm mb-3" >
  <div class="input-group-prepend" >
    <span class="input-group-text" id="inputGroup-sizing-default" >Ciudad</span>
  </div>
  <input type="text" name="Ciudad" required id="Ciudad" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-sm">

</div>
 
<hr>
  <div class="input-group input-group-lg">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-lg">LATITUD</span>
  </div>
  <input type="text" name="Latitud" required id="Latitud" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
</div>
</hr>


<hr>
  <div class="input-group input-group-lg">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-lg">LONGITUD</span>
  </div>
  <input type="text" name="Longitud" required id="Longitud" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
</div>
</hr>


<hr>
<div class="input-group input-group-lg">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-lg">Contagio</span>
  </div>
  <input type="date" name="Contagio" required id="Contagio" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
</div>
</hr>

<hr>
<div class="input-group input-group-lg">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-lg">Comentario</span>
  </div>
  <input type="text" name="Comentario" required id="Comentario" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
</div>

</table>
</div>
</div>
<div id="mapid" style=" height: 480px;">
  </div>
  </hr>

  
  <script>
    var mymap = L.map('mapid').setView([18.47460, -70.01211], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 18,
      id: 'mapbox/streets-v11',
      tileSize: 512,
      zoomOffset: -1,
      accessToken: 'pk.eyJ1Ijoidmljam9lbDEzIiwiYSI6ImNrN28xazQwNTA0bnYzaHAwaHh6NnpqczIifQ.S9dQYbFdkeUWi75cYqTm1w'

  }).addTo(mymap);

  function agrgar(latitud,logitud,id,description){
  var marker = L.marker([latitud,logitud]).addTo(mymap);
  marker.bindPopup("<b>Caso "+id+"!</b><br>"+description+".").openPopup();
  function onMapClick(e) {
      alert("Usted esta en RD " + e.latlng);
      document.getElementById("Latitud").value=e.latlng.lat.toString();
        document.getElementById("Longitud").value=e.latlng.lng.toString();
  }
  }

  mymap.on('click', onMapClick);
  var popup = L.popup();
  //19.460942, -67.765669

    function onMapClick(e) {
    if(e.latlng.lat < 20.041482 && e.latlng.lat > 17.309737){
      if(e.latlng.lng > -72.010437 && e.latlng.lng < -68.199829){
        popup
          .setLatLng(e.latlng)
          .setContent("Usted esta en RD "+e.latlng.toString())
          .openOn(mymap)
          document.getElementById("Latitud").value=e.latlng.lat.toString();
            document.getElementById("Longitud").value=e.latlng.lng.toString();
      }else{
        popup
          .setLatLng(e.latlng)
          .setContent("FUERA DE RD"+e.latlng.toString())
          .openOn(mymap)

      }
    }else{
      popup
        .setLatLng(e.latlng)
        .setContent("FUERA DE RD"+e.latlng.toString())
        .openOn(mymap)

    }
  }


  </script>

  </form>
