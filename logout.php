<?php 
    session_start();    // Initialiser la session
    session_unset();    // Désactiver la session
    session_destroy();  // Détruir la session

    setcookie("auth", "", time() - 1);

    header("location: index.php");
    exit();