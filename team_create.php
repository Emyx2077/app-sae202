<?php require 'lib/lib.inc.php';

$teamNom=sanitize($_POST['teamNom']);

$co=connexion();


//check if team name already existing
$reqTeamNom = 'SELECT teamNom FROM teams WHERE teamNom="'.$teamNom.'";';

try {
    $resultat=$co->query($reqTeamNom); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$teamNomCount=$resultat->rowCount();
    if ($teamNomCount>0){
        $_SESSION['erreur'] = "Le nom de la team existe déjà";
        header('location:team.php');
        die();
    }



//generate pin code for joining team (and checking if it's unique)
$isunique=0;
while ($isunique==0){

    $teamCode = generatePinCode(4);

    $req='SELECT teamCode FROM teams WHERE teamCode="'.$teamCode.'";';

    try {
        $resultat=$co->query($req); // exécuter la requête
    } catch (PDOException $e) {
        print "Erreur : ".$e->getMessage().'<br />';
        die();
    }

    $resultat = $resultat->rowCount();

    if($resultat==0){
        $isunique=1;
    }
}




//create team
$req='INSERT INTO teams (teamNom, teamLvl, teamNbPlayers, teamCode)
        VALUES ("'.$teamNom.'", "0", "1", "'.$teamCode.'");';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$_SESSION['teamCode']= $teamCode;
$_SESSION['teamNom']= $teamNom;


//get team id we just created
$req='SELECT teamId FROM teams WHERE teamCode="'.$teamCode.'";';

try {
    $resultat=$co->query($req); // exécuter la requête
    $teamId=$resultat->fetch(PDO::FETCH_ASSOC);
    $teamId=implode("", $teamId);
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}


//update team user is in
$req='UPDATE users SET userTeamId="'.$teamId.'" WHERE userId="'.$_SESSION['userId'].'"';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

//

deconnexion($co);

header('location:board.php');
