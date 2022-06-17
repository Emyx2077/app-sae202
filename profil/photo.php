<?php require'../head.php';

$co = connexion();

$imageType=$_FILES["pic"]["type"];

$from = 'groupPic';

uploadPic($co, $imageType, $from);

header('location:team_profil.php');
