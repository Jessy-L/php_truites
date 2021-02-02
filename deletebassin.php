<?php

require("bdd/bddconfig.php");

$id_supp = htmlspecialchars($_POST['idbassin']);

try {
  
  $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8",$bddlogin, $bddpass);
  $objBdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  // $req = $objBdd -> query("DELETE FROM `bassin` WHERE `idBassin` = id_supp");


  $req = $objBdd -> prepare("DELETE FROM `temperature` WHERE `idBassin` = :id");
  $req -> bindParam(':id', $id_supp, PDO::PARAM_INT);
  $req -> execute();

  $req = $objBdd -> prepare("DELETE FROM `bassin` WHERE `idBassin` = :id");
  $req -> bindParam(':id', $id_supp, PDO::PARAM_INT);
  $req -> execute();


  $serveur = $_SERVER['HTTP_HOST'];
  $chemin = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $page = 'bassins.php';
  header("Location: http://$serveur$chemin/$page");

 
 } catch (Exception $prmE) {
  die('Erreur : ' . $prmE->getMessage());
 }
