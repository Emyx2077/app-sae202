<?php require 'head.php'; ?>

<div id="contenu">
    <?php
    if (!empty($_SESSION['erreur'])) {
        echo '<p class="erreur">'.$_SESSION['erreur'].'</p>';
        unset ($_SESSION['erreur']);
    }
    ?>


    <h1>Créer ton compte</h1>

    <form action="login_create.php" method="post">
        Ton prénom : <input type="text" name="prenom" /><br>
        Ton nom : <input type="text" name="nom" /><br>
        Ton code étudiant (qui servira de mdp) : <input type="text" name="password" /><br>
        <input type="submit" value="Envoyer">
    </form>

    <h2>tu as déjà un compte?</h2>

    <form action="login_verif.php" method="post">
        Ton prénom : <input type="text" name="prenom" /><br>
        Ton nom : <input type="text" name="nom" /><br>
        Ton code étudiant (qui servira de mdp) : <input type="text" name="password" /><br>
        <input type="submit" value="Envoyer">
    </form>

</div>

<?php require 'end.php'; ?>
