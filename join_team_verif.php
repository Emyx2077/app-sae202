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

/*//actualiser nombre player dans l'ancienne team
echo $resultat['teamNbPlayers'];

$teamNbPlayers = $resultat['teamNbPlayers'] -1;


//check si l'user avait déjà une team
if (!empty($_SESSION['teamCode'])) {
//on check si la team est n'est pas 0 joueurs, si non, on update le nombre
    //sinon si elle est vide on delete la team
    if ($teamNbPlayers > 0) {
        $req2 = 'UPDATE teams SET teamNbPlayers = teamNbPlayers - 1 WHERE teamCode="' . $_SESSION['teamCode'] . '"';
    } else {
            //$req2 = 'DELETE FROM teams WHERE teamCode="' . $_SESSION['teamCode'] . '"';
            echo 'a';
    }

    try {
        $resultat2 = $co->query($req2); // exécuter la requête
    } catch (PDOException $e) {
        print "Erreur : " . $e->getMessage() . '<br />';
        die();
    }

    $resultat2 = $resultat2->fetch(PDO::FETCH_ASSOC);
    echo $resultat2;
}*/


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

deconnexion($co);

//on renvoit sur le board
//header('location:board.php');






