<!--<a href="users.php">users</a>
<a href="teams.php">teams</a>
<a href="upload.php">Voir les upload des teams</a>-->


<?php require 'head_admin.php';


?>

<div class="d-flex flex-column align-items-center" style="margin-top: 100px">
    <a class="btn btn-primary m-2 btn-lg" href="teams.php">Teams</a>
    <br>
    <a class="btn btn-primary m-2 btn-lg" href="users.php">Users (all)</a>
    <br>
    <a class="btn btn-primary m-2 btn-lg" href="upload.php">Upload global</a>
    <br>
    <a class="btn btn-primary m-2 btn-lg" href="keys.php">Gérer les clés</a>
    <br>
    <a class="btn btn-primary m-2 btn-lg" href="imposteur.php">L'imposteur</a>
    <br>
    <a class="btn btn-primary m-2 btn-lg" href="room.php">Les salles</a>
</div>

<?php require '../end.php'; ?>