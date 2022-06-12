<?php require '../lib/lib.inc.php';

$hint=mb_strtolower(sanitize($_POST['indice']));

$teamNom = $_SESSION['teamNom'];
$teamCode = $_SESSION['teamCode'];

$co=connexion();


//check si l'indice a pas déjà été validé
$req = 'SELECT * FROM hash INNER JOIN hashAccess ON hash.hashId = hashAccess.hashId WHERE teamCode="'.$teamCode.'" AND hashHint="'.$hint.'";';

try {
    $resultat=$co->query($req); // exécuter la requête
    $lignes_resultat = $resultat->rowCount();
    if ($lignes_resultat>0){
        $_SESSION['erreur'] = "L'indice existe déjà";
        deconnexion($co);
        header('location:team_profil.php');
    }
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}



//on reccupere l'indice
$req='SELECT * FROM hash WHERE hashHint ="'.$hint.'";';

try {
    $resultat=$co->query($req); // exécuter la requête
    $resultat = $resultat->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

//on log le fait que tel team a valider tel indice
if ($resultat['hashHint'] == $hint){
    $hashId=$resultat['hashId'];

    $req = 'INSERT INTO hashAccess (teamCode, teamNom, hashId) VALUES ("'.
        $teamCode.'", "'.$teamNom.'", "'.$hashId.'");';

    echo $req;
    try {
        $resultat=$co->query($req); // exécuter la requête
    } catch (PDOException $e) {
        print "Erreur : ".$e->getMessage().'<br />';
        die();
    }
    deconnexion($co);
    header('location:team_profil.php');

} else {
    $_SESSION['erreur'] = "Indice invalide";
    deconnexion($co);
    header('location:team_profil.php');
}
