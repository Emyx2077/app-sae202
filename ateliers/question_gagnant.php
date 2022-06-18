<?php require'../head.php';

$co = connexion();

$teamCode = $_SESSION['teamCode'];

$win = $_POST['win'];

$req = 'SELECT uploadNom FROM upload WHERE uploadNom = "questionWin" AND uploadTeamCode = "'.$_SESSION['teamCode'].'"';
try {
    $resultat = $co->query($req);
} catch (PDOException $e) {
    echo '<p>Erreur : '.$e->getMessage().'</p>'; die();
    die();
}

$ligne = $resultat->rowCount();

if ($ligne == 1){
    $_SESSION['question'] = 'Code déjà ajouté !';
    header('location:pintade.php');
    die();
}

if ($win == "alan_turing"){

    $req = 'INSERT INTO upload (uploadNom, uploadTeamCode, uploadImg) VALUES ("questionWin" , "'.$_SESSION['teamCode'].'", "null");';

    try {
        $resultat = $co->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : '.$e->getMessage().'</p>'; die();
        die();
    }

    $_SESSION['question'] = 'Code valider !';
    lvlup($co, $teamCode);
} else {
    $_SESSION['question'] = 'Ce n\'est pas le bon code !';
}


header('location:pintade.php');
