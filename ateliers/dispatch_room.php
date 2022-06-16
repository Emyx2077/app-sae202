<?php
require'../lib/lib.inc.php';
$co = connexion();



//on reccupere tout les code des salles
//$req = 'SELECT * FROM inprogress INNER JOIN hash ON inprogressRoomCode = hashRoomCode;';
/*$req = 'SELECT hashRoomCode FROM hash;';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$roomCode = [];

while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
    $roomCode[] = $ligne['hashRoomCode'];
}*/


//on reccup où chaque teams se trouve et on compte le nombre dans chaque Room
$req = 'SELECT inprogressRoomCode FROM inprogress';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$roomCode2 = [];

while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
    $roomCode2[] = $ligne['inprogressRoomCode'];
}

$a = array_count_values($roomCode2);

$keys = array_keys($a);

$count = count($keys);

echo '<br>';

for ($i = 0; $i < $count; $i++){
    if ($a[$keys[$i]] >= 5){
        echo $keys[$i];
        //ça sors la salle qui depasse 5, faire une req ou jsp pour la bloquer
    }
}



//on créer un tableau avec tout les room code

//on compare chaque entrée du tableau a chaque resultat de inprogress
//on compte le nb de fois où ça match




//when match > POULET
//injection ajax sur le board pour le bloquer

