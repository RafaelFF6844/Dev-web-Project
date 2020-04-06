// captura de tabla de valores

var cedula= document.getElementById("cedula").value;
var latitud= document.getElementById("latitud").value;
var longitud= document.getElementById("longitud").value;




/* pk.eyJ1IjoiaGlqaTEwMCIsImEiOiJjazd3NWR6dmcwMHQ0M2ZxaHBkbnFwcDVnIn0.Gj4Y5MIVUG-oldQ5KG-Ujw */

mapboxgl.accessToken = 'pk.eyJ1IjoiaGlqaTEwMCIsImEiOiJjazd3NWR6dmcwMHQ0M2ZxaHBkbnFwcDVnIn0.Gj4Y5MIVUG-oldQ5KG-Ujw';
var map2 = new mapboxgl.Map({
container: 'map2',
style: 'mapbox://styles/mapbox/light-v10',
center: [parseFloat(longitud),parseFloat(latitud)],
zoom: 6
});
 


//for gestion base de datos por medio de la tabla




    // create the popup
    var popup = new mapboxgl.Popup({ offset: 25 });
     
    // create DOM element for the marker
    var el = document.createElement('div');
    el.id = 'marker';
    if((parseFloat(latitud)>18.4718609 & parseFloat(latitud)<19.9039990) & (parseFloat(longitud)< -69.8923187 & parseFloat(longitud)> -71.89231869999999)){
        
        el.style= 'background-image: url("http://173.249.49.169:88/api/test/foto/'+cedula+'")'; 
    }else{
        el.style= 'background-image: url("https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png")'; 

    }
     
    // create the marker
    new mapboxgl.Marker(el)
    .setLngLat([parseFloat(longitud),parseFloat(latitud)])
   
    .addTo(map2);


  
