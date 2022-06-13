<?php require'head.php'; ?>

<div class="background d-flex justify-content-center">
    <div class="text-white w-75 p-4 m-5" style="margin-top: 0px">
        <?php
        if (!empty($_SESSION['erreur'])) {
            echo '<p class="text-danger" class="erreur">'.$_SESSION['erreur'].'</p>';
            unset ($_SESSION['erreur']);
        }
        ?>


        <h3 class="text-center">Rejoins une team</h3>

        <form action="join_team_verif.php" method="post">
            <input class="form-control" placeholder="Code team (4 chiffres)" type="number" name="teamCode" required/><br>
            <input type="submit" value="Envoyer" class="btn btn-primary float-end">
        </form>
    </div>
</div>

<?php require 'end.php'; ?>