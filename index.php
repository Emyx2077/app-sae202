<?php require 'head.php';

if (!empty($_SESSION['userId'])){
    header('location:board.php');
}
?>

<div class="d-flex flex-column align-items-center">

    <div class="mt-5 form-group w-50 text-white">
        <h2 class="mb-3 text-center">S'inscrire</h2>

        <form action="login_create.php" method="post">
            <input class="form-control" placeholder="Ton prénom" type="text" name="prenom" required/><br>
            <input class="form-control" placeholder="Ton nom" type="text" name="nom" required/><br>
            <input class="form-control" placeholder="Ton Email" type="email" name="mail" required/><br>
            <input class="form-control" placeholder="Ton code etudiant (qui sert de mot de passe)" type="text" name="password" required/><br>
            <input type="submit" value="S'inscrire" class="btn btn-primary float-end">
        </form>
        <?php
        if (!empty($_SESSION['erreurMail'])) {
            echo '<p class="text-danger">'.ucfirst($_SESSION['erreurMail']).'</p>';
            unset ($_SESSION['erreurMail']);
        }
        ?>
    </div>


    <div class="mt-5 form-group w-50 text-white">
        <h2 class="mb-3 text-center">Se connecter</h2>

        <form action="login_verif.php" method="post">
            <input class="form-control" placeholder="Ton Email" type="email" name="mail" required/><br>
            <input class="form-control" placeholder="Ton mot de passe (ton code etudiant)" type="text" name="password" required/><br>
            <input type="submit" value="Se connecter" class="btn btn-primary float-end">
        </form>

        <?php
        if (!empty($_SESSION['erreur'])) {
            echo '<p class="text-danger">'.ucfirst($_SESSION['erreur']).'</p>';
            unset ($_SESSION['erreur']);
        }
        ?>

    </div>
</div>


<?php require 'end.php'; ?>
