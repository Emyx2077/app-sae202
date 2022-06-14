<?php
require'../head.php';

echo '<h1 class="text-center text-white mt-4">Bienvenue dans le royaume de la mouette</h1>';

echo '<div class="d-flex justify-content-center">
        <div class="text-white w-75 p-4 m-5" style="margin-top: 0px">';

        if (!empty($_SESSION['erreurMail'])) {
                echo '<p class="text-danger">'.ucfirst($_SESSION['erreurMail']).'</p>';
                unset ($_SESSION['erreurMail']);
        }

        echo '<form action="join_activity.php" method="post">
                    <input class="form-control" max="9999" placeholder="Veuillez entrer le code de la salle (qui se trouve sur la porte)" type="number" name="roomCode" required/><br>
                    <input type="submit" value="Envoyer" class="btn btn-primary float-end">
                </form>';

?>



<?php require '../end.php'; ?>