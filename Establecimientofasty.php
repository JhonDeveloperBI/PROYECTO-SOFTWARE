<?php
require("include/BaseDatos.php");
require("include/config.php");


$mensaje ="";
if(isset($_POST['name']) || isset($_POST['direccion']) || isset($_POST['telefono']) || isset($_POST['descripcion']) ){
	if(isset($_POST['name']) && isset($_POST['direccion']) && isset($_POST['telefono']) && isset($_POST['descripcion'])  && !is_null($_POST['name']) && !is_null($_POST['direccion']) && !is_null($_POST['telefono']) && !is_null($_POST['descripcion'])){

		$nombre = $_POST['name'];
		$direccion = $_POST['direccion'];
		$tel = $_POST['telefono'];
		$des = $_POST['descripcion'];
		$long = $_POST['long'];
		$lat= $_POST['lat'];
		$link= $_POST['link'];

		
		$sql2="INSERT INTO `establecimiento` (`idEstablecimiento`, `nombre`, `direccion`, `telefono`, `descripcion`, `longitud`, `latitud`, `linkImagen`) VALUES (NULL, '".$nombre."', '".$direccion."', '".$tel."', '".$des."', '".$long."', '".$lat."' , '".$link."');";

			$result1 = $db->ejecutarConsulta($sql2);

			if($result1){

				$mensaje =  "Registro satisfactorio";
	
			}else{
				$mensaje="Error en los datos";
			}

	}
}

?>



<!DOCTYPE html><html>
<head>

<title>Registrar Establecimiento</title>
<link rel="stylesheet" href="css/style3.css">

	<link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

	<!-- For-Mobile-Apps-and-Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Simple Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<script type="text/javascript">

	</script>
	<style type="text/css">

	#map{
	width:400px;
	float:left;
	height:400px;
	}
	
	
	</style>
</head>
<body>
	
	<div class="container w3">
		<h2>Registro</h2>
		<p style="color: red; background-color:rgba(0,0,0,0.35)"><?php echo $mensaje; ?></p>
		<form id="form" name="form" action="mapa.php" method="post">
			<div id= "map">
			</div>
			<div class="username">
				<span class="username">Nombre:</span>
				<input type="text" name="name" class="name" placeholder="" required="true">
				<div class="clear"></div>
			</div>
			<div class="username">
				<span class="username">Dirección:</span>
				<input type="text" name="direccion" class="name" placeholder="" required="true">
				<div class="clear"></div>
			</div>
			<div class="username">
				<span class="username">Telefono:</span>
				<input type="number" name="telefono" class="name" placeholder="" required="true">
				<div class="clear"></div>
			</div>
			<div class="username">
				<span class="username">Descripcion:</span>
				<input type="text" name="descripcion" class="name" placeholder="" required="true">
				<div class="clear"></div>
			</div>

			<div class="username">
				<span class="username">Longitud</span>
				<input type="text" name="long" class="name" placeholder="" readonly="readonly">
				<div class="clear"></div>
			</div>

			<div class="username">
				<span class="username">Latitud</span>
				<input type="text" name="lat" class="name" placeholder="" readonly="readonly">
				<div class="clear"></div>
			</div>

			<div class="username">
				<span class="username">link Imagen</span>
				<input type="text" name="link" class="name" placeholder="" required="false">
				<div class="clear"></div>
			</div>

			<div class="login-w3">
				<button onclick="window.location.href='admin.php'" class="login">Cancelar</button>
			</div>

			<div class="login-w3">
				<input type="submit" class="login" value="Registrar">
			</div>
			


			<div class="clear"></div>
		</form>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
   <script>

var map;
var markers= [];
var formulario = $("#form");
function initMap() {

	  map = new google.maps.Map(document.getElementById('map'), {
	    center: {lat: 4.555911, lng: -75.659844},
	    zoom: 16
	  });
	  var infoWindow = new google.maps.InfoWindow({map: map});

	  // Try HTML5 geolocation.
	  if (navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition(function(position) {
		      var pos = {
		        lat: position.coords.latitude,
		        lng: position.coords.longitude
		      };

		      infoWindow.setPosition(pos);
		      infoWindow.setContent('Location found.');
		      map.setCenter(pos);
		    }, function() {
		      handleLocationError(true, infoWindow, map.getCenter());
		    });
	  } else {
		    // Browser doesn't support Geolocation
		    handleLocationError(false, infoWindow, map.getCenter());
	  	}

	   map.addListener('click', function(e) {
		    //elimina todos los marcadores del mapa
		    setMapOnAll(null);
		    placeMarkerAndPanTo(e.latLng, map);
		    
		    var coordenadas = e.latLng.toString();
           
	        coordenadas = coordenadas.replace("(", "");
	        coordenadas = coordenadas.replace(")", "");
	           
	        var lista = coordenadas.split(",");

	         formulario.find("input[name='long']").val(lista[0]);
             formulario.find("input[name='lat']").val(lista[1]);

	  });
	}

	function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');

}
	// Agrega todos los marcadores del mapa
	function setMapOnAll(map) {
	  for (var i = 0; i < markers.length; i++) {
	    markers[i].setMap(map);
	  }
	}
	function placeMarkerAndPanTo(latLng, map) {
	  var marker = new google.maps.Marker({
	    position: latLng,
	    map: map,
	    animation:google.maps.Animation.DROP,
	    draggable:false
	  });
	  map.panTo(latLng);
	  markers.push(marker);
	
	}




    </script>
     <!--aPI GOOGLE MAPA -->
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApG5XlUDnYYXi4pKkv2_ucfx_kZZqAaWw&callback=initMap"></script>
    </script>
</body>
</html>