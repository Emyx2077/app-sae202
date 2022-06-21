<?php
require'../head.php';

$co = connexion();
$teamCode = $_SESSION['teamCode'];

if (empty($teamCode)){
    header('location:../board.php');
    $_SESSION['board'] = "Vous devez avoir une team pour faire cette action";
    die();
}

echo '<h1 class="text-center text-white" style="margin: 100px 0px 50px 0px">Bienvenue dans le royaume de l\'Oie</h1>';

echo '<div class="d-flex flex-column align-items-center">';

            //join la salle
        echo '<div class="bg-light m-5 mt-5 p-5 border rounded w-75" style="margin-top: 0px; max-width: 550px">
        <h3 class="mb-4 text-center text-black">Code de la salle</h3>';

echo '<p class="text-center"><span id="joinStatus" class=""></span></p>';

echo '<form id="join">
                    <input id="textArea" class="form-control" max="999" placeholder="A côté de la porte (ex 205)" type="number" name="roomCode" required/><br>
                    <input type="submit" value="Envoyer" class="btn btn-primary float-end">
                </form>';

echo '</div>';

?>

    <div class="textAtelier rounded">
        <p>
            <h3>Scène de crime</h3>

            Le conseiller du prince a été assassiné !<br>
            Vous êtes chargé de dresser un portrait robot à l’aide des récits de divers témoins et des éventuels indices présents dans la salle.<br><br>

            Pour cela vous avez à disposition en h009 mais également en h005 et h006 des ordinateurs avec photoshop et illustrator, ou encore du papier.
            Au vue des conditions exceptionnelles, la cour royale vous met à disposition des ressources non négligeable pour vous aider dans votre quête
            <a href="ateliers/ressources/tuto_ps.pdf">[tuto]</a> et <a href="ateliers/ressources/crime.psd">[psd]</a><br><br>
            Une fois complétée, uploadez votre création via le champ dédié ci-dessous, la cour saura vous recompenser dument pour votre service rendu !<br>

            …<br>
            …<br>
            …<br><br>

            <strong>Quand l’imposteur est suspect</strong><br><br>

            Vous trouvez en h009 un moniteur d’ordinateur affichant une drôle d’image.<br>
            Un imposteur se trouve parmi ces personnes, saurez vous le reconnaître ?<br>
            Une fois que vous pensez avoir trouver, entrer son identité dans le champ correspondant ci-dessous.<br>
            Attention vous n’avez le droit qu'à un seul essai !<br>

        </p>
    </div>

        <!--upload portrait robot-->
        <div class="bg-light mt-5 m-2 p-5 border rounded w-25 d-flex flex-column align-items-center" style="min-width: 300px; max-height: 390px">

            <?php
            $path = showRobotImg($co);

            if (!empty($path)) {
                echo '<h3 class="text-center">Votre Portrait robot</h3><br>';
                echo '<a href="'.$path.'"><img class="img-thumbnail p-2" style="width :200px" src="'.$path.'"></a>';

                $req = 'SELECT hashHint from hash WHERE hashRoomCode=9;';

                try {
                    $resultat=$co->query($req); // exécuter la requête
                } catch (PDOException $e) {
                    print "Erreur : ".$e->getMessage().'<br />';
                    die();
                }

                $resultat = $resultat->fetch(PDO::FETCH_ASSOC);

                echo '<p class="text-center">Indice : <span class="text-success">'.$resultat['hashHint'].'</span></p>';

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


        <!--valider imposteur-->
        <div class="bg-light m-5 mt-5 p-5 border rounded mh-10" style="max-width: 350px; max-height : 280px;">
            <h3 class="mb-4 text-center text-black">Imposteur</h3>

            <?php
                if (!empty($_SESSION['imposteur'])) {
                echo '<p>'.ucfirst($_SESSION['imposteur']).'</p>';
                } else {
                    echo '<form action="ateliers/imposteur.php" method="post">
                            <input class="form-control" placeholder="Qui est l\'imposteur" type="text" name="imposteur" required /><br>
                            <input type="submit" value="Envoyer" class="btn float-end btn-primary" >
                           </form>';
                }
                ?>

        </div>


        <!--Valider l'indice-->
        <div class="bg-light mb-5 p-5 border rounded" style="max-width: 350px; height : 250px;">
            <h3 class="mb-4 text-center text-black">Valider l'indice</h3>

            <form action="profil/is_valid.php" method="post">
                <input class="form-control" placeholder="Valider un indice" type="text" name="indice" required /><br>
                <input type="submit" value="Envoyer" class="float-end btn btn-primary">
            </form>

        </div>

    </div>
    <script src="js/join_activity.js"></script>

<?php require '../end.php'; ?>