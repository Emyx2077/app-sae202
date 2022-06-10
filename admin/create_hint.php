<?php

require'head_admin.php';

$splitSentence = $_SESSION['split'];
//unset($_SESSION['split']);

//print_r($splitSentence);

$size = sizeof($splitSentence);

echo '<form action="create_hint_valider.php" method="POST">';

    for ($i = 0; $i < $size; $i++ ){
        echo 'bout de key : "'.$splitSentence[$i].'"<br>';
        echo 'Endroit<br>';
        echo '<input type="text" name="location" /><br>';
        echo 'indice (clé donné a la fin d\'une activité)<br>';
        echo '<input type="text" name="hint" /><br><br>';
    }

    echo '<input type="submit" value="Envoyer">';
echo '</form>';



//drop tt les values de la table

//ajouter les nouvelles keys