<?php $titre = "Les bassins"; ?>

<?php 

require("bdd/bddconfig.php");

try {
    $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8",$bddlogin, $bddpass);
    
    $objBdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $bassins = $objBdd -> query("SELECT * FROM `bassin`");


   
   } catch (Exception $prmE) {
    die('Erreur : ' . $prmE->getMessage());
   }
?>

<?php ob_start(); ?>
<article>
    <h1>Les bassins</h1>
    

    
   <?php
    while($listebassin = $bassins->fetch()){
   ?>

    <h2> <?php echo $listebassin['nom']?> </h2>
    <img src="images/<?php echo $listebassin['photo'];?>">
    <p> <?php echo $listebassin['description'];?> </p>
    
    <?php 
        $idbassin = $listebassin['idBassin'];
        $nom =  $listebassin['nom'];
        
    ?>

    <a href=" <?php echo "temperatures.php?idBassin=$idbassin&nomBassin=$nom" ?>">Voir les temperatures</a>

   <?php
   }
   $bassins->closeCursor()
   ?>


</article>
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit/template.php'; ?>