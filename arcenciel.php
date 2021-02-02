<?php $titre = "La truite arc-en-ciel";?>
<?php ob_start(); ?>
<article>     
        <h1>La truite arc-en-ciel</h1>
        <figure>
            <img src="images/truite-arc-en-ciel.jpg" alt="Bassins du Hem" />
            <figcaption>Oncorhynchus mykiss</figcaption>
        </figure>        
        <p>La truite arc-en-ciel (Oncorhynchus mykiss) est un salmonidé 
            originaire du sous-continent nord-américain où il est commun, 
            mais se trouvant également en Europe et en Amérique du Sud, 
            où il a été introduit.</p>
        <ul>
            <li>Longueur maximale observée : 120 cm pour le mâle</li>
            <li>Poids maximum observé : 25 kg</li>
            <li>Longévité maximale observée : 11 ans</li>
        </ul>
        <p>La truite peut se reproduire à partir de deux ou trois ans. 
            Elle se reproduit de novembre à janvier dans 
            une eau entre 5 et 12 °C.</p>
</article>
<?php $contenu = ob_get_clean(); ?>
<?php require 'gabarit/template.php'; ?>