<?php require 'lib/lib.inc.php';

$prenom=sanitize($_POST['prenom']);
$nom=sanitize($_POST['nom']);
$password=$_POST['password'];

$co=connexion();

$req='SELECT * FROM users WHERE userPrenom="'.$prenom.'" AND userNom="'.$nom.'";';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$ligne=$resultat->rowCount();

if ($ligne>0) {
    $resultat=$resultat->fetch(PDO::FETCH_ASSOC);
    if (password_verify($password, $resultat['userPassword'])) {
        $_SESSION['userId']=$resultat['userId'];
        header('location:board.php');
    } else {
        $_SESSION['erreur'] = "utilisateur inconnu";
        header('location:login.php');
    }
} else {
    $_SESSION['erreur'] = "utilisateur inconnu";
    header('location:login.php');
}

