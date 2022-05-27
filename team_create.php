<?php require 'lib/lib.inc.php';

$teamNom=$_POST['teamNom'];

$co=connexion();


$teamCode = "h234s";
//create team
$req='INSERT INTO teams (teamNom, teamLvl, teamNbPlayers, teamCode)
        VALUES ("'.$teamNom.'", "0", "1", "'.$teamCode.'");';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$_SESSION['teamCode']= $teamCode;

header('location:board.php');
