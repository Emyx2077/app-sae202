<?php require'../head.php';

$co = connexion();
$teamCode = $_SESSION['teamCode'];

$promo = $_POST['promo'];

$req = 'SELECT uploadNom FROM upload WHERE uploadNom = "sshHidden" AND uploadTeamCode = "'.$_SESSION['teamCode'].'"';
try {
    $resultat = $co->query($req);
} catch (PDOException $e) {
    echo '<p>Erreur : '.$e->getMessage().'</p>'; die();
    die();
}

$ligne = $resultat->rowCount();

if ($ligne == 1){
    $_SESSION['promo'] = 'Code promo déjà ajouté !';
    header('location:pingouin.php');
    die();
}

if ($promo == "JESUISPERDU"){

$req = 'INSERT INTO upload (uploadNom, uploadTeamCode, uploadImg) VALUES ("sshHidden" , "'.$_SESSION['teamCode'].'", "null");';

    try {
        $resultat = $co->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : '.$e->getMessage().'</p>'; die();
        die();
    }

    $_SESSION['promo'] = 'Code promo ajouté !';
    lvlup($co, $teamCode);
} else {
    $_SESSION['promo'] = 'Code promo invalide !';
}


header('location:pingouin.php');
