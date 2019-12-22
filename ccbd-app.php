<?php
include('server.php');
?>

<!DOCTYPE html>

<html lang="en">

<head>
	<title>GreenSim | Home</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link href="style.css" rel="stylesheet" type="text/css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#myPage">GreenSim</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#about">About</a></li>
					<li><a href="#services">Services</a></li>
					<li><a href="#greensimtool">GreenSim Tool</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="jumbotron text-center">
		<h1>GreenSim</h1>
		<p>We specialize in Cloud Sim</p>
	</div>

	<!-- Container (About Section) -->
	<div id="about" class="container-fluid">
		<div class="row">
			<div class="col-sm-8">
				<h2>About GreenSim</h2><br>
				<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
					et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
					aliquip ex ea commodo consequat.</h4><br>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
					et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
					aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
					officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor
					incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
					ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<br><button class="btn btn-default btn-lg">Get in Touch</button>
			</div>
			<div class="col-sm-4" style="text-align:center">
				<span class="glyphicon glyphicon-globe logo slideanim" style="color: green;"></span>
			</div>
		</div>
	</div>


	<!-- Container (Services Section) -->
	<div id="services" class="container-fluid text-center bg-grey">
		<h2>SERVICES</h2>
		<h4>What we offer</h4>
		<br>
		<div class="row slideanim">
			<div class="col-sm-4">
				<span class="glyphicon glyphicon-off logo-small" style="color: #009945"></span>
				<h4>Green</h4>
				<p>Lorem ipsum dolor sit amet..</p>
			</div>
			<div class="col-sm-4">
				<span class="glyphicon glyphicon-leaf logo-small" style="color: #009945"></span>
				<h4>Sim</h4>
				<p>Lorem ipsum dolor sit amet..</p>
			</div>
			<div class="col-sm-4">
				<span class="glyphicon glyphicon-lock logo-small" style="color: #009945"></span>
				<h4>GreenSim</h4>
				<p>Lorem ipsum dolor sit amet..</p>
			</div>
		</div>
		<br><br>
	</div>

	<!-- Container (GreenSim Tool Section) -->
	<div id="greensimtool" class="container-fluid text-center">
		<h2>GreenSim Tool</h2>
		<div class="row text-center slideanim">
			<div class="col-sm-4 ">
				<form action="ccbd-app.php#greensimtool" method="POST" enctype="multipart/form-data" style="text-align:left;padding:15px;">

					<div class="form-group">
						<label for="file1">File1 : Application</label>
						<input type="file" class="form-control" name="file1">
					</div>
					<hr />
					<div class="form-group">
						<label for="file2">File 2 : .conf</label>
						<input type="file" class="form-control" name="files[]" multiple>
					</div>
					<hr />
					<div class="form-group">
						<label style="font-size:20px" for="foldername">Enter folder name:</label>
						<input id="foldername" type="text" class="form-control" name="foldername">
						<hr />
						<label for="file3">File 3 : workload </label><br>
						<input id="file3" type="file" class="form-control" webkitdirectory="" directory="" name="file3">
					</div>

					<button type="submit" id="submit-btn" name="submit">Submit</button>

				</form>
			</div>

			<div class="col-sm-8" style="padding-top:8px;">

				<ul class="nav nav-tabs nav2">
					<li class="nav-item">
						<a class="nav-link active" id='console'>Console</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Conf</a>
						<div class="dropdown-menu">
							<?php
								if(isset($conf)){
									echo var_dump($conf);
									$conf_arr = explode(",",$conf);
									$conf_arr = array_slice($conf_arr,1,-1);
									echo var_dump($conf_arr);
									for($i=1;$i<count($conf_arr)-1;$i++){
										echo "<a class='dropdown-item' id='conf".$i."'>Conf".$i."</a><br>";
									}
								}
							?>
						</div>
					</li>
				</ul>

				<div class="output console">

					<?php
						if(isset($file1)){
							echo "<pre style=\"background-color:#000; color:#c3c3c3;\">";
							echo nl2br($file1);
							echo "</pre>";
						}
					?>

				</div>

				<?php
					for($i=1; $i < count($conf_arr)-1; $i++){		
				?>		
					<div class="output console" id="<?php echo 'conf'.'$i'?>">
					
						<?php
							if(isset($conf_arr[$i])){
								echo "<pre style=\"background-color:#000; color:#c3c3c3;\">";
								$c = file_get_contents($conf_arr[$i]);
								echo "$c";
								echo "</pre>";
							}
						?>

					</div>
				<?php
					}
				?>

			</div>

		</div>

	</div>

	<!-- Container (Contact Section) -->
	<div id="contact" class="container-fluid text-center bg-grey">
		<h2 class="text-center">Contact</h2>
		<div class="row">
			<div class="col-sm-12">
				<p>Contact us and we'll get back to you within 24 hours.</p>
				<p><span class="glyphicon glyphicon-map-marker"></span> Bangalore, India</p>
				<p><span class="glyphicon glyphicon-phone"></span> +91-9900887766</p>
				<p><span class="glyphicon glyphicon-envelope"></span> chandan@gmail.com</p>
			</div>
		</div>
	</div>

	<footer class="container-fluid text-center page-footer font-small">
		<a href="#myPage" title="To Top">
			<span class="glyphicon glyphicon-chevron-up"></span>
		</a>
		<br />
		<div class="footer-copyright text-center py-3">© 2019 Copyright:
			<a href="#"><strong>GreenSim</strong></a>
		</div>
	</footer>

	<script>
		$(document).ready(function() {
			// Add smooth scrolling to all links in navbar + footer link
			$(".navbar a, footer a[href='#myPage']").on('click', function(event) {
				// Make sure this.hash has a value before overriding default behavior
				if (this.hash !== "") {
					// Prevent default anchor click behavior
					event.preventDefault();

					// Store hash
					var hash = this.hash;

					// Using jQuery's animate() method to add smooth page scroll
					// The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
					$('html, body').animate({
						scrollTop: $(hash).offset().top
					}, 900, function() {

						// Add hash (#) to URL when done scrolling (default click behavior)
						window.location.hash = hash;
					});
				} // End if
			});

			$(window).scroll(function() {
				$(".slideanim").each(function() {
					var pos = $(this).offset().top;

					var winTop = $(window).scrollTop();
					if (pos < winTop + 600) {
						$(this).addClass("slide");
					}
				});
			});
		})
		<?php

		?>
		$('#console').click(function() {
			
		});

		$(document).ready(function() {
			$('.output').html('Upload Files first');
		});
	</script>
</body>

</html>