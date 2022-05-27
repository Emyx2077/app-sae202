<?php require 'lib/lib.inc.php';

//unset($_SESSION['teamCode'], $_SESSION['teamNom']);

$teamCode=sanitize($_POST['teamCode']);

$co=connexion();


//on check si le nouveau teamCode existe
$req = 'SELECT teamCode from teams WHERE teamCode="'.$teamCode.'";';

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
    die();
}


