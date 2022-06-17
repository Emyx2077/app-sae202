<?php

require'head_admin.php';

$splitSentence = $_SESSION['split'];

$size = sizeof($splitSentence);
$_SESSION['size'] = $size;


echo '<div class="d-flex flex-column align-items-center" style="margin-top: 150px">';
    echo '<form action="admin/create_hint_valider.php" method="POST">';

        for ($i = 0; $i < $size; $i++ ){
            echo 'bout de key : "'.$splitSentence[$i].'"<br>';
            echo 'Code de la salle<br>';
            echo '<input type="text" name="location'.$i.'" required/><br>';
            echo 'indice (clé donné a la fin d\'une activité)<br>';
            echo '<input type="text" name="hint'.$i.'" required/><br><br>';
        }

        echo '<input type="submit" value="Envoyer">';
    echo '</form>';
    echo '</div>';

require '../end.php';
