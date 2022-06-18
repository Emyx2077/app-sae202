<?php

require'head_admin.php';

$splitSentence = $_SESSION['split'];

$size = sizeof($splitSentence);
$_SESSION['size'] = $size;


echo '<div class="bg-light p-5 border rounded mh-10 d-flex flex-column align-items-center" style="margin: 150px 100px 50px 100px">';
echo '<h3>Les Salles</h3>';
    echo '<form action="admin/create_hint_valider.php" method="POST">';

        for ($i = 0; $i < $size; $i++ ){
            echo 'bout de key : "'.$splitSentence[$i].'"<br>';
            echo 'Code de la salle<br>';
            echo '<input class="form-control" type="text" name="location'.$i.'" required/><br>';
            echo 'indice (clé donné a la fin d\'une activité)<br>';
            echo '<input class="form-control" type="text" name="hint'.$i.'" required/><br><br>';
        }

        echo '<input type="submit" value="Envoyer" class="btn btn-primary float-end">';
    echo '</form>';
    echo '</div>';

require '../end.php';
