<?php 
    
    if(isset($_COOKIE["auth"]) && !isset($_SESSION["connect"])) {

        // Connexion à la bdd
        require_once("connection.php");

        // Variable 
        $secret = htmlspecialchars($_COOKIE["auth"]);

        // Le secret existe-il ?
        $req = $bdd->prepare("SELECT COUNT(*) AS secretNumber FROM user WHERE secret =?");
        $req->execute([$secret]);

        while($user = $req->fetch()) {

            if($user["secretNumber"] == 1) {

                // Lire tout ce qui concerne l'utilisateur
                $informations = $bdd->prepare("SELECT * FROM user WHERE secret = ?");
                $informations->execute([$secret]);

                while($userInformations = $informations->fetch()) {

                    $_SESSION["connect"] = 1;
				    $_SESSION["email"]   = $userInformations["email"];

                }

            }
        }
    }