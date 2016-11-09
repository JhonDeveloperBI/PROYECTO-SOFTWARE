<?php
if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	header("Location:index.php");
}else{
	require("include/BaseDatos.php");
	require("include/config.php");
	$sql = "SELECT * FROM `Establecimiento` WHERE `idEstablecimiento` =".$_GET['id'].";";
	$result = $db->ejecutarConsulta($sql);
	if($db->numeroFilas($result) != 1){
		header("Location:index.php");
	}else{
		$fila = $db->obtenerFila($result);
		$id=$fila[0];
		$nombre=$fila[1];
		$direccion=$fila[2];
		$telefono=$fila[3];
		$descripcion=$fila[4];
		$longitud=$fila[5];
		$latitud=$fila[6];
		$linkImagen=$fila[7];
		$image= is_null($linkImagen)? "images/default.jpg" : $linkImagen;


		include("include/head.php");
		?>
		<div class="content">
			<div class="row" style="margin-top: 30px;">
				<div align="center">
					<div class="clear"></div>
					<h3><?php echo $nombre; ?></h3>
					<div class="clear"></div>
				</div>
				<div class="col-md-4" align="center"><img class= "img-responsive" src="<?php echo $image; ?>"></div>
				<div class="col-md-8">
					<table class="table table-responsive table-hover" >
						<tr>
							<th colspan="2"><p><?php echo $descripcion;?></p></th>
						</tr>
						<tr>
							<th>Direccion</th>
							<td><?php echo $direccion ;?></td>
						</tr>

						<tr>
							<th>Telefono</th>
							<td><?php echo $telefono ;?></td>
						</tr>
						<tr>
							<th>Calificacion</th>
							<td><?php
								$sql = "SELECT AVG(`Calificacion`.`estrellas`), COUNT(`Calificacion`.`estrellas`) FROM `Calificacion` INNER JOIN `Establecimiento` ON `Establecimiento`.`idEstablecimiento` = `Calificacion`.`Establecimiento_idEstablecimiento` WHERE `Establecimiento`.`idEstablecimiento` = ".$id.";";
								$result = $db->ejecutarConsulta($sql);
								$fila = $db->obtenerFila($result);
								$calificacion = round($fila[0]);
								
								for ($i=0; $i < $calificacion; $i++) { 
									echo"&#9733;";
								}


								echo " (".$fila[1]." votos)" ;?>

							</td>
						</tr>

						<!-- empieza -->
						<?php if(isset($_SESSION['logged']) && $_SESSION['logged'] == true){ ?>
						<form method="POST" action="comentar.php?id=<?php echo $id;?>">
							<tr>
								<th>Comentar:</th>
								<td>
									<textarea cols="40" rows="3" name="comentario" maxlength="140" placeholder="Cuentanos como te parece este sitio"></textarea>	
								</td>
							</tr>	
							<tr>
								<td>
									<input type="submit" value="Comentar">
								</td>
								
								<td>
									<span id="rate">Calificar</span>
									<div class="ec-stars-wrapper" >
										<a href="votar.php?rate=1&id=<?php echo $id; ?>" data-value="1" title="Votar con 1 estrellas">&#9733;</a>
										<a href="votar.php?rate=2&id=<?php echo $id; ?>" data-value="2" title="Votar con 2 estrellas">&#9733;</a>
										<a href="votar.php?rate=3&id=<?php echo $id; ?>" data-value="3" title="Votar con 3 estrellas">&#9733;</a>
										<a href="votar.php?rate=4&id=<?php echo $id; ?>" data-value="4" title="Votar con 4 estrellas">&#9733;</a>
										<a href="votar.php?rate=5&id=<?php echo $id; ?>" data-value="5" title="Votar con 5 estrellas">&#9733;</a>
									</div>
									<noscript>Necesitas tener habilitado javascript para poder votar</noscript>
								</td>
								
							</tr>
						</form>
						<?php  } ?>
						<hr width=50% align="center" >
						<tr>
							<th colspan="2" style="background-color: #ccc" >Comentarios</th>
						</tr>
						<?php
						$comandosql="SELECT `Usuario`.`nombre`, `Calificacion`.`comentario` FROM `Calificacion` INNER JOIN `Establecimiento` ON `Calificacion`.`Establecimiento_idEstablecimiento` = `Establecimiento`.`idEstablecimiento` INNER JOIN `Usuario` ON `Calificacion`.`Usuario_idUsuario` = `Usuario`.idUsuario WHERE `Establecimiento`.`idEstablecimiento` = ".$id." AND `Calificacion`.`comentario` IS NOT NULL;";
						$resultado= $db->ejecutarConsulta($comandosql);
						while ($fila=$db->obtenerFila($resultado))
						{
							echo '
							<tr>
								<th width="20%">'.$fila[0].'</th>
								<td width="80%">'.$fila[1].'</td>
							</tr>
							';
						}
						?>

					</table>
					<!-- termina -->
				</div>
			</div>

		</div>

	</div>
	<?php
	include("include/footer.php");
}
} ?>
