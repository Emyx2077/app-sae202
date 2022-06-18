<?php require '../lib/lib.inc.php';

$teamNom = $_SESSION['teamNom'];
$teamCode = $_SESSION['teamCode'];

$co=connexion();

deleteTeamInprogress($co, $teamCode);

header('location:../board.php');