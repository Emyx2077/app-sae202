<?php
require'../head.php';

$co = connexion();
$teamCode = $_SESSION['teamCode'];

if (empty($teamCode)){
    header('location:../board.php');
    $_SESSION['board'] = "Vous devez avoir une team pour faire cette action";
    die();
}

echo '<h1 class="text-center text-white" style="margin: 100px 0px 50px 0px">Bienvenue dans le royaume du Pingouin</h1>';

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
            <h3>La chasse du pingouin</h3>

            Mais où est encore passé ce maudit pingouin, a tous les coups il est encore partie se cacher au beau milieu de son serveur<br>
            Pas de chance pour vous, quelqu’un va devoir aller le chercher si vous voulez retrouver l’indice qu’il possède<br>
            Par chance il a laissé certaines de ses affaires traîner avant de disparaître, vous devriez y jeter un coup d’oeil !
            <a href="ateliers/ressources/le_ssh_pour_les_nuls.txt">[tuto ssh]</a>

        </p>
    </div>

    <!--input mot caché ssh-->
    <div class="bg-light m-5 mt-5 p-5 border rounded w-75" style="margin-top: 0px; max-width: 550px">
        <h3 class="mb-4 text-center text-black">Black Friday</h3>
    <?php
    if (!empty($_SESSION['promo'])) {
        echo '<p>' . ucfirst($_SESSION['promo']) . '</p>';
        unset ($_SESSION['promo']);
    }

        echo '<form action="ateliers/ssh_hidden.php" method="post">
                    <input class="form-control" max="999" placeholder="Offre promotionnel" type="text" name="promo" required/><br>
                    <input type="submit" value="Envoyer" class="btn btn-primary float-end">
                </form>';
    echo '</div>';
    ?>


    <!--Valider l'indice-->
    <div class="bg-light mb-5 p-5 border rounded" style="max-width: 350px; height : 250px;">
        <h3 class="mb-4 text-center text-black">Valider l'indice</h3>

        <form action="profil/is_valid.php" method="post">
            <input class="form-control" placeholder="Valider un indice" type="text" name="indice" required /><br>
            <input type="submit" value="Envoyer" class="float-end btn btn-primary">
        </form>

    </div>

    </div>
    <script src="js/join_activity.js"></script>

<?php require '../end.php'; ?>