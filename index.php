<?php
include('include/database.php');
include('include/user.php');
include('include/gestion.php');
global $db;

session_start();
if (empty($_SESSION)) {
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">


	<title>Accueil Weather Company</title>

	<!-- Loading third party fonts -->
	<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
	<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!-- Loading main css file -->
	<link rel="stylesheet" href="style.css">

	<!--[if lt IE 9]>
		<script src="js/ie-support/html5.js"></script>
		<script src="js/ie-support/respond.js"></script>
		<![endif]-->

</head>

<body>


	<div class="site-content">
		<div class="site-header">
			<div class="container">
				<a href="index.php" class="branding">
					<img src="images/logo.png" alt="" class="logo">
					<div class="logo-type">
						<h1 class="site-title">BTS SN2</h1>
						<small class="site-description">FRESI DELATTRE DANEL</small>
					</div>
				</a>

				<!-- Default snippet for navigation -->
				<div class="main-navigation">
					<button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
					<ul class="menu">
						<li class="menu-item current-menu-item"><a href="index.php">Home</a></li>
					    <li class="menu-item"><a href="connexion.php">Connexion</a></li>
                        <li class="menu-item"><a href="clientPage.php">Client</a></li>
                        <li class="menu-item"><a href="historique.php">Historique</a></li>
						<li class="menu-item"><a href="contact.php">Contact</a></li>
					</ul> <!-- .menu -->
				</div> <!-- .main-navigation -->

				<div class="mobile-navigation"></div>

			</div>
		</div> <!-- .site-header -->

		
			
			<div class="hero" data-bg-image="images/fontAccueil.jpg">
			<div class="container">
			</div>
		</div>

		<div class="prevision">

			<iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/800210"> </iframe>
			<iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/751010"> </iframe>
			<iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/315550"> </iframe>
			<iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/330630"> </iframe>
			<iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/1305551"> </iframe>
			<iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/691230"> </iframe>
			<iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/360240"> </iframe>
			<iframe id="widget_autocomplete_preview"  width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/060880"> </iframe>
			<iframe id="widget_autocomplete_preview"  width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/212310"> </iframe>
			<iframe id="widget_autocomplete_preview"  width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/452340"> </iframe>
			<iframe id="widget_autocomplete_preview"  width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/141180"> </iframe>
			<iframe id="widget_autocomplete_preview"  width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/341720"> </iframe>

		</div>

		</main> <!-- .main-content -->

		<footer class="site-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<form action="#" class="subscribe-form">
							<input type="text" placeholder="Enter your email to subscribe...">
							<input type="submit" value="Subscribe">
						</form>

					</div>
					<div class="col-md-3 col-md-offset-1">
						<div class="social-links">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-google-plus"></i></a>
							<a href="#"><i class="fa fa-pinterest"></i></a>
						</div>
					</div>
				</div>

				<p class="colophon">Copyright 2020 Company Freso. Designed by Rency. All rights reserved</p>
            </div>
        </footer>
    </div>
    
    <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/app.js"></script>
</body>

</html>