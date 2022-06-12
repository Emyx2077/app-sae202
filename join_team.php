<?php require'head.php'; ?>

<div class="d-flex justify-content-center m-5">
    <div class="bg-light border rounded w-75 p-4" style="margin-top: 0px">
        <?php
        if (!empty($_SESSION['erreur'])) {
            echo '<p class="text-danger" class="erreur">'.$_SESSION['erreur'].'</p>';
            unset ($_SESSION['erreur']);
        }
        ?>


        <h3 class="text-center">Rejoins une team</h3>

        <form action="join_team_verif.php" method="post">
            <input class="form-control" placeholder="Code team (4 chiffres)" type="number" name="teamCode" required/><br>
            <input type="submit" value="Envoyer" class="btn btn-outline-primary float-right">
        </form>
    </div>
</div>