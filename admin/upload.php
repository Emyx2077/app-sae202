<?php

require 'head_admin.php';

$co = connexion();

$req = 'SELECT * FROM upload INNER JOIN teams ON upload.uploadTeamCode = teams.teamCode WHERE upload.uploadNom = "groupPic";';

echo '<div class="bg-light m-5 p-5 border rounded mh-10 d-flex flex-column align-items-center">';
    echo '<h3>Les images des joueurs</h3>';

    showUploads($co, $req);
echo '</div>';

require '../end.php';