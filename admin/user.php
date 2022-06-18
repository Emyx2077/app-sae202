<?php require'head_admin.php';

$co = connexion();

$id = $_GET['id'];

$req = "SELECT * FROM users WHERE userId=".$id.";";


echo '<div class="bg-light p-5 border rounded mh-10 d-flex flex-column align-items-center" style="margin: 150px 100px 50px 100px">';
    afficherUsers($co, $req);
echo '</div>';

require '../end.php';