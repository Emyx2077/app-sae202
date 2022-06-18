<?php

require 'head_admin.php';

$co = connexion();

echo '<div class="bg-light p-5 border rounded mh-10" style="margin: 150px 100px 50px 100px">';
    echo '<h3 class="text-center">Les images des joueurs</h3><br>';

    echo '<div class="d-flex justify-content-center">';
    $req = 'SELECT * FROM upload INNER JOIN teams ON upload.uploadTeamCode = teams.teamCode WHERE upload.uploadNom = "groupPic";';
    showUploads($co, $req);

    $req = 'SELECT * FROM upload INNER JOIN teams ON upload.uploadTeamCode = teams.teamCode WHERE upload.uploadNom = "robotPic";';
    showUploads($co, $req);
    echo '</div>';
echo '</div>';

require '../end.php';