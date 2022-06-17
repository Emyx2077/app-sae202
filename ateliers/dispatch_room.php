<?php
require'../lib/lib.inc.php';
$co = connexion();

//on reccup où chaque teams se trouve et on compte le nombre dans chaque Room
$req = 'SELECT inprogressRoomCode FROM inprogress';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

//on insert le tout dans un array pour que cela sois plus facile a compter
$roomCode2 = [];

while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
    $roomCode2[] = $ligne['inprogressRoomCode'];
}

//on compte combien de fois chaque salles revient
$a = array_count_values($roomCode2);
echo json_encode($a);

deconnexion($co);

