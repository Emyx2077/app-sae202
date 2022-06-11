<?php

require 'head_admin.php';

$co = connexion();

$req = 'SELECT * FROM upload INNER JOIN teams ON upload.uploadTeamCode = teams.teamCode WHERE upload.uploadNom = "groupPic";';

showUploads($co, $req);

deconnexion($co);