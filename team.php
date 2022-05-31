<?php require'head.php'; ?>

<div id="contenu">
    <?php
    if (!empty($_SESSION['erreur'])) {
        echo '<p class="erreur">'.$_SESSION['erreur'].'</p>';
        unset ($_SESSION['erreur']);
    }
    ?>

    <h1>Connexion</h1>

    <form action="team_create.php" method="post">
        Le nom de ta team : <input type="text" name="teamNom" /><br>
        <input type="submit" value="Envoyer">
    </form>

</div>