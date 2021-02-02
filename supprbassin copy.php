<?php 

require("bdd/bddconfig.php");


if(!isset($_POST["idbassin"])){

    $objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8",$bddlogin, $bddpass);
    $objBdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    $req = $objBdd->query("SELECT * FROM `bassin`");
    
    

}else{
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
}
?>

// $idBassin = intval($_GET["idBassin"]);


<?php $titre = "La truite arc-en-ciel";?>
<?php ob_start(); ?>
 
<article>     

    <h1>liste bassin</h1>
        


        <table>
          <thead>
              <tr>
                  <th>Bassin</th>
              </tr>
          </thead>
        <tbody>

            <?php foreach($req as $bassin){ ?>
                <tr>
                  <form method="POST" action="deletebassin.php">
                      <td><?php echo $bassin['nom']; ?></td>
                      <td> <input type="submit" value="Supprimer"></td>
                      <input type="hidden" name="idbassin" value="<?php echo $bassin['idBassin']  ?>">
                  </form>
                </tr>
            <?php 
            } 
            $req->closeCursor();
            ?>
        
        </tbody>
    </table>


       
</article>
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit/template.php'; ?>