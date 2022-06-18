<!--<a href="users.php">users</a>
<a href="teams.php">teams</a>
<a href="upload.php">Voir les upload des teams</a>-->


<?php require 'head_admin.php';


?>

<div class="d-flex flex-column align-items-center" style="margin-top: 80px">
    <a class="btn btn-primary m-2 btn-lg" href="admin/teams.php">Teams</a>
    <br>
    <a class="btn btn-primary m-2 btn-lg" href="admin/users.php">Users (all)</a>
    <br>
    <a class="btn btn-primary m-2 btn-lg" href="admin/upload.php">Upload global</a>
    <br>
    <a class="btn btn-primary m-2 btn-lg" href="admin/keys.php">Gérer les clés</a>
    <br>
    <a class="btn btn-primary m-2 btn-lg" href="admin/imposteur.php">L'imposteur</a>
    <br>
    <a class="btn btn-primary m-2 btn-lg" href="admin/room.php">Les salles</a>
    <br>
    <a class="btn btn-primary m-2 btn-lg" href="admin/leaderboard.php">Leaderboard</a>
</div>

<?php require '../end.php'; ?>