<?php require'head_admin.php';

$co = connexion();

$req ="SELECT * FROM users";
afficherUsers($co, $req);