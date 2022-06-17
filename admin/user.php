<?php require'head_admin.php';

$co = connexion();

$id = $_GET['id'];

$req = "SELECT * FROM users WHERE userId=".$id.";";


echo '<div class="bg-light m-5 p-5 border rounded mh-10 d-flex flex-column align-items-center">';
    afficherUsers($co, $req);
echo '</div>';

require '../end.php';