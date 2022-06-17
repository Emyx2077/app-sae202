<?php require'head_admin.php';

$co = connexion();

$req ="SELECT * FROM teams";


echo '<div class="bg-light m-5 mt-5 p-5 border rounded mh-10 d-flex flex-column align-items-center" style="margin-top: 50px">';

    echo '<h3>Toutes les teams</h3>';

    afficherTeams($co, $req);

    echo '</div>';

require '../end.php';

