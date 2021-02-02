<?php 

require("bdd/bddconfig.php");


// $idBassin = intval($_GET["idBassin"]);

$objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8",$bddlogin, $bddpass);
$objBdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$req = $objBdd->query("SELECT * FROM `bassin`");

?>

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