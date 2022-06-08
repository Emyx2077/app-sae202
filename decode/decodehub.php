<?php require'../head.php'; ?>

<?php
    if (!empty($_SESSION['erreur'])) {
        echo '<p class="erreur">'.$_SESSION['erreur'].'</p>';
        unset ($_SESSION['erreur']);
    }

//afficher les autres bout de la clé

$co=connexion();

$req = 'SELECT * FROM hashAccess WHERE teamCode="'.$_SESSION['teamCode'].'"';

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

//valider une nouvelle key
?>
<form action="is_valid.php" method="post">
    Bout de code chiffrer <input type="text" name="indice" /><br>
    <input type="submit" value="Envoyer">
</form>
