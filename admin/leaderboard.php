<?php require 'head_admin.php';

$co = connexion();

$req = "SELECT * FROM teams INNER JOIN time ON time.timeTeamCode = teams.teamCode ORDER BY time.time ASC";
echo $req;


echo '<div class="bg-light p-5 border rounded mh-10 d-flex flex-column align-items-center" style="margin: 150px 100px 50px 100px">';

echo '<h3>Toutes les teams</h3>';
leaderboard($co, $req);

echo '</div>';
