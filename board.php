<?php
require'head.php';


//var_dump($_SESSION);

if (!empty($_SESSION['userId'])){
    echo 'Bienvenu '. $_SESSION['userPrenom'].'<br>';
}

if (empty($_SESSION['teamCode'])){
    echo '<a href="team.php">Create team</a><br>';
    echo '<a href="join_team.php">Join une team</a>';
} else {
    echo 'Bienvenu team '. $_SESSION['teamNom'].'<br>CODE TEAM : '.$_SESSION['teamCode'].'<br>';
    echo '<a href="team.php">Create team</a><br>';
    echo '<a href="join_team.php">Change de team</a>';
}

?>

<br><a href="deconnexion.php">deconnexion</a>

<hr>
<a href="profil/team_profil.php">profil de la team</a>

