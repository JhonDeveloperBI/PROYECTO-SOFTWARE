<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Fasty</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Fasty" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet"> 
	<link href='http://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Sigmar+One' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700italic,700,400italic,300italic,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/swipebox.css">
	<!-- //font -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
	<link href="css/style5.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style4.css" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/SmoothScroll.min.js"></script>
	<script src="js/jquery-1.8.3.min.js"></script>
	<script src="js/scripts.js" type="text/javascript"></script>
	<!-- start-smoth-scrolling-->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
	<!---End-smoth-scrolling-->
	<!--- Light Box -->
	<script src="js/jquery.swipebox.min.js"></script> 
	<script type="text/javascript">
		jQuery(function($) {
			$(".swipebox").swipebox();
		});
	</script>
	<!--  Eng Light Box -->	
	<script src="js/responsiveslides.min.js"></script>
	<script>
		$(function () {
			$("#slider").responsiveSlides({
				auto: true,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				pager: true,
			});
		});
	</script>
	<script type="text/javascript">
		// Don't use this code on your site
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-7243260-2']);
		_gaq.push(['_trackPageview']);

		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	<!--Animation-->
	<script src="js/wow.min.js"></script>
	<link href="css/animate.css" rel='stylesheet' type='text/css' />
	<script>
		new WOW().init();
	</script>
	<!---/End-Animation -->
</head>
<body>
	<script src="js/jquery.vide.min.js"></script>
	<div data-vide-bg="video/cook">
		<!-- banner -->
		<div class="banner">
			<div class="container">
				<div class="header">
					<div class="logo">
						<h1><a href="index.php">Fasty</a></h1>
					</div>
					<div class="top-nav">
						<nav class="navbar navbar-default">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu						
							</button>
							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav">
									<?php 
									if (isset($_SESSION['logged'])  && $_SESSION['logged'] == true){
										echo '<li><a class="active" href="#" >'.$_SESSION['nombre'].'</a></li>';
										echo '<li><a href="logout.php">LogOut</a></li>';

									}else{
										echo '<li><a href="register.php" >REGISTRARSE</a></li>';
										echo '<li><a href="login.php">INGRESAR</a></li>';
									}
									?>

									<div class="clearfix"> </div>
								</ul>	
							</div>	
						</nav>		
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="banner-info">
					<h2>Un restaurante en cualquier lugar</h2>
					<p>Fasty es una aplicacion que te permite buscar restaurantes que esten cerca al lugar donde estás</p>
				</div>
				<div class="banner-grads">
					<div class="col-md-4 banner-grad">
						<div class="banner-grad-img">
							<img src="images/b1.jpg" alt="" />
							<h4>GPS</h4>
						</div>
					</div>
					<div class="col-md-4 banner-grad">
						<div class="banner-grad-img">
							<img src="images/b2.jpg" alt="" />
							<h4>CALIFICACIÓN</h4>
						</div>
					</div>
					<div class="col-md-4 banner-grad">
						<div class="banner-grad-img">
							<img src="images/b3.jpg" alt="" />
							<h4>COMENTARIOS</h4>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //banner -->
	</div>