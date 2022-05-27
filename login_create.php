<?php require 'lib/lib.inc.php';

$prenom=$_POST['prenom'];
$nom=$_POST['nom'];
$password=$_POST['password'];

$co=connexion();


//create new user
$req='INSERT INTO users (userPrenom, userNom, userTeamId, userPassword)
        VALUES ("'.$prenom.'", "'.$nom.'", "0", "'.$password.'");';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}


//get freshly created user id from DB
$req2='SELECT userId FROM users WHERE userPrenom="'.$prenom.'" AND userNom="'.$nom.'";';

try {
    $resultat2=$co->query($req2); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$userId=$resultat2->fetch(PDO::FETCH_ASSOC);
$userId=implode("", $userId);

$_SESSION['userId']= $userId;

header('location:board.php');