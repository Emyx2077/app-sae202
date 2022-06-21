<?php require'../head.php';

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

//div pour valider un nouvel indice
?>

<div class="d-flex justify-content-center flex-wrap mt-5">

    <div class="bg-light mt-5 m-2 p-5 border rounded w-25 d-flex flex-column align-items-center" style="min-width: 300px; max-height: 350px">
        <h3 class="text-center">Votre photo d'équipe</h3><br>
        <?php
        //photo du groupe
        //si une photo a déjà été up on la montre, sinon on affiche le form pour en up une

        $path = showTeamImg($co);

        if (!empty($path)) {
            //echo '<h3 class="text-center">Votre photo d\'équipe</h3><br>';
            echo '<a href="'.$path.'"><img class="img-thumbnail p-2" style="width :200px" src="'.$path.'"></a>';
        } else {


            if (!empty($_SESSION['erreurImg'])) {
                echo '<p class="text-danger">'.$_SESSION['erreurImg'].'</p>';
                unset ($_SESSION['erreurImg']);
            }
            ?>

            <form action="profil/photo.php" method="post" enctype="multipart/form-data">
                <div class="input-group mb-3 w-100">
                    <input type="file" class="form-control" id="inputGroupFile02" name="pic" required>
                </div>
                <br><input type="submit" value="Envoyer" class=" m-2 btn btn-primary float-end">
            </form>
        <?php } ?>
    </div>

    <!--ajouter un indice-->
    <div class="bg-light m-2 mt-5 p-5 border rounded mh-10" style="min-width: 350px">
        <h3 class="mb-4 text-center">Ajoute un indice</h3>

        <?php
        $hashkeys = null;

        if ($lignes_resultat>0) {
            echo '<ul class="list-group">';
            while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
                $hashkeys .= $ligne['hashKey'];
                echo '<li class="list-group-item rounded m-1 text-center">'.$ligne['hashKey'].'</li><br>';
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

        <form action="profil/is_valid.php" method="post">
            <input class="form-control" placeholder="Valider un indice" type="text" name="indice" required /><br>
            <input type="submit" value="Envoyer" class="float-end btn btn-primary">
        </form>

    </div>


    <!--déchiffrement final-->
    <div class="bg-light m-2 mt-5 p-5 border rounded mh-10" style="width: 400px; max-height: 520px;">
        <h3 class="mb-4 text-center">Déchiffrement final</h3>

        <?php
        echo '<p class="text-center">La clé encodée : <br><strong style="overflow-wrap: break-word;">'.$hashkeys.'</strong></p>';

        if (!empty($_SESSION['uncode'])) {
            teamFinishing($co, $teamCode);
            echo '<p class="text-success">Bravo vous avez fini l\'aventure !<br></p>
                    <p class="text-center">L\'addresse finale : <br><strong>'.$_SESSION['uncode'].'</strong></p>';
        } elseif (!empty($_SESSION['uncodeStat'])){
            echo '<p class="text-danger text-center">'.$_SESSION['uncodeStat'].'</p>';
            unset($_SESSION['uncodeStat']);
        }

        deconnexion($co);
        ?>

        <form action="profil/is_valid_end.php" method="post" >
            <input class="form-control" placeholder="Entrer la phrase de décodage" type="text" name="pass" required /><br>
            <input type="submit" value="Envoyer" class="float-end btn btn-primary">

            <?php $_SESSION['hash'] = $hashkeys ?>
        </form>


    </div>

</div>


<?php require '../end.php'; ?>



