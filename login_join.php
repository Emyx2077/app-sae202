<?php require 'lib/lib.inc.php';

$teamId=$_POST['codeEquipe'];
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$password=$_POST['password'];

$co = connexion();

$req3='INSERT INTO user (userNom, userPrenom, userTeamId, userPassword)
        VALUES ("'.$nom.'", "'.$prenom.'", "'.$teamId.'", "'.$password.'")';

try {
    $resultat3=$co->query($req3); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}