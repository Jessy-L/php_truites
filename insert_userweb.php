<?php
/****petit code pour enregistrer dans la base des logins avec le mot de passe enregistré hashé ****/
session_start();

//donnée à insérer
$login = strtolower('admin'); // conv tout en min 
$password_clair = 'admin';
$nom = 'admin'; 
$prenom = 'admin';

//hashage du mot de passe
$hash_password = password_hash($password_clair, PASSWORD_BCRYPT);

//Connexion à la base et insertion du nouvel utilisateur
require 'bdd/bddconfig.php';
try {
    $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8", $bddlogin, $bddpass);
    $objBdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $PDOinsertuserweb = $objBdd->prepare("INSERT INTO userweb (login, password, nom, prenom) VALUES (:login, :password, :nom, :prenom)");
        $PDOinsertuserweb->bindParam(':login', $login, PDO::PARAM_STR);
        $PDOinsertuserweb->bindParam(':password', $hash_password, PDO::PARAM_STR);
        $PDOinsertuserweb->bindParam(':nom', $nom, PDO::PARAM_STR);
        $PDOinsertuserweb->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $PDOinsertuserweb->execute();
        //récupérer la valeur de l'ID du nouveau bassin créé
        echo $lastId = $objBdd->lastInsertId();


} catch (Exception $prmE) {
    die('Erreur : ' . $prmE->getMessage());
}