<?php 

require("bdd/bddconfig.php");


// $nom =  htmlspecialchars($_POST['nom_bassin']);
// $descrip = htmlspecialchars($_POST['description']);
// $ref = htmlspecialchars($_POST['id_ref']);


try {

  $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8",$bddlogin, $bddpass);
  $objBdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  // METHOD SIMPLE

  // $bassins = $objBdd -> prepare("INSERT INTO `bassin` (`nom`, `description`, `refCapteur`) VALUES ('$nom', '$descrip', '$ref')");
  // $bassins->execute();

  $req = $objBdd->prepare("INSERT INTO `bassin` (`nom`, `description`, `refCapteur`) VALUES (:nom, :descrip, :ref)");
  $req->execute(array(
      'nom' => htmlspecialchars($_POST['nom_bassin']),
      'descrip' => htmlspecialchars($_POST['description']),
      'ref' => htmlspecialchars($_POST['id_ref']),
  ));


  $serveur = $_SERVER['HTTP_HOST'];
  $chemin = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  $page = 'bassins.php';
  header("Location: http://$serveur$chemin/$page");

  echo $objBdd->lastInsertId();


} catch (Exception $prmE) {
  die('Erreur : ' . $prmE->getMessage());
}


?>