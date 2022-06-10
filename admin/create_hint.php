<?php

require'head_admin.php';

$splitSentence = $_SESSION['split'];

$size = sizeof($splitSentence);
$_SESSION['size'] = $size;

echo '<form action="create_hint_valider.php" method="POST">';

    for ($i = 0; $i < $size; $i++ ){
        echo 'bout de key : "'.$splitSentence[$i].'"<br>';
        echo 'Endroit<br>';
        echo '<input type="text" name="location'.$i.'" /><br>';
        echo 'indice (clé donné a la fin d\'une activité)<br>';
        echo '<input type="text" name="hint'.$i.'" /><br><br>';
    }

    echo '<input type="submit" value="Envoyer">';
echo '</form>';



//drop tt les values de la table

//ajouter les nouvelles keys