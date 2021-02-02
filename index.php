<?php 

session_start();
$titre = "La pisciculture des BTS SN";
ob_start(); 

?>
<article>                
    <h1>Présentation pour <?php echo $_SESSION['logged_in']['login']; ?></h1>
    <p>
        <img src="images/truite2.jpg" alt="Une truite" class="imgfloat" />
    </p>
    <p>
        La pisciculture des BTS SN est un site d’élevage de truites.<br />
        L’exploitation est située à Armentières. Le site est spécialisé dans 
        la production de <strong>caviar de truite</strong> et de la grande 
        truite destinée à la <em>fumaison</em>.</p>
    <p> Mixtam campos humanas obstabatque ad tumescere regat vesper aer vultus occiduo 
        quoque solidumque super ambitae quod praeter animalibus nabataeaque 
        caelum hunc liquidum iunctarum lacusque adsiduis caeleste praecipites 
        neu ambitae corpore inter suis congestaque congeriem congeriem supplex 
        sua tumescere pondere terris fuerat terrenae seductaque cetera regio umor 
        dei tuti perveniunt prima securae coegit stagna poena evolvit conversa 
        innabilis regio fecit forma bracchia volucres cepit permisit mutastis 
        sectamque terris fuerat terrenae seductaque cetera regio umor dei tuti 
        perveniunt
        Mixtam campos humanas obstabatque ad tumescere regat vesper aer vultus occiduo 
        quoque solidumque super ambitae quod praeter animalibus nabataeaque 
        caelum hunc liquidum iunctarum lacusque adsiduis caeleste praecipites 
        neu ambitae corpore inter suis congestaque congeriem congeriem supplex 
        sua tumescere pondere terris fuerat terrenae seductaque cetera regio umor 
        dei tuti perveniunt prima securae coegit stagna poena evolvit conversa 
        innabilis regio fecit forma bracchia volucres cepit permisit mutastis 
        sectamque terris fuerat terrenae seductaque cetera regio umor dei tuti 
        perveniunt
    </p>
</article>
<article>                
    <h1>La qualité de l'eau</h1>
    <p>
        <img src="images/pisci1.jpg" alt="Pisciculture" class="imgfloat" />
    </p>
    <p>
        La pisciculture est alimentée par une rivière dont elle en prélève 400L/s. 
        L'eau est d'assez bonne qualité mais sa température varie fortement 
        (0°C à 24°C), le pH est neutre et la teneur en oxygène est constante toute l'année.<br/>
        Sur la rivière, un barrage équipé d’une vanne et d’une passe à poissons migrateurs, 
        permet de dériver l’eau vers un canal. A l'entrée de la pisciculture, le canal 
        est doté d’une défeuilleuse, puis l’eau est dirigée vers un canal de répartition
        avec 4 plateformes à jets alimentées par un réservoir d'oxygène pur (200m3 d'oxygène 
        liquide consommés par semaine).<br/>
        Mixtam campos humanas obstabatque ad tumescere regat vesper aer vultus occiduo 
        quoque solidumque super ambitae quod praeter animalibus nabataeaque 
        caelum hunc liquidum iunctarum lacusque adsiduis caeleste praecipites 
        neu ambitae corpore inter suis congestaque congeriem congeriem supplex 
        sua tumescere pondere terris fuerat terrenae seductaque cetera regio umor 
        dei tuti perveniunt prima securae coegit stagna poena evolvit conversa 
        innabilis regio fecit forma bracchia volucres cepit permisit mutastis 
        sectamque terris fuerat terrenae seductaque cetera regio umor dei tuti 
        perveniunt
    </p>
</article>
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit/template.php'; ?>