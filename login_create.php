<?php require 'lib/lib.inc.php';

$prenom=sanitize($_POST['prenom']);
$nom=sanitize($_POST['nom']);
$passwordInput=$_POST['password'];
$mail=sanitize($_POST['mail']);

$password=password_hash($passwordInput, PASSWORD_BCRYPT);

$co=connexion();


//check si le mail n'existe pas déjà
$req = 'SELECT * FROM users WHERE userMail="'.$mail.'"';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$resultat=$resultat->fetch(PDO::FETCH_ASSOC);
echo $resultat;

//si un resultat est retourné on renvoit l'user sur la page de connexion
if (!empty($resultat)){
    $_SESSION['erreurMail'] = "Le mail existe déjà";
    header('location:index.php');
    die();
}


//create new user
$req='INSERT INTO users (userPrenom, userNom, userTeamId, userPassword, userMail)
        VALUES ("'.$prenom.'", "'.$nom.'", "0", "'.$password.'", "'.$mail.'");';

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