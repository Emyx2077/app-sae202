<?php
require'../lib/lib.inc.php';

$co = connexion();

$teamCode = $_SESSION['teamCode'];
$roomCode = sanitize($_POST['roomCode']);

//remplacer le code salle par le principale si l'équipe rentre une secondaire, et enlever les 0

if (($roomCode != '205') && ($roomCode != '201') && ($roomCode != '18')) {
    $roomCode = str_replace(0, '', $roomCode);
    $roomCode = str_replace(6, 9, $roomCode);
    $roomCode = str_replace(5, 9, $roomCode);
    $roomCode = str_replace(8, 7, $roomCode);
}
//echo $roomCode;


//on check si le code existe
$req = 'SELECT * from room WHERE roomCode = "'.$roomCode.'";';

try {
    $resultat = $co->query($req);
} catch (PDOException $e) {
    echo '<p>Erreur : '.$e->getMessage().'</p>';
    die();
}
$resultat = $resultat->fetch(PDO::FETCH_ASSOC);


//si le code existe alors
if (!empty($resultat['roomCode'])) {
    $maxTeams = $resultat['roomMaxTeam'];

    //on check si il reste de la place dans la salle en question
    $req = 'SELECT inprogressRoomCode FROM inprogress WHERE inprogressRoomCode="'.$roomCode.'";';

    try {
        $resultat = $co->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : '.$e->getMessage().'</p>';
        die();
    }

    $howMuch = 0;
    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
        $howMuch += 1;
    }
    if ($howMuch >= $maxTeams){
        echo 3;
        //$_SESSION['erreur'] = "Salle rempli, veuillez allez dans une autre activité";
        //header('location:../board.php');
        die();
    }


    //on check si la team était déjà pas enregistré dans une autre salle
    $req = 'SELECT inprogressTeamCode FROM inprogress WHERE inprogressTeamCode="'.$teamCode.'";';

    try {
        $resultat = $co->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : '.$e->getMessage().'</p>';
        die();
    }
    $resultat = $resultat->fetch(PDO::FETCH_ASSOC);

    //si elle l'était on delete l'entrée
    if (!empty($resultat)){

        deleteTeamInprogress($co, $teamCode);

    }

        //on insert la nouvelle salle où se trouve la team
        $req = 'INSERT INTO inprogress (inprogressRoomCode, inprogressTeamCode) VALUES ("' . $roomCode . '", "' . $teamCode . '")';

        try {
            $resultat = $co->query($req);
        } catch (PDOException $e) {
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
        deconnexion($co);
        echo 1;
        //$_SESSION['success'] = "Bienvenue";
        //header('location:../board.php');
} else {
    deconnexion($co);
    echo 0;
    //$_SESSION['erreur'] = "Code salle inconnu";
    //header('location:../board.php');
}
