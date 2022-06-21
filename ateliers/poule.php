<?php
require'../head.php';

$co = connexion();
$teamCode = $_SESSION['teamCode'];

if (empty($teamCode)){
    header('location:../board.php');
    $_SESSION['board'] = "Vous devez avoir une team pour faire cette action";
    die();
}

echo '<h1 class="text-center text-white" style="margin: 100px 0px 50px 0px">Bienvenue dans le royaume de la Poule</h1>';

echo '<div class="d-flex flex-column align-items-center">';


        echo '<div class="bg-light m-5 mt-5 p-5 border rounded w-75" style="margin-top: 0px; max-width: 550px">
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
            <h3>Les secrets du poulailler</h3>
            Mais que font toutes ces poules ici, AH ! Mais c’est un poulailler <a href="">[liens]</a><br>
            Vous allez devoir prendre votre meilleur chapeau de paille et votre bonne vieille fourche, c’est l’heure d’aller réveiller le poulailler, il vous faut absolument cet indice !<br>
            Vous allez devoir à l'aide de CSS explorer et trouver les secrets dont regorge le poulailler.<br>

            <br><i>Vous pouvez également en salle 008, c'est juste a côté</i>

        </p>
    </div>


    <!--Valider l'indice-->
    <div class="bg-light m-5 mt-5 p-5 border rounded mh-10" style="max-width: 350px; height : 250px;">
        <h3 class="mb-4 text-center text-black">Valider l'indice</h3>

        <form action="profil/is_valid.php" method="post">
            <input class="form-control" placeholder="Valider un indice" type="text" name="indice" required /><br>
            <input type="submit" value="Envoyer" class="float-end btn btn-primary">
        </form>

    </div>

    </div>
    <script src="js/join_activity.js"></script>

<?php require '../end.php'; ?>