<?php require'../head.php'; ?>

<?php
    if (!empty($_SESSION['erreur'])) {
        echo '<p class="erreur">'.$_SESSION['erreur'].'</p>';
        unset ($_SESSION['erreur']);
    }

//afficher si ils existent les bouts de clé déjà présents

$teamCode = $_SESSION['teamCode'];
$co=connexion();

$req = 'SELECT * FROM hash INNER JOIN hashAccess ON hash.hashId = hashAccess.hashId WHERE teamCode="'.$teamCode.'" ORDER BY hash.hashId ASC;';

try {
    $resultat=$co->query($req); // exécuter la requête
    $lignes_resultat = $resultat->rowCount();
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}


if ($lignes_resultat>0) {
    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
        echo $ligne['hashId'].' ';
        echo $ligne['hashKey'].'<br>';
    }
} else {
    echo '<p>Pas de résultat !</p>'; }

deconnexion($co);


//valider une nouvelle key
?>
<form action="is_valid.php" method="post">
    Bout de code obtenu lors de l'atelier <input type="text" name="indice" /><br>
    <input type="submit" value="Envoyer">
</form>


<!--si pas de photo de team
uploader la photo de groupe de la team-->
<form action="photo.php" method="post" enctype="multipart/form-data">
    La photo de votre groupe <input type="file" name="pic" /><br>
    <input type="submit" value="Envoyer">
</form>

<!--sinon la montrer-->
