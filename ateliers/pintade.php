<?php
require'../head.php';

$co = connexion();
$teamCode = $_SESSION['teamCode'];

if (empty($teamCode)){
    header('location:../board.php');
    $_SESSION['board'] = "Vous devez avoir une team pour faire cette action";
    die();
}

echo '<h1 class="text-center text-white" style="margin: 100px 0px 50px 0px">Bienvenue dans le royaume de la Pintade</h1>';

echo '<div class="d-flex flex-column align-items-center">';



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
            <h3>Question pour un caneton</h3>

            Vous arrivez dans cette étrange salle, quand tout à coup une étrange créature à plume arrive en hurlant<br>
            <strong>“Attention, il est bientôt l’heure pour notre grand quiz de culture général MMI-esque”</strong><br><br>

            Vous allez devoir ici affronter une autre équipe dans un quiz, installez-vous et suivez les directives des animateurs !<br><br>

            Pas de panique, tous les participants recevront l’indice pour la clé.<br>
            Cependant l’équipe qui ressortira vainqueur se verra remettre un code bonus lui rapportant des points supplémentaires.<br>

        </p>
    </div>

    <!--input code gagnant-->
    <div class="bg-light m-5 mt-5 p-5 border rounded w-75" style="margin-top: 0px; max-width: 550px">
        <h3 class="mb-4 text-center text-black">Pour les heureux gagnants</h3>
        <?php
        if (!empty($_SESSION['question'])) {
            echo '<p>' . ucfirst($_SESSION['question']) . '</p>';
            unset ($_SESSION['question']);
        }

        echo '<form action="ateliers/question_gagnant.php" method="post">
                    <input class="form-control" max="999" placeholder="Si vous avez gagnez" type="text" name="win" required/><br>
                    <input type="submit" value="Envoyer" class="btn btn-primary float-end">
                </form>';
        echo '</div>';
        ?>


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