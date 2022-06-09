<?php require'head_admin.php';

$co = connexion();

$id = $_GET['id'];

$req = "SELECT * FROM users WHERE userId=".$id.";";

afficherUsers($co, $req);