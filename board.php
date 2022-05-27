<?php
require'head.php';


var_dump($_SESSION);

if (empty($_SESSION['teamCode'])){
    echo '<a href="team.php">create team</a><br>';
} else {
    echo 'Bienvenu team '. $_SESSION['teamNom'];
}

?>

<a href="deconnexion.php">deconnexion</a>
