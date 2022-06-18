<?php
require'../head.php';

$co = connexion();
$teamCode = $_SESSION['teamCode'];

if (empty($teamCode)){
    header('location:../board.php');
    $_SESSION['board'] = "Vous devez être connecté pour faire cette action";
    die();
}

echo '<h1 class="text-center text-white" style="margin: 100px 0px 50px 0px">Bienvenue dans le royaume de la Pintade</h1>';

echo '<div class="d-flex flex-column align-items-center">';



        echo '<div class="bg-light m-5 mt-5 p-5 border rounded w-75 p-4 m-5" style="margin-top: 0px; max-width: 550px">
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
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ea esse labore laboriosam
            obcaecati omnis saepe, vitae? A consequuntur, culpa enim eum iste magnam nostrum quasi
            quis quos sint suscipit tenetur velit vero, voluptate voluptates? Culpa facere fugit incidunt
            iure minus non odio rerum tempora! Consectetur possimus, tempora! Ab corporis debitis,
            dolore dolores ea eaque, in ipsam ipsum quas, quasi saepe sequi? Dolore libero nisi
            ratione reiciendis vel velit veritatis! A ad adipisci aperiam aspernatur atque blanditiis
            cumque cupiditate dolor expedita explicabo iusto laboriosam maiores modi nam nesciunt
            nostrum omnis quam quidem quo repellat sint tempora, totam voluptas! Explicabo, ipsa, reiciendis!
        </p>
    </div>

    <!--input code gagnant-->
    <div class="bg-light m-5 mt-5 p-5 border rounded w-75 p-4 m-5" style="margin-top: 0px; max-width: 550px">
        <h3 class="mb-4 text-center text-black">Pour les heureux gagnants</h3>
        <?php
        if (!empty($_SESSION['question'])) {
            echo '<p>' . ucfirst($_SESSION['question']) . '</p>';
            unset ($_SESSION['question']);
        }

        echo '<form action="question_gagnant.php" method="post">
                    <input class="form-control" max="999" placeholder="Si vous avez gagnez" type="text" name="win" required/><br>
                    <input type="submit" value="Envoyer" class="btn btn-primary float-end">
                </form>';
        echo '</div>';
        ?>


    <!--Valider l'indice-->
    <div class="bg-light m-5 mt-5 p-5 border rounded mh-10" style="max-width: 350px; height : 250px;">
        <h3 class="mb-4 text-center text-black">Valider l'indice</h3>

        <form action="../profil/is_valid.php" method="post">
            <input class="form-control" placeholder="Valider un indice" type="text" name="indice" required /><br>
            <input type="submit" value="Envoyer" class="float-end btn btn-primary">
        </form>

    </div>

    </div>
    <script src="js/join_activity.js"></script>

<?php require '../end.php'; ?>