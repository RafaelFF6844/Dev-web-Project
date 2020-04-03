<?php plantilla::aplicar();?>
<h3>Mapa</h3>
<div>
  <a href="<?php echo base_url('factura/editar/0');?>" class="btn btn-danger">Registrar Incidente</a>
</div>
<div>
<div id="mapid" style=" height: 480px;">
</div>

</div>

<style>
    body {background-color: #9E9E9E; }
    </style>
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
    alert("You clicked the map at " + e.latlng);
}
}


  mymap.on('click', onMapClick);
  var popup = L.popup();
  //19.460942, -67.765669


<?php
$CI =& get_instance();
$rs = $CI->db->get('casos')->result_array();


foreach($rs as $fila){
  echo "
    var marker = L.marker([{$fila['latitud']},{$fila['logitud']}]).addTo(mymap);
    marker.bindPopup('<b>Caso'+{$fila['id']}+'!</b><br>'+'{$fila['Comentario']}'+'.').openPopup();
    function onMapClick(e) {
        alert('You clicked the map at ' + e.latlng);
    }
  
  
  
  ";
  }
  
  ?>

function agrgar(latitud,logitud,id,description){
var marker = L.marker([latitud,logitud]).addTo(mymap);
marker.bindPopup("<b>Caso "+id+"!</b><br>"+description+".").openPopup();
function onMapClick(e) {
    alert("You clicked the map at " + e.latlng);
}
}
mymap.on('click', onMapClick);
var popup = L.popup();
//19.460942, -67.765669

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent("You clicked the map at " + e.latlng.toString())
        .openOn(mymap);

        document.getElementById("latitud").value="hola"+e.latlng.toString();
}

mymap.on('click', onMapClick);

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
          document.getElementById("latitud").value=e.latlng.lat.toString();
            document.getElementById("logitud").value=e.latlng.lng.toString();
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
