<?php 

require("bdd/bddconfig.php");

$nomBassin = "inconnu";
$idBassin = 0;

$idok = isset($_GET["idBassin"]);
$nomok = isset($_GET["nomBassin"]);

if (($idok == true) &&($nomok == true) ){
    $nomBassin = htmlspecialchars($_GET["nomBassin"]);
    $idBassin = intval(htmlspecialchars($_GET["idBassin"]));
} 

// $idBassin = intval($_GET["idBassin"]);


$objBdd = new PDO("mysql:host=$bddserver;dbname=$bddname;charset=utf8",$bddlogin, $bddpass);

$listetemp = $objBdd->prepare("SELECT * FROM temperature WHERE idBassin = :id ORDER BY date DESC");
$listetemp->bindParam(':id', $idBassin, PDO::PARAM_INT);
$listetemp->execute();

?>

<?php $titre = "La truite arc-en-ciel";?>
<?php ob_start(); ?>
<article>     

    <h1>La température du  <?php echo $_GET['nomBassin']  ?></h1>
        
    <?php echo "idBassin = ". $_GET['idBassin']  ?> 


        <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Température (°C)</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($listetemp as $temp){ ?>
                <tr>
                    <td><?php echo $temp['date']; ?></td>
                    <td><?php echo $temp['temp']; ?></td>
                </tr>
            <?php 
            } 
            $listetemp->closeCursor();
            ?>
        
        </tbody>
    </table>


       
</article>
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit/template.php'; ?>