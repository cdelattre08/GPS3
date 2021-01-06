<?php include('include/user.php');?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>page connexion</title>

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
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
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
                    <li class="menu-item"><a href="index.php">Home</a></li>
                    <li class="menu-item current-menu-item"><a href="connexion.php">Connexion</a></li>
                    <li class="menu-item"><a href="clientPage.php">Client</a></li>
                    <li class="menu-item"><a href="historique.php">Historique</a></li>
                    <li class="menu-item"><a href="contact.php">Contact</a></li>
                </ul> <!-- .menu -->
            </div> <!-- .main-navigation -->

            <div class="mobile-navigation"></div>

        </div>
    </div> <!-- .site-header -->
    <!-- Header End -->
    <?php
        $user = new user($db);
        
        // Si la fonction "deco" est utilisé, la session est détruite.
        if (isset($_POST['deco'])) 
        {
            session_unset();
            session_destroy();
        }
        
        // Si la fonction "valid" est utilisé,
        if (isset($_POST['valid'])) 
        {
            if (!empty($_POST['user']) && !empty($_POST['pass']))
            {
                $user->Connexion($_POST['user'], $_POST['pass']);
                $connexion = $user->verifUser($_POST['user'], $_POST['pass']);
                if ($connexion) 
                {
                    session_start();
                    $_SESSION['user'] = $user->getLogin();
                    $_SESSION['nom'] = $user->getNom();
                    $_SESSION['prenom'] = $user->getPrenom();
                    $_SESSION['admin'] = $user->getAdmin();
    
                    echo  "Vous etes Connecte !";
                }
            }
            else
            {
                echo "Veuillez remplir les champs";
            }
        }
        //  Si la fonction "inscrip" est utilisé :
        if (isset($_POST['inscrip'])) 
        {
            // On vérifie si tous les champs sont remplis, sinon on quitte le programme.
            if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['user']) && !empty($_POST['pass'])) // Vérifie si l'utilisateur a bien rempli tous les champs dans le formulaire
            {   
                $user->newUser($_POST['user'], $_POST['pass'], $_POST['nom'], $_POST['prenom']); 
                echo "Vous etes bien inscrit";
            } 
            else 
            {
                echo "Veuillez remplir les champs";
            }
        }
    ?>

        <div class="row">
            <div class="inscription">
                
                <p>Inscription</p>
                <form action="" method="post" class="subscribe-form">
                    <input type="text" name="nom" placeholder="Nom">
                    <input type="text" name="prenom" placeholder="Prenom">
                    <input type="text" name="user" placeholder="login">
                    <input type="password" name="pass" placeholder="password">
                    <input type="submit" name="inscrip" value="Inscription">
                </form>
            </div>
            <div class="connexion">
                
                <p>Connexion</p>
                <form action="" method="post" class="subscribe-form">
                    <input type="text" name="user" placeholder="login">
                    <input type="password" name="pass" placeholder="password">
                    <input type="submit" name="valid" value="Connexion">
                </form>
        
            </div>
        </div>

        <!-- Footer Section Begin -->
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
        <!-- Footer Section End -->

        <!-- Search model Begin -->
        <div class="search-model">
            <div class="h-100 d-flex align-items-center justify-content-center">
                <div class="search-close-switch"><i class="icon_close"></i></div>
            </div>
        </div>
</body>

</html>