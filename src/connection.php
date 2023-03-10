<?php 

try {
    $bdd = new PDO("mysql:host=localhost;dbname=formation_netflix;charset=utf8", "root", "");
}
catch(Exception $é) {
    die("Erreur : ".$e->getMessage());
}