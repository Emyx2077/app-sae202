<?php require'head_admin.php';

$co = connexion();

$nom=$_POST['nom'];
$hash=$_POST['hash'];

$req = 'UPDATE suspect SET suspectNom="'.$nom.'", suspectHash ="'.$hash.'" WHERE suspectId=1;';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

header('location:imposteur.php');