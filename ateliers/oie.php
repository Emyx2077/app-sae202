<?php
require'../head.php';

$co = connexion();
$teamCode = $_SESSION['teamCode'];

if (empty($teamCode)){
    header('location:../board.php');
    $_SESSION['board'] = "Vous devez être connecté pour faire cette action";
    die();
}

echo '<h1 class="text-center text-white mt-4">Bienvenue dans le royaume de l\'Oie</h1>';

echo '<div class="d-flex flex-column align-items-center">
        <div class="bg-light m-5 mt-5 p-5 border rounded w-75 p-4 m-5" style="margin-top: 0px; max-width: 550px">
        <h3 class="mb-4 text-center text-black">Code de la salle</h3>';

if (!empty($_SESSION['erreur'])) {
    echo '<p class="text-danger">'.ucfirst($_SESSION['erreur']).'</p>';
    unset ($_SESSION['erreur']);
}elseif (!empty($_SESSION['success'])){
    echo '<p class="text-success">'.ucfirst($_SESSION['success']).'</p>';
    unset ($_SESSION['success']);
}

echo '<p class="text-center"><span id="joinStatus" class=""></span></p>';

echo '<form id="join">
                    <input id="textArea" class="form-control" max="999" placeholder="A côté de la porte (ex 205)" type="number" name="roomCode" required/><br>
                    <input type="submit" value="Envoyer" class="btn btn-primary float-end">
                </form>';

echo '</div>';

?>

        <div class="bg-light mt-5 m-2 p-5 border rounded w-25" style="min-width: 400px; max-height: 390px">

            <?php
            $path = showRobotImg($co);

            if (!empty($path)) {
                echo '<h3 class="text-center">Votre Portrait robot</h3><br>';
                echo '<a href="'.$path.'"><img class="img-thumbnail" style="width :200px" src="'.$path.'"></a>';

                $req = 'SELECT hashHint from hash WHERE hashRoomCode=9;';

                try {
                    $resultat=$co->query($req); // exécuter la requête
                } catch (PDOException $e) {
                    print "Erreur : ".$e->getMessage().'<br />';
                    die();
                }

                $resultat = $resultat->fetch(PDO::FETCH_ASSOC);

                echo '<br><br><p class="text-center">Indice : '.$resultat['hashHint'].'</p>';

            } else {
                echo '<form action="ateliers/portrait.php" method="post" enctype="multipart/form-data">
                        <h3>Votre portrait robot</h3><br>
                        <div class="input-group mb-3 w-100">
                        <input type="file" class="form-control" id="inputGroupFile02" name="pic" required>
                        </div>
                <br><input type="submit" value="Envoyer" class=" m-2 btn btn-primary float-end">
            </form>';
            }
            ?>

        </div>

        <div class="bg-light m-5 mt-5 p-5 border rounded mh-10" style="max-width: 350px; height : 280px;">
            <h3 class="mb-4 text-center text-black">[Bonus] Imposteur</h3>

            <?php
                if (!empty($_SESSION['imposteur'])) {
                echo '<p>'.ucfirst($_SESSION['imposteur']).'</p>';
                }
                ?>

            <form action="ateliers/imposteur.php" method="post">
                <input class="form-control" placeholder="Qui est l'imposteur" type="text" name="imposteur" required /><br>
                <input type="submit" value="Envoyer" class="btn float-end btn-primary" >
            </form>

        </div>


        <!--Valider l'indice-->
        <div class="bg-light m-5 mt-5 p-5 border rounded mh-10" style="max-width: 350px; height : 250px;">
            <h3 class="mb-4 text-center text-black">Valider l'indice</h3>

            <form action="profil/is_valid.php" method="post">
                <input class="form-control" placeholder="Valider un indice" type="text" name="indice" required /><br>
                <input type="submit" value="Envoyer" class="float-end btn btn-primary">
            </form>

        </div>

    </div>
    <script src="js/join_activity.js"></script>

<?php require '../end.php'; ?>