<?php

require'head_admin.php';

if (!empty($_SESSION['erreur'])) {
    echo '<p class="erreur">'.$_SESSION['erreur'].'</p>';
    unset ($_SESSION['erreur']);
}

?>

<div class="bg-light m-5 p-5 border rounded mh-10 d-flex flex-column align-items-center">
    <h3>Clé actuel</h3>

<form action="admin/encode.php" method="POST" class="w-50">
    <input class="form-control" placeholder="La phrase final qu'il faudra trouver " type="text" name="finalSentence" required/><br>
    <input class="form-control" placeholder="La phrase qui servira en encoder" type="text" name="keyPass" required/><br>
    <input class="form-control" placeholder="Nombre de salles/indices a donner" type="text" name="nb" required/><br>
    <input type="submit" value="Envoyer" class="btn btn-primary float-end">
</form>

</div>
