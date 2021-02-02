<?php $titre = "Ajouter bassin"; ?>

<?php 

session_start();

session_destroy();


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
    

    <form method="POST" action="insertbassin.php">
    
        <input type="text" name="nom_bassin" required> <br>
        <textarea name="description" id="description" cols="30" rows="10" required></textarea><br>
        <input type="text" name="id_ref" required><br>

        <input type="submit" value="Envoyer">
    </form>

</article>
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit/template.php'; ?>