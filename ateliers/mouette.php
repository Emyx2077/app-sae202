<?php
require'../head.php';

$co = connexion();
$teamCode = $_SESSION['teamCode'];

echo '<h1 class="text-center text-white mt-4">Bienvenue dans le royaume de la mouette</h1>';

echo '<div class="d-flex flex-column align-items-center">
        <div class="bg-light m-5 mt-5 p-5 border rounded w-75 p-4 m-5" style="margin-top: 0px; max-width: 550px">';

        if (!empty($_SESSION['erreurMail'])) {
                echo '<p class="text-danger">'.ucfirst($_SESSION['erreurMail']).'</p>';
                unset ($_SESSION['erreurMail']);
        }

        echo '<form action="join_activity.php" method="post">
                    <input class="form-control" max="9999" placeholder="Veuillez entrer le code de la salle (qui se trouve sur la porte)" type="number" name="roomCode" required/><br>
                    <input type="submit" value="Envoyer" class="btn btn-primary float-end">
                </form>';

        echo '</div>';
?>




<!--Valider l'indice-->
        <div class="bg-light m-5 mt-5 p-5 border rounded mh-10" style="max-width: 350px; height : 250px;">
                <h3 class="mb-4 text-center text-black">Valider l'indice</h3>

                <form action="../profil/is_valid.php" method="post">
                        <input class="form-control" placeholder="Valider un indice" type="text" name="indice" required /><br>
                        <input type="submit" value="Envoyer" class="float-end btn btn-primary">
                </form>

        </div>

</div

<?php require '../end.php'; ?>