<?php require '../lib/lib.inc.php';

$imposteur=mb_strtolower(sanitize($_POST['imposteur']));

$co=connexion();

$req = 'SELECT suspectNom FROM suspect WHERE suspectNom="'.$imposteur.'";';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$ligne=$resultat->rowCount();

if ($ligne == 0){
    $_SESSION['imposteur'] = "Mauvaise réponse !";
} else {
    $_SESSION['imposteur'] = "Bonne réponse !";
}

deconnexion($co);

header('location:oie.php');
