<?php



echo '<div class="dropdown m-2 fixed-top nav justify-content-end" style="z-index: 5; right: 20px;">';

echo '<a class="btn btn-primary mr-2" href="/sae202/app-sae202/board.php" role="button">Accueil</a>';

if (!empty($_SESSION['userId'])){
    echo '<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Bienvenue '. $_SESSION['userPrenom'].'</button><br>';
}

echo '<div class="dropdown-menu">';
if (empty($_SESSION['teamCode'])){
    echo '<a class="dropdown-item" href="/sae202/app-sae202/team.php">Create team</a>';
    echo '<a class="dropdown-item" href="/sae202/app-sae202/join_team.php">Join une team</a><hr>';
    echo '<a class="dropdown-item" href="/sae202/app-sae202/deconnexion.php">Déconnexion</a>';
} else {
    echo '<a class="dropdown-item" href="/sae202/app-sae202/profil/team_profil.php">'.ucfirst($_SESSION['teamNom']).' # '.$_SESSION['teamCode'].'</a><hr>';
    echo '<a class="dropdown-item" href="/sae202/app-sae202/team.php">Create team</a>';
    echo '<a class="dropdown-item" href="/sae202/app-sae202/join_team.php">Change de team</a><hr>';
    echo '<a class="dropdown-item" href="/sae202/app-sae202/deconnexion.php">Déconnexion</a>';
}

echo '</div></div>';