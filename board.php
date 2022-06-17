<?php
require'head.php';

if(empty($_SESSION['userId'])){
    header('location:index.php');
}

?>

<div class="d-flex flex-column flex-lg-row align-items-center justify-content-around" style="margin-top: 100px">

    <div class="piaf m-5">
        <a class="text-decoration-none" href="ateliers/mouette.php">
            <div class="text-white text-center p-4 text-piaf">
                <h5>Royaume de la mouette</h5>
                <img class="my-3" src="img/mouette.svg" alt="mouette">
                <p><span id="mouette"></span> / 5</p>
            </div>
        </a>
    </div>

    <div class="piaf m-5">
        <a class="text-decoration-none" href="ateliers/oie.php">
            <div class="text-white text-center p-4 text-piaf">
                <h5>Royaume de l'oie</h5>
                <img class="my-3" src="img/oie.svg" alt="oie">
                <p><span id="oie"></span> / 5</p>
            </div>
        </a>
    </div>

    <div class="piaf m-5">
        <a class="text-decoration-none" href="ateliers/pingouin.php">
            <div class="text-white text-center p-4 text-piaf">
                <h5>Royaume du pingouin</h5>
                <img class="my-3" src="img/pinguin.svg" alt="pinguin">
                <p><span id="pingouin"></span> / 5</p>
            </div>
        </a>
    </div>

    <div class="piaf m-5">
        <a class="text-decoration-none" href="ateliers/pintade.php">
            <div class="text-white text-center p-4 text-piaf">
                <h5>Royaume de la pintade</h5>
                <img class="my-3" src="img/pintade.svg" alt="pintade">
                <p><span id="pintade"></span> / 5</p>
            </div>
        </a>
    </div>

    <div class="piaf m-5">
        <a class="text-decoration-none" href="ateliers/poule.php">
            <div class="text-white text-center p-4 text-piaf">
                <h5>Royaume de la poule</h5>
                <img class="my-3" src="img/poule.svg" alt="poule">
                <p><span id="poule"></span> / 5</p>
            </div>
        </a>
    </div>

</div>


<script src="js/get.js"></script>

<?php require 'end.php'; ?>
