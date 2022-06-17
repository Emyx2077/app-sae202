<?php require 'lib/lib.inc.php';

$imposteur=sanitize($_POST['imposteur']);

$co=connexion();

$req = 'SELECT * from teams WHERE teamCode="'.$teamCode.'";';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$ligne=$resultat->rowCount();

if ($ligne == 0){
    $_SESSION['erreur'] = "Le code de la team est invalide";
    header('location:join_team.php');
    die();
}

$resultat = $resultat->fetch(PDO::FETCH_ASSOC);