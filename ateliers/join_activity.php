<?php
require'../head.php';

$co = connexion();

$teamCode = $_SESSION['teamCode'];
$roomCode = sanitize($_POST['roomCode']);

//on check si le code existe
$req = 'SELECT hashRoomCode from hash WHERE hashRoomCode = "'.$roomCode.'";';

try {
    $resultat = $co->query($req);
} catch (PDOException $e) {
    echo '<p>Erreur : '.$e->getMessage().'</p>'; die();
    die();
}
$resultat = $resultat->fetch(PDO::FETCH_ASSOC);




//si le code existe alors
if (!empty($resultat)) {

    //on check si la team était déjà pas enregistré dans une autre salle
    $req = 'SELECT inprogressTeamCode FROM inprogress WHERE inprogressTeamCode="'.$teamCode.'";';

    try {
        $resultat = $co->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : '.$e->getMessage().'</p>'; die();
        die();
    }
    $resultat = $resultat->fetch(PDO::FETCH_ASSOC);

    //si elle l'était on delete l'entrée
    if (!empty($resultat)){
        $req = 'DELETE FROM inprogress WHERE inprogressTeamCode="'.$teamCode.'"';

        try {
            $resultat = $co->query($req);
        } catch (PDOException $e) {
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }
    }

        //on insert la nouvelle salle où se trouve la team
        $req = 'INSERT INTO inprogress (inprogressRoomCode, inprogressTeamCode) VALUES ("' . $roomCode . '", "' . $teamCode . '")';

        try {
            $resultat = $co->query($req);
        } catch (PDOException $e) {
            echo '<p>Erreur : ' . $e->getMessage() . '</p>';
            die();
        }

        header('../board.php');
} else {
    $_SESSION['erreur'] = "Code salle inconnu";
    header('../board.php');
}
