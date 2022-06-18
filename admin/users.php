<?php require'head_admin.php';

$co = connexion();

echo '<div class="bg-light p-5 border rounded mh-10 d-flex flex-column align-items-center" style="margin: 150px 100px 50px 100px">';
    $req ="SELECT * FROM users";
    afficherUsers($co, $req);
echo '</div>';

require '../end.php';