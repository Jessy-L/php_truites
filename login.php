<?php $titre = "LOGIN"; ?>


<?php ob_start(); ?>
<article>
    <h1>LOGIN</h1>
    
    <form method="POST" action="login_action.php">
        <input type="text" name="login" placeholder="Saisissez votre login..." required><br><br>
        <input type="password" name="password" placeholder="Mot de passe" required><br><br>
        <input type="submit" value="Se connecter"><br><br>
    </form>

</article>
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit/template.php'; ?>