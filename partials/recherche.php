<?php
 include_once('config/database.php');
 if(isset($_POST['submit'])){
    $query = $db->prepare('SELECT titre,auteur,editionLivre 
                        FROM livre 
                        WHERE titre = :titre OR auteur = :auteur OR editionLivre = :editionLivre'); 
    //$req = $query->execute(array());
    while($donnes = $query->fetch()){
        echo htmlentities($donnes['titre']);
        echo htmlentities($donnes['auteur']);
        echo htmlentities($donnes['editionLivre']);
    }
 }
 