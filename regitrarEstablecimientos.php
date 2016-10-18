<!DOCTYPE html>
<html>
<head>

<script type="text/javascript">
	
function enviar()
{
var a=document.getElementById('nombre');
var b=document.getElementById('direccion');
var c=document.getElementById('telefono');
var d=document.getElementById('descripcion');
var e=document.getElementById('hora');
var f=document.getElementById('ubicacion');

if(a!=null&&b!=null&&c!=null&&d!=null&&e!=null&&f!=null)
	return true;
else
	{
		alert("Llene todos los campos por favor");
		return false;}

}


</script>



	<style type="text/css">
	
	@import url(https://fonts.googleapis.com/css?family=Fauna+One|Muli);
	/*//to load google fonts in our page.*/
	#form{
		background-color:white;
		color:#123456;
		box-shadow:0px 1px 1px 1px gray;
		font-Weight:400;
		width:474px;
		margin:-94px 250px 0 265px;
		float:left;
		height:685px;
	}
	#form div{
		padding:10px 0 0 30px;
	}
	h3{
		margin-top:0px;
		color:white;
		background-color:#337ab7;;
		text-align:center;
		width:100%;
		height:50px;
		padding-top:30px;
	}
	#mainform{
		width:960px;
		margin:20px auto;
		padding-top:20px;
		font-family: 'Fauna One', serif;
	}
	#mainform h2{
		width:100%; float:left;
	}
	input{
		width:90%;
		height:30px;
		margin-top:10px;
		border-radius:3px;
		padding:2px;
		box-shadow:0px 1px 1px 0px darkgray;
	}

	.innerdiv{
		width:65%; float:left;
	}
	input[type=button]{
		background-color:#4f4972;
		border:1px solid white;
		font-family: 'Fauna One', serif;
		font-Weight:bold;
		font-size:18px;
		color:white;
	}
	#clear{clear:both;
	}
	/*CSS for right side advertizement*/
	#formget{
		float:right;
		width:30%;
		margin-top:30px;
	}



	</style>


	<title>Registrar Establecimiento</title>
	<script src="jquery-1.6.1.min.js"></script>
</head>
<body>
	<div id="mainform">
		<div class="innerdiv">
			<!-- Required Div Starts Here -->
			<form id="form" name="form" action="registrarEstablecimientobase.php" onsubmit="return enviar();" method="post">
			<h3>Fill Your Information!</h3>
				<div>
					<label>Nombre :</label>
					<input id="nombre" name="nombre" type="text" required>
					<label>Direccion :</label>
					<input id="direccion" name="direccion" type="text" required>
					<label>Telefono :</label>
					<input id="telefono"  name="telefono" type="text" required>
					<label>Hora atencion :</label>
					<input id="hora" name="hora" type="text" required>
					<label>Ubicacion Gps:</label>
					<input id="ubicacion" name="ubicacion" type="text" required>
					<label>Descripcion:</label>
					<input id="descripcion"  name="descripcion"style="
					width:97%;
					height:85px;
					margin-top:10px;
					border-radius:3px;
					padding:2px;
					box-shadow:0px 1px 1px 0px darkgray; " 
					type="text" required>
					 <button type="submit" class="btn btn-primary" style="padding:15px; margin:10px 115px; background-color: #337ab7;
    border-color: #2e6da4;color: #fff; border-radius: 4px;">Registrar Establecimiento</button>
				
				</div>
			</form>
			<div id="clear"></div>
		</div>
		<div id="clear"></div>
	</div>
</body>
</html>