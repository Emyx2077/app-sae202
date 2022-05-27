<?php
require'head.php';


//var_dump($_SESSION);

if (!empty($_SESSION['userId'])){
    echo 'Bienvenu '. $_SESSION['userPrenom'].'<br>';
}

if (empty($_SESSION['teamCode'])){
    echo '<a href="team.php">create team</a><br>';
} else {
    echo 'Bienvenu team '. $_SESSION['teamNom'].'<br>CODE TEAM : '.$_SESSION['teamCode'];
}

?>

<br><a href="deconnexion.php">deconnexion</a>
