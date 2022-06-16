<?php
require'head.php';

if(empty($_SESSION['userId'])){
    header('location:index.php');
}

?>

<div class="d-flex flex-column flex-lg-row align-items-center justify-content-around" style="margin-top: 100px">

    <div class="piaf m-5">
        <a href="ateliers/mouette.php"><img src="img/mouette.svg" alt="mouette"></a>
        <div class="text-white text-center p-4 text-piaf">
            <h5>Royaume de la mouette</h5>
            <p><span id="mouette"></span> / 5</p>
        </div>
    </div>

    <div class="piaf m-5">
        <a href="ateliers/oie.php"><img src="img/oie.svg" alt="oie"></a>
        <div class="text-white text-center p-4 text-piaf">
            <h5>Royaume de l'oie</h5>
            <p><span id="oie"></span> / 5</p>
        </div>
    </div>

    <div class="piaf m-5">
        <a href="ateliers/pingouin.php"><img src="img/pinguin.svg" alt="pinguin"></a>
        <div class="text-white text-center p-4 text-piaf">
            <h5>Royaume du pingouin</h5>
            <p><span id="pingouin"></span> / 5</p>
        </div>
    </div>

    <div class="piaf m-5">
        <a href="ateliers/pintade.php"><img src="img/pintade.svg" alt="pintade"></a>
        <div class="text-white text-center p-4 text-piaf">
            <h5>Royaume de la pintade</h5>
            <p><span id="pintade"></span> / 5</p>
        </div>
    </div>

    <div class="piaf m-5">
        <a href="ateliers/poule.php"><img src="img/poule.svg" alt="poule"></a>
        <div class="text-white text-center p-4 text-piaf">
            <h5>Royaume de la poule</h5>
            <p><span id="poule"></span> / 5</p>
        </div>
    </div>

</div>


<script src="js/get.js"></script>

<?php require 'end.php'; ?>
