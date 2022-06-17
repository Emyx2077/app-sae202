<?php require'../head.php';

$co = connexion();

$imageType=$_FILES["pic"]["type"];

$from = 'robotPic';

uploadPic($co, $imageType, $from);

header('location:oie.php');