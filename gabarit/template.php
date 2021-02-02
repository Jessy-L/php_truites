 <?php 

session_start();
// // Accès seulement si authentifié 
// if (isset($_SESSION['logged_in']['login']) == TRUE) {
//     // Redirige vers la page d'accueil (ou login.php) si pas authentifié
//     $serveur = $_SERVER['HTTP_HOST'];
//     $chemin = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), '/\\');
//     $page = 'index.php';
//     header("Location: http://$serveur$chemin/$page");
// }


?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $titre; ?></title>
        <link rel="stylesheet" href="css/styles.css" />
    </head>

    <body>
        <div id="conteneur">
            <header>
                <h1>La pisciculture PHP</h1>
            </header>

            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="bassins.php">Les bassins</a></li>
                    <li><a href="arcenciel.php">La truite arc-en-ciel</a></li>
                    <li><a href="ajoutbassin.php">Ajout de bassin</a></li>
                    <li><a href="supprbassin.php">supp de bassin</a></li>
                </ul>
            </nav>
            <section>
            
            <?php echo $contenu ; ?>

            </section>

            <footer>
                <p>Copyright TruitesPHP - Tous droits réservés - 
                    <a href="#">Contact</a>    
                </p>
            </footer>
        </div>    
    </body>
</html>