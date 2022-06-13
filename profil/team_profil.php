<?php require'../head.php'; ?>

<?php

//afficher s'ils existent les bouts de clé déjà présents

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

echo '<div class="background d-flex justify-content-center flex-wrap">
        <div class="bg-light m-2 mt-5 p-5 border rounded" style="min-width: 400px">
        <h3 class="mb-4">Ajoute un indice</h3>';


        if ($lignes_resultat>0) {
            echo '<ul class="list-group">';
            while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
                echo '<li class="list-group-item">'.$ligne['hashId'].' - ';
                echo $ligne['hashKey'].'</li><br>';
            }
            echo '</ul>';
        } else {
            echo '<p>Aucune clé découverte pour le moment</p>'; }

        //display si l'indice existe déjà

        if (!empty($_SESSION['erreur'])) {
            echo '<p class="text-danger">'.$_SESSION['erreur'].'</p>';
            unset ($_SESSION['erreur']);
        }

        //valider une nouvelle key
        ?>
        <form action="is_valid.php" method="post">
            <input class="form-control" placeholder="Valider un indice" type="text" name="indice" required /><br>
            <input type="submit" value="Envoyer" class="float-right btn btn-primary">
        </form>

    </div>



    <div class="bg-light mt-5 m-2 p-5 border rounded" style="min-width: 400px; max-height: 350px">

        <?php
        //si une photo a déjà été up on la montre, sinon on affiche le form pour en up une

        $req = 'SELECT uploadImg FROM upload WHERE uploadTeamCode = "'.$_SESSION['teamCode'].'";';

        try {
            $resultat=$co->query($req); // exécuter la requête
            $lignes_resultat = $resultat->rowCount();
        } catch (PDOException $e) {
            print "Erreur : ".$e->getMessage().'<br />';
            die();
        }

        $lignes_resultat = $resultat->rowCount();

        $resultat=$resultat->fetch(PDO::FETCH_ASSOC);

        deconnexion($co);

        if ($lignes_resultat>0) {
            echo '<h3>Votre photo d\'équipe</h3><br>';
            echo '<a href="img/'.$resultat['uploadImg'].'"><img class="img-thumbnail" style="width :200px" src="img/'.$resultat['uploadImg'].'"></a>';
        } else {


            if (!empty($_SESSION['erreurImg'])) {
                echo '<p class="text-danger">'.$_SESSION['erreurImg'].'</p>';
                unset ($_SESSION['erreurImg']);
            }
            ?>

        <form action="photo.php" method="post" enctype="multipart/form-data">
            <h3>La photo de votre groupe</h3><br>
            <div class="custom-file w-100">
                <input type="file" class="custom-file-input" name="pic" required>
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <br><input type="submit" value="Envoyer" class="float-right m-2 btn btn-primary">
        </form>
    </div>
</div>

<?php } require '../end.php'; ?>



