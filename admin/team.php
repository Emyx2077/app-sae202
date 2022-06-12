<?php require'head_admin.php';

$co = connexion();

$id = $_GET['id'];

$req ="SELECT * FROM teams WHERE teamId=".$id.";";
//echo $req.'<br>';

$reqUsers = "SELECT * FROM users WHERE userTeamId=".$id.";";
//echo $reqUsers;

try {
    $resultat=$co->query($req); // exécuter la requête
    $resultatUsers=$co->query($reqUsers);
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}


$resultat = $resultat->fetch(PDO::FETCH_ASSOC);


echo 'Nom : '.$resultat['teamNom'].'<br>';
echo 'Code : '.$resultat['teamCode'].'<br>';
//echo 'Nombre de joueurs : '.$resultat['teamNbPlayers'].'<br>';
echo 'ID de la team : '.$resultat['teamId'].'<br><br>';


        //photo groupe
        //photo portait robot

        //where

        //keys

while($user = $resultatUsers->fetch(PDO::FETCH_ASSOC)) {
    echo 'ID player: '.$user['userId'].'<br>';
    echo 'Prenom : '.$user['userPrenom'].'<br>';
    echo 'Nom : '.$user['userNom'].'<br>';

    echo '<a href="user.php?id='.$user['userId'].'">Voir plus</a>'.'<br><br><br>';
}



