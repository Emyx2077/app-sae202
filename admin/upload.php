<?php

require 'head_admin.php';

$co = connexion();

echo '<div class="bg-light m-5 p-5 border rounded mh-10 d-flex">';
    echo '<h3>Les images des joueurs</h3>';

    $req = 'SELECT * FROM upload INNER JOIN teams ON upload.uploadTeamCode = teams.teamCode WHERE upload.uploadNom = "groupPic";';
    showUploads($co, $req);

    $req = 'SELECT * FROM upload INNER JOIN teams ON upload.uploadTeamCode = teams.teamCode WHERE upload.uploadNom = "robotPic";';
    showUploads($co, $req);
echo '</div>';

require '../end.php';