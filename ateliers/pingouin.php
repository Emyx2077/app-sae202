<?php
require'../head.php';

$co = connexion();
$teamCode = $_SESSION['teamCode'];

if (empty($teamCode)){
    header('location:../board.php');
    $_SESSION['board'] = "Vous devez être connecté pour faire cette action";
    die();
}

echo '<h1 class="text-center text-white mt-4">Bienvenue dans le royaume du Pingouin</h1>';

echo '<div class="d-flex flex-column align-items-center">
        <div class="bg-light m-5 mt-5 p-5 border rounded w-75 p-4 m-5" style="margin-top: 0px; max-width: 550px">
        <h3 class="mb-4 text-center text-black">Code de la salle</h3>';

if (!empty($_SESSION['erreur'])) {
    echo '<p class="text-danger">'.ucfirst($_SESSION['erreur']).'</p>';
    unset ($_SESSION['erreur']);
}elseif (!empty($_SESSION['success'])){
    echo '<p class="text-success">'.ucfirst($_SESSION['success']).'</p>';
    unset ($_SESSION['success']);
}

echo '<form action="ateliers/join_activity.php" method="post">
                    <input class="form-control" max="999" placeholder="A côté de la porte (ex 205)" type="number" name="roomCode" required/><br>
                    <input type="submit" value="Envoyer" class="btn btn-primary float-end">
                </form>';

echo '</div>';
?>

    <!--input mot caché ssh-->
    <div class="bg-light m-5 mt-5 p-5 border rounded w-75 p-4 m-5" style="margin-top: 0px; max-width: 550px">
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
    <div class="bg-light m-5 mt-5 p-5 border rounded mh-10" style="max-width: 350px; height : 250px;">
        <h3 class="mb-4 text-center text-black">Valider l'indice</h3>

        <form action="profil/is_valid.php" method="post">
            <input class="form-control" placeholder="Valider un indice" type="text" name="indice" required /><br>
            <input type="submit" value="Envoyer" class="float-end btn btn-primary">
        </form>

    </div>

    </div>

<?php require '../end.php'; ?>