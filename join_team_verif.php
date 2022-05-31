<?php require 'lib/lib.inc.php';

//unset($_SESSION['teamCode'], $_SESSION['teamNom']);

$teamCode=sanitize($_POST['teamCode']);

$co=connexion();


//on check si le nouveau teamCode existe
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

}

$resultat = $resultat->fetch(PDO::FETCH_ASSOC);

//actualiser nombre player dans l'ancienne team
$teamNbPlayers = $resultat['teamNbPlayers'] - 1;

//on check si la team est  a 0, si oui on delete, mais seulement si le player avait déjà une team
if($teamNbPlayers > 0){
    $req2='UPDATE teams SET teamNbPlayers ="'.$teamNbPlayers.'" WHERE teamCode="'.$_SESSION['teamCode'].'"';
} else {
    if(!empty($_SESSION['teamCode'])){
    $req2='DELETE FROM teams WHERE teamCode="'.$_SESSION['teamCode'].'"';
    }
}

try {
    $resultat2=$co->query($req2); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$resultat2 = $resultat2->fetch(PDO::FETCH_ASSOC);


//on actualise les values de la team dans la session
$teamId = $resultat['teamId'];
$_SESSION['teamNom'] = $resultat['teamNom'];
$_SESSION['teamCode'] = $resultat['teamCode'];

//ajouter un nbplayer a la nouvelle team
$req='UPDATE teams SET teamNbPlayers = teamNbPlayers + 1 WHERE teamCode="'.$_SESSION['teamCode'].'"';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}


//update dans la DB dans quel team le player est
$req = 'UPDATE users SET userTeamId ="'.$teamId.'" WHERE userId="'.$_SESSION['userId'].'"';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}


//on renvoit sur le board
header('location:board.php');






