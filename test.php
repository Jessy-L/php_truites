<?php 

// activer l'utilisation des variables de session
session_start();
session_regenerate_id();


// déclare les variables de session
$_SESSION['logged_in']['pseudo'] = 'Toto';
$_SESSION['logged_in']['nom'] = "senryaku";



// détruit les données de la  la session
// session_destroy();
