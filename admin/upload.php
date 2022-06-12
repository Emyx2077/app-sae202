<?php

require 'head_admin.php';

$co = connexion();

$req = 'SELECT * FROM upload INNER JOIN teams ON upload.uploadTeamCode = teams.teamCode WHERE upload.uploadNom = "groupPic";';

echo '<h3>Les images des joueurs</h3>';

showUploads($co, $req);

deconnexion($co);