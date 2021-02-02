<?php 


session_start();

//détruire la session courante
session_destroy();

/* Redirige vers la page d'accueil */

// Redirige vers la page d'accueil (ou login.php) si pas authentifié
$serveur = $_SERVER['HTTP_HOST'];
$chemin = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), '/\\');
$page = 'index.php';
header("Location: http://$serveur$chemin/$page");
