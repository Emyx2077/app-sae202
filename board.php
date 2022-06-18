<?php
require'head.php';

if(empty($_SESSION['userId'])){
    header('location:index.php');
}

if (!empty($_SESSION['board'])){
    echo '<div class="bg-light m-5 p-2 border rounded "><h2 class="text-danger text-center">'.$_SESSION['board'].'</h2></div>';
    unset($_SESSION['board']);
}

?>

<div class="d-flex flex-row align-items-center justify-content-center flex-wrap" style="margin-top: 100px">

    <div class="piaf m-5">
        <a class="text-decoration-none" href="ateliers/mouette.php">
            <div class="text-white text-center p-4 text-piaf">
                <h5>Royaume de la mouette</h5>
                <img class="my-3" id="mouette" src="img/mouette.svg" alt="mouette">
                <p><span id="mouette"></span> / 5</p>
            </div>
        </a>
    </div>

    <div class="piaf m-5">
        <a class="text-decoration-none" href="ateliers/oie.php">
            <div class="text-white text-center p-4 text-piaf">
                <h5>Royaume de l'oie</h5>
                <img class="my-3" id="oie" src="img/oie.svg" alt="oie">
                <p><span id="oie"></span> / 5</p>
            </div>
        </a>
    </div>

    <div class="piaf m-5">
        <a class="text-decoration-none" href="ateliers/pingouin.php">
            <div class="text-white text-center p-4 text-piaf">
                <h5>Royaume du pingouin</h5>
                <img class="my-3" id="pinguin" src="img/pinguin.svg" alt="pinguin">
                <p><span id="pingouin"></span> / 5</p>
            </div>
        </a>
    </div>

    <div class="piaf m-5">
        <a class="text-decoration-none" href="ateliers/pintade.php">
            <div class="text-white text-center p-4 text-piaf">
                <h5>Royaume de la pintade</h5>
                <img class="my-3" id="pintade" src="img/pintade.svg" alt="pintade">
                <p><span id="pintade"></span> / 5</p>
            </div>
        </a>
    </div>

    <div class="piaf m-5">
        <a class="text-decoration-none" href="ateliers/poule.php">
            <div class="text-white text-center p-4 text-piaf">
                <h5>Royaume de la poule</h5>
                <img class="my-3" id="poulet" src="img/poule.svg" alt="poule">
                <p><span id="poule"></span> / 5</p>
            </div>
        </a>
    </div>

</div>


<script src="js/getRoomStatus.js"></script>

<?php require 'end.php'; ?>
