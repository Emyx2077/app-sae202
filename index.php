<?php require 'head.php'; ?>

<div class="d-flex flex-column align-items-center">
    <?php
    if (!empty($_SESSION['erreur'])) {
        echo '<p class="text-danger">'.$_SESSION['erreur'].'</p>';
        unset ($_SESSION['erreur']);
    }

    if (!empty($_SESSION['userId'])){
        header('location:board.php');
    }
    ?>

    <div class="mt-5 form-group w-50">
        <h2 class="mb-3 text-center">Créer ton compte</h2>

        <form action="login_create.php" method="post">
            <input class="form-control" placeholder="ton prénom" type="text" name="prenom" required/><br>
            <input class="form-control" placeholder="ton nom" type="text" name="nom" required/><br>
            <input class="form-control" placeholder="ton code etudiant" type="text" name="password" required/><br>
            <input type="submit" value="S'inscrire" class="btn btn-outline-primary float-right">
        </form>
    </div>


    <div class="mt-5 form-group w-50">
        <h2 class="mb-3 text-center">Tu as déjà un compte?</h2>

        <form action="login_verif.php" method="post">
            <input class="form-control" placeholder="ton prénom" type="text" name="prenom" required/><br>
            <input class="form-control" placeholder="ton nom" type="text" name="nom" required/><br>
            <input class="form-control" placeholder="ton code étudiant" type="text" name="password" required/><br>
            <input type="submit" value="Se connecter" class="btn btn-outline-primary float-right">
        </form>
    </div>

</div>

<?php require 'end.php'; ?>
