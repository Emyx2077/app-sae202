<?php

require'head_admin.php';

$co=connexion();

//on drop les anciennes values
$req = 'DELETE FROM hash;';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$splitSentence = $_SESSION['split'];
$size = $_SESSION['size'];
unset($_SESSION['split, size']);


for ($i=0 ; $i< $size; $i++) {
    $loc = 'location'.$i;
    $hi = 'hint'.$i;

    $location = $_POST[$loc];
    $hint = $_POST[$hi];
    $key = $splitSentence[$i];

    $req = 'INSERT INTO hash (hashKey, hashIndice, hashHint) VALUES ("'.$key.'", "'.$location.'", "'.$hint.'");';

    try {
        $resultat=$co->query($req); // exécuter la requête
    } catch (PDOException $e) {
        print "Erreur : ".$e->getMessage().'<br />';
        die();
    }
}

header('location:keys.php');
