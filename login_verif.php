<?php require 'lib/lib.inc.php';

$prenom=sanitize($_POST['prenom']);
$nom=sanitize($_POST['nom']);
$password=$_POST['password'];

$co=connexion();

//select data from user associated with input (and load team table too, for loading session)
$req='SELECT * FROM users 
        INNER JOIN teams
        ON teams.teamId=users.userTeamId
        WHERE userPrenom="'.$prenom.'" AND userNom="'.$nom.'";';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$ligne=$resultat->rowCount();

//if password true login, else error
if ($ligne>0) {
    $resultat=$resultat->fetch(PDO::FETCH_ASSOC);
    if (password_verify($password, $resultat['userPassword'])) {
        $_SESSION['userId']=$resultat['userId'];
        $_SESSION['userPrenom']=$resultat['userPrenom'];
        $_SESSION['teamCode']= $resultat['teamCode'];
        $_SESSION['teamNom']= $resultat['teamNom'];
        header('location:board.php');
    } else {
        $_SESSION['erreur'] = "utilisateur inconnu";
        header('location:login.php');
    }
} else {
    $_SESSION['erreur'] = "utilisateur inconnu";
    header('location:login.php');
}

