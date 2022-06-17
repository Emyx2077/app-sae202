<?php require'../head.php';

/*var_dump($_SESSION);
var_dump($_FILES);*/

$co = connexion();

$imageType=$_FILES["pic"]["type"];

uploadPic($co, $imageType);

header('location:team_profil.php');
