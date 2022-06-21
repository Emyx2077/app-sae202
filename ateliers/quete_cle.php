<?php
require'../head.php';

$co = connexion();
$teamCode = $_SESSION['teamCode'];

if (empty($teamCode)){
    header('location:../board.php');
    $_SESSION['board'] = "Vous devez être connecté pour faire cette action";
    die();
}

echo '<h1 class="text-center text-white" style="margin: 100px 0px 50px 0px">La quete de la clé</h1>';

echo '<div class="d-flex flex-column align-items-center">';


echo '<div class="bg-light m-5 mt-5 p-5 border rounded w-75 p-4 m-5" style="margin-top: 0px; max-width: 550px">
        <h3 class="mb-4 text-center text-black">Code de la salle</h3>';

echo '<p class="text-center"><span id="joinStatus" class=""></span></p>';

echo '<form id="join">
                    <input id="textArea" class="form-control" max="999" placeholder="A côté de la porte (ex 205)" type="number" name="roomCode" required/><br>
                    <input type="submit" value="Envoyer" class="btn btn-primary float-end">
                </form>';

echo '</div>';
?>

    <div class="textAtelier rounded">
        <p>
            <h3>La quête de la clé</h3>

            Les conspirateurs tenaient vraiment à bien cacher la localisation du prince, vous ne pensiez quand même pas que cela serait si facile de trouver sa localisation.<br>
            Il va vous falloir une clé de déchiffrement afin de pouvoir déchiffrer les bouts de code obtenue avec les indices.<br><br>
            Il est donc l’heure de partir à chasse au trésor.<br>
            Vous trouverez sur une table une carte au trésor, prenez en une et partez à l'aventure !<br>

            <br><i>Code salle : 18</i>

        </p>
    </div>


    <!--Valider l'indice-->
    <div class="bg-light m-5 mt-5 p-5 border rounded mh-10" style="max-width: 350px; height : 180px;">
        <h3 class="mb-4 text-center text-black">Finir l'activité</h3>

        <form action="ateliers/quete_found.php" method="post">
            <input type="submit" value="Envoyer" class="float-end btn btn-primary">
        </form>

    </div>

    </div>
    <script src="js/join_activity.js"></script>

<?php require '../end.php'; ?>