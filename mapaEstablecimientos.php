<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <script type="text/javascript" src="jquery-1.6.1.min.js"></script>
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat:  4.555911, lng:-75.659844},
     mapTypeControl: true,
    zoom: 20
  });


 var image =
        { 
          url: "green.png",
          // This marker is 20 pixels wide by 32 pixels high.
          size: new google.maps.Size(32,32),
          // The origin for this image is (0, 0).
          origin: new google.maps.Point(0,0),
           
          // The anchor for this image is the base of the flagpole at (0, 32).
          anchor: new google.maps.Point(0, 32),

                 };

var content="<br>"+"MI POSICION =) "+"</br>";

var infowindow = new google.maps.InfoWindow({
    content: content
  })

 var marker = new google.maps.Marker({
            position:{lat:  4.555911, lng:-75.659844} ,
            icon: image,
            map: map
          });

 marker.addListener('click', function() {
    infowindow.open(map, marker);
  });



//enviamos el dia que queremos filtrar
var parametros = {
    "fechaDia" :'0' 
  };



$.ajax({
    url: "consultaEstablecimientos.php",
    type: 'POST',
    data: parametros,
    dataType:"json",
    async:false,
    cache:false,
    success: function(establecimientos) {
      console.log("bien recargo Pagina");
     
    alert(establecimientos.length);

     if(establecimientos.length!=0)
     {
      
      for(var i=0;i<establecimientos.length;i++)
      {  
      var coordenadas=establecimientos[i].UbicacionGps.split(",");


        var myLatlng = new google.maps.LatLng(coordenadas[0],coordenadas[1]);




        var informacion=establecimientos[i].nombre;

          
        var marker=new google.maps.Marker({
         position: myLatlng,
         map: map,
         title:informacion,
         visible:true,
         clickable:true
       });
     


        var info= new google.maps.InfoWindow();


//c= "Nombre: "+arreglovalores.nombreUsuarioFacebook  +"<br>"+"Telefono:"+arreglovalores.telefonoUsuario+"</br>"+"Ubicacion:"+x[0]+"<br>"+"Ciudad: "+ciudad+"<br>"+"Emergencia: "+arreglovalores.emergencia+"</br>"+"Fecha: "+arreglovalores.fecha+"<br>"+"Hora: "+arreglovalores.hora+"</br>";
       
        var content= '<div style="border-radius:16px;opacity:0.8;">'+"Nombre: "+establecimientos[i].nombre+
        "<br>"+"Telefono: "+establecimientos[i].telefono+
        "</br>"+"Descripcion: "+establecimientos[i].descripcion+"</br>"+
        "Hora: "+establecimientos[i].hora+"</br>"+
        "Ubicacion: "+establecimientos[i].UbicacionGps+"<br>"+
        "Direccion: "+establecimientos[i].direccion+"<br>";
        
//evento para colocar los info en los respectivos marker
google.maps.event.addListener(marker,'click', (function(marker,content,info){ 
  return function() {
    info.setContent(content);
    info.open(map,marker);
  };
})(marker,content,info)); 

}//for





     }//if
    
     
   }//sucess

});



  



}//init map



    </script>
     <!--aPI GOOGLE MAPA -->
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApG5XlUDnYYXi4pKkv2_ucfx_kZZqAaWw&callback=initMap"></script>
    </script>
  </body>
</html>