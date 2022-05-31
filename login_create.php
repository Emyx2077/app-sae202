<?php require 'lib/lib.inc.php';

$prenom=sanitize($_POST['prenom']);
$nom=sanitize($_POST['nom']);
$passwordInput=$_POST['password'];

$password=password_hash($passwordInput, PASSWORD_BCRYPT);

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

//loading some things in session
$_SESSION['userId']= $userId;
$_SESSION['userPrenom']= $prenom;
$_SESSION['userNom']= $nom;

deconnexion($co);

header('location:board.php');