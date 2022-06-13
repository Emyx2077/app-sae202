<?php require 'lib/lib.inc.php';

//$prenom=sanitize($_POST['prenom']);
$mail=sanitize($_POST['mail']);
$password=$_POST['password'];

$co=connexion();

//select data associés a l'user dans la DB
$req='SELECT * FROM users 
        LEFT JOIN teams
        ON teams.teamId=users.userTeamId
        WHERE userMail="'.$mail.'";';

echo $req;

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$ligne=$resultat->rowCount();

deconnexion($co);


//if password true login, else error
if ($ligne>0) {
    $resultat=$resultat->fetch(PDO::FETCH_ASSOC);
    if (password_verify($password, $resultat['userPassword'])) {
        $_SESSION['userId']=$resultat['userId'];
        $_SESSION['userPrenom']=$resultat['userPrenom'];
        $_SESSION['userNom']= $resultat['userNom'];
        $_SESSION['teamCode']= $resultat['teamCode'];
        $_SESSION['teamNom']= $resultat['teamNom'];
        header('location:board.php');
    } else {
        $_SESSION['erreur'] = "Utilisateur inconnu";
        header('location:index.php');
    }
} else {
    $_SESSION['erreur'] = "Utilisateur inconnu";
    header('location:index.php');
}

