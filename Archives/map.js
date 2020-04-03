// captura de tabla de valores
cont=document.getElementById('contador').innerHTML;

var datos={
    documentos:[],
}

for(var x=0;x<=parseInt(cont);x++){

    documento={
        "id":document.getElementById('i'+x).innerHTML,
        "cedula":document.getElementById('c'+x).innerHTML,
        "nombre":document.getElementById('n'+x).innerHTML,
        "apellido":document.getElementById('a'+x).innerHTML,
        "nacimiento":document.getElementById('na'+x).innerHTML,
        "pais":document.getElementById('pa'+x).innerHTML,
        "ciudad":document.getElementById('ci'+x).innerHTML,
        "latitud":document.getElementById('la'+x).innerHTML,
        "longitud":document.getElementById('lo'+x).innerHTML,
        "contagio":document.getElementById('co'+x).innerHTML,
        "comentario":document.getElementById('com'+x).innerHTML,



    }
    datos.documentos.push(documento);
    


}



/* pk.eyJ1IjoiaGlqaTEwMCIsImEiOiJjazd3NWR6dmcwMHQ0M2ZxaHBkbnFwcDVnIn0.Gj4Y5MIVUG-oldQ5KG-Ujw */

mapboxgl.accessToken = 'pk.eyJ1IjoiaGlqaTEwMCIsImEiOiJjazd3NWR6dmcwMHQ0M2ZxaHBkbnFwcDVnIn0.Gj4Y5MIVUG-oldQ5KG-Ujw';
var map = new mapboxgl.Map({
container: 'map',
style: 'mapbox://styles/mapbox/light-v10',
center: [-70.602898,18.796077],
zoom: 6
});
 


//for gestion base de datos por medio de la tabla

for( var y=0;y<=parseInt(cont);y++){
    dato=datos.documentos[y];


    // create the popup
    var popup = new mapboxgl.Popup({ offset: 25 }).setText(
    'La cedula '+ dato.cedula+' fue contagiado el '+dato.contagio+', esta en el pais de '+dato.pais+', comentarios: '+dato.comentario
    );
     
    // create DOM element for the marker
    var el = document.createElement('div');
    el.id = 'marker';
     
    // create the marker
    new mapboxgl.Marker(el)
    .setLngLat([parseFloat(dato.longitud),parseFloat(dato.latitud)])
    .setPopup(popup) // sets a popup on this marker
    .addTo(map);

}