<?php require'head.php'; ?>

<div class="d-flex justify-content-center">
    <div class="text-white w-75 p-4 m-5" style="margin-top: 0px">
        <?php
        if (!empty($_SESSION['erreur'])) {
            echo '<p class="text-danger">'.$_SESSION['erreur'].'</p>';
            unset ($_SESSION['erreur']);
        }
        ?>

        <h3 class="text-center">Créer ta team</h3>

        <form action="team_create.php" method="post">
            <input class="form-control" placeholder="Ton nom de team" type="text" name="teamNom" required/><br>
            <input type="submit" value="Envoyer" class="btn btn-primary float-end">
        </form>

    </div>
</div>

<?php require 'end.php'; ?>