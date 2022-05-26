<?php require 'lib/lib.inc.php';

$nomTeam =$_POST['nomTeam'];
$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$password=$_POST['password'];

$co=connexion();

$req1='INSERT INTO team (teamNom, teamLvl)
        VALUES ("'.$nomTeam.'", "0")';

try {
    $resultat=$co->query($req1); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}



$req2='SELECT teamId FROM team WHERE teamNom="'.$nomTeam.'";';

try {
    $resultat2=$co->query($req2); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$teamId=$resultat2->fetch(PDO::FETCH_ASSOC);
$teamId = implode("", $teamId);



$req3='INSERT INTO user (userNom, userPrenom, userTeamId, userPassword)
        VALUES ("'.$nom.'", "'.$prenom.'", "'.$teamId.'", "'.$password.'")';

try {
    $resultat3=$co->query($req3); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$_SESSION['teamId']= $teamId;

header('location:board.php');