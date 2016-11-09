<?php 
require_once("include/BaseDatos.php");
require_once("include/config.php");
include("include/head.php"); 

?>


<!-- MENU-->

<div class="content">
	<div class="about-section" id="about">
		<div class="container">
			<div class="row">
				
				<div class="col-md-3">
					<h3>Restaurantes </h3>
				</div>
				<div class="col-md-5"></div>
				<div class="col-md-4">
					<form method="get" action="index.php" id="search">
						<input name="consulta" type="text" size="40" placeholder="Buscar..." />
					</form>
				</div>
			</div>

			<div class="main wow bounceInLeft animated" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;"> 

				<?php 
				
				if(isset($_GET['consulta']) && !is_null($_GET['consulta']) && $_GET['consulta'] != "" )
				{
					
					$sql = "SELECT * FROM `Establecimiento` WHERE `nombre` LIKE '%".$db->proteger($_GET['consulta'])."%';";
					
					$result = $db->ejecutarConsulta($sql);
					if($db->numeroFilas($result) == 0)
						echo '<h3>No hay Restaurantes para mostrar</h3><div class="clearfix"></div>';
					else{
						
						while($fila = $db->obtenerFila($result)){
							$id=$fila[0];
							$nombre=$fila[1];
							$direccion=$fila[2];
							$telefono=$fila[3];
							$descripcion=$fila[4];
							$longitud=$fila[5];
							$latitud=$fila[6];
							$linkImagen=$fila[7];

							echo '<div class="view view-fourth "> <a href="ver.php?id='.$id.'">';
							$a= is_null($linkImagen)? "images/default.jpg" : $linkImagen;
							echo '<img class="img-responsive" src="'.$a.'" />';
							echo '<div class="mask">';
							echo '<h2>'.$nombre.'</h2>';
							echo '<p>'.$descripcion.'.</p>';
							echo '</div>';
							echo '</a></div>';
						}
					}
				}else{
					
					if(!isset($_GET['consulta']) || !isset($_GET['orden'])){
						
						$sql = "SELECT * FROM `Establecimiento`;";
						
						$result = $db->ejecutarConsulta($sql);
						
						if(is_null($result) || $db->numeroFilas($result) == 0)
							echo '<h3>No hay Restaurantes para mostrar</h3><div class="clearfix"></div>';
						else{
							
							while($fila = $db->obtenerFila($result)){
								$id=$fila[0];
								$nombre=$fila[1];
								$direccion=$fila[2];
								$telefono=$fila[3];
								$descripcion=$fila[4];
								$longitud=$fila[5];
								$latitud=$fila[6];
								$linkImagen=$fila[7];

								echo '<div class="view view-fourth "> <a href="ver.php?id='.$id.'">';
								$a= is_null($linkImagen)? "images/default.jpg" : $linkImagen;
								echo '<img class="img-responsive" src="'.$a.'" />';
								echo '<div class="mask">';
								echo '<h2>'.$nombre.'</h2>';
								echo '<p>'.$descripcion.'.</p>';
								echo '</div>';
								echo '</a></div>';
							}
						}
					}
				}



				?>

				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<!-- //MENU -->

<?php include("include/footer.php");