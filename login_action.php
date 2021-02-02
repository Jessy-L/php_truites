<?php 
session_start();

require('bdd/bddconfig.php');

//Tester si les variables POST existent
$paramOK = false;
if (isset($_POST["login"])) {
    $login = strtolower(htmlspecialchars($_POST["login"]));
    if (isset($_POST["password"])) {
        $password = htmlspecialchars($_POST["password"]);
        $paramOK = true;
    }
}

//si login et password sont bien reçus
if ($paramOK == true) {

    //vérifier si le login passord est correct (base de données) : voir après
    $PDOlistlogins = $objBdd->prepare("SELECT * FROM userweb WHERE login = :login ");
    $PDOlistlogins->bindParam(':login', $login, PDO::PARAM_STR);
    $PDOlistlogins->execute();
    //S'il y a un résultat à la requête 
    $row_userweb = $PDOlistlogins->fetch();
    if ($row_userweb != false) {
        //il existe un login identique dans la base

        // vérif du password :
        if (password_verify($password, $row_userweb['password'])) {
            //authentification réussie
            //création de la variable de session : 

            $session_data = array(
                'id' => $row_userweb['id'],
                'login' => $row_userweb['login'],
                'nom' => $row_userweb['nom'],
                'prenom' => $row_userweb['prenom']
            );
            //régénérer le session id
            session_regenerate_id();
            //enregistrer les données dans une variable de session
            $_SESSION['logged_in'] = $session_data;
            $PDOlistlogins->closeCursor();

            $_SESSION['logged-in']['login'] = $login;

            $serveur = $_SERVER['HTTP_HOST'];
            $chemin = rtrim(dirname(htmlspecialchars($_SERVER['PHP_SELF'])), '/\\');
            $page = 'index.php';
            header("Location: http://$serveur$chemin/$page");
       
        }else {
            //Mauvais password
            session_destroy();
            die('Authentification incorrecte');
        }
    } else {
        //Mauvais login
        session_destroy();
        die('Authentification incorrecte');
    }
} else {
    die('Vous devez fournir un login et un mot de passe');
}
?>