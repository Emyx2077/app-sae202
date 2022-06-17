<?php require'head_admin.php';

$co = connexion();

echo '<div class="bg-light m-5 p-5 border rounded mh-10 d-flex flex-column align-items-center">';
    $req ="SELECT * FROM users";
    afficherUsers($co, $req);
echo '</div>';

require '../end.php';