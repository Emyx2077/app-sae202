<?php

require'head_admin.php';

if (!empty($_SESSION['erreur'])) {
    echo '<p class="erreur">'.$_SESSION['erreur'].'</p>';
    unset ($_SESSION['erreur']);
}

?>

<form action="encode.php" method="POST">
    La phrase final qu'il faudra trouver <input type="text" name="finalSentence" /><br>
    la phrase qui servira en encoder (vigenere) <input type="text" name="keyPass" /><br>
    nombre de salle/indices a donner <input type="text" name="nb" /><br>
    <input type="submit" value="Envoyer">
</form>
