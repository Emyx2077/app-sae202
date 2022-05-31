<?php require'head.php'; ?>

<div id="contenu">
    <?php
    if (!empty($_SESSION['erreur'])) {
        echo '<p class="erreur">'.$_SESSION['erreur'].'</p>';
        unset ($_SESSION['erreur']);
    }
    ?>


    <h1>Connexion</h1>

    <form action="join_team_verif.php" method="post">
    Code de la team (4 chiffres) <input type="number" name="teamCode" /><br>
        <input type="submit" value="Envoyer">
    </form>

</div>