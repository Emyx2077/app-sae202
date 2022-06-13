<?php
require'head.php';

if(empty($_SESSION['userId'])){
    header('location:index.php');
}

?>

<div>

    <div class="piaf">
        <a href="ateliers/mouette.php"><img src="img/mouette.png" alt="mouette"></a>
    </div>

    <div class="piaf">
        <a href="ateliers/oie.php"><img src="img/oie.png" alt="mouette"></a>
    </div>

    <div class="piaf">
        <a href="ateliers/pingouin.php"><img src="img/pinguin.png" alt="mouette"></a>
    </div>

    <div class="piaf">
        <a href="ateliers/pintade.php"><img src="img/pintade.png" alt="mouette"></a>
    </div>

    <div class="piaf">
        <a href="ateliers/poulet.php"><img src="img/poulet.png" alt="mouette"></a>
    </div>

</div>


<?php require 'end.php'; ?>
