<?php

echo '<div class="dropdown m-2 fixed-top" style="z-index: 5; right: 20px;">';

if (!empty($_SESSION['userId'])){
    echo '<a type="button" class="btn btn-light btn-lg me-2" href="board.php">Accueil</a>';
    echo '<button class="btn btn-light btn-lg dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Bienvenue '. $_SESSION['userPrenom'].'</button><br>';
}

echo '<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">';
if (empty($_SESSION['teamCode'])){
    echo '<li><a class="dropdown-item" href="team.php">Create team</a></li>';
    echo '<li><a class="dropdown-item" href="join_team.php">Join une team</a></li><hr>';
    echo '<li><a class="dropdown-item" href="deconnexion.php">Déconnexion</a></li>';
} else {
    echo '<li><a class="dropdown-item" href="profil/team_profil.php">'.ucfirst($_SESSION['teamNom']).' # '.$_SESSION['teamCode'].'</a><hr>';
    echo '<li><a class="dropdown-item" href="join_team.php">Change de team</a></li><hr>';
    echo '<li><a class="dropdown-item" href="deconnexion.php">Déconnexion</a></li>';
}

echo '</ul></div>';

?>

