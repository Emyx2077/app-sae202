<?php require 'head.php'; ?>

<div id="contenu">
    <h1>Connexion</h1>

    <h2>Creation</h2>
    <form action="login_create.php" method="post">
        Nom d'équipe : <input type="text" name="nomTeam" /><br>
        Ton prénom : <input type="text" name="prenom" /><br>
        Ton nom : <input type="text" name="nom" /><br>
        Ton code étudiant (qui servira de mdp) : <input type="text" name="password" /><br>
        <input type="submit" value="Envoyer">
    </form>

    <h2>Rejoindre</h2>
    <form action="login_join.php" method="post">
        Code équipe : <input type="text" name="codeEquipe" /><br>
        Ton prénom : <input type="text" name="prenom" /><br>
        Ton nom : <input type="test" name="nom" /><br>
        Ton code étudiant (qui servira de mdp) : <input type="test" name="password" /><br>
        <input type="submit" value="Envoyer">
    </form>

</div>

<?php require 'end.php'; ?>
