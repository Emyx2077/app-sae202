<?php require '../lib/lib.inc.php';

$hint=mb_strtolower(sanitize($_POST['indice']));

$teamNom = $_SESSION['teamNom'];
$teamCode = $_SESSION['teamCode'];


$co=connexion();

$req='SELECT * FROM hash WHERE hashHint ="'.$hint.'";';

try {
    $resultat=$co->query($req); // exécuter la requête
    $resultat = $resultat->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}



if ($resultat['hashHint'] == $hint){
    $hashId=$resultat['hashId'];

    $req = 'INSERT INTO hashAccess (teamCode, teamNom, hashId) VALUES ("'.
        $teamCode.'", "'.$teamNom.'", "'.$hashId.'");';
    try {
        $resultat=$co->query($req); // exécuter la requête
    } catch (PDOException $e) {
        print "Erreur : ".$e->getMessage().'<br />';
        die();
    }
    header('location:decodehub.php');

} else {
    $_SESSION['erreur'] = "indice invalide";
    header('location:decodehub.php');
}
