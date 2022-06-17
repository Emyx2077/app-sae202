<?php require'head_admin.php';

$co = connexion();

$id = $_GET['id'];

$req ='SELECT * FROM teams WHERE teamId="'.$id.'";';
//echo $req.'<br>';

$reqUsers = 'SELECT * FROM users WHERE userTeamId="'.$id.'";';
//echo $reqUsers;

$reqInprogress = 'SELECT * FROM inprogress WHERE inprogressTeamCode="'.$_SESSION['teamCode'].'";';
//echo $reqInprogress;

try {
    $resultat=$co->query($req); // exécuter la requête
    $resultatUsers=$co->query($reqUsers);
    $resultatInprogress=$co->query($reqInprogress);
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

$resultat = $resultat->fetch(PDO::FETCH_ASSOC);

/*$inprogress = 0;
while($ligne = $resultatInprogress->fetch(PDO::FETCH_ASSOC)) {
    $inprogress++;
}*/

$inprogress = $resultatInprogress->rowCount();

echo '<div class="bg-light m-5 p-5 border rounded mh-10 d-flex flex-column align-items-center" style="margin-top: 50px;">';
    echo 'ID de la team : '.$resultat['teamId'].'<br>';
    echo 'Nom : '.$resultat['teamNom'].'<br>';
    echo 'Code : '.$resultat['teamCode'].'<br><br>';
    //echo 'Nombre de joueurs : '.$resultat['teamNbPlayers'].'<br>';

    echo 'Nombre d\'indice de la team : '.$inprogress.'<br><br>';


    $pathTeam = showTeamImg($co);
    echo '<p class="text-center">Photo de l’équipe : </p>';
    echo '<a href="'.$pathTeam.'"><img class="img-thumbnail" style="width :200px" src="'.$pathTeam.'"></a><br>';
    $pathRobot = showRobotImg($co);
    echo '<p class="text-center">Portrait robot : </p>';
    echo '<a href="'.$pathRobot.'"><img class="img-thumbnail" style="width :200px" src="'.$pathRobot.'"></a><br>';

    //afficher tout les user
    while($user = $resultatUsers->fetch(PDO::FETCH_ASSOC)) {
        echo '<div>';
            echo 'ID player: '.$user['userId'].'<br>';
            echo 'Prenom : '.$user['userPrenom'].'<br>';
            echo 'Nom : '.$user['userNom'].'<br>';

            echo '<a href="user.php?id='.$user['userId'].'">Voir plus</a><br><br>';
        echo '<div>';

}

    echo '</div>';

deconnexion($co);
require '../end.php';



