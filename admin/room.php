<?php

require 'head_admin.php';

$co = connexion();

$req = 'SELECT * FROM room';

echo '<div class="bg-light p-5 border rounded mh-10 d-flex flex-column align-items-center" style="margin: 150px 100px 50px 100px">';
echo '<h3>Les Salles</h3>';

showRoom($co, $req);
echo '</div>';

require '../end.php';