<?php require'../head.php';

/*var_dump($_SESSION);
var_dump($_FILES);*/

$co = connexion();

$imageType=$_FILES["pic"]["type"];
if ( ($imageType != "image/png") &&
    ($imageType != "image/jpg") &&
    ($imageType != "image/jpeg") ) {
    echo '<p>Désolé, le type d\'image n\'est pas reconnu !';
    echo 'Seuls les formats PNG et JPEG sont autorisés.</p>'."\n";
    die();
}

$newImg = date("Y_m_d_H_i_s")."---".$_FILES["pic"]["name"];

if(is_uploaded_file($_FILES["pic"]["tmp_name"])) {
    if(!move_uploaded_file($_FILES["pic"]["tmp_name"], "img/".$newImg)) {
        echo '<p>L\image n\'a pas pu être sauvagardé</p>'."\n";
        die();
    }
} else {
    echo '<p>L\image n\'a pas pu être chargé</p>'."\n";
    die();
}

//req pour ajouter a la table
$path = "/profil/img/".$newImg;

$req = 'INSERT INTO upload (uploadNom, uploadTeamId, uploadImg) VALUES ("groupPic", "'.$_SESSION['teamCode'].'", "'.$path.'");';
echo $req;

try {
    $resultat=$co->query($req); // exécuter la requête
} catch (PDOException $e) {
    print "Erreur : ".$e->getMessage().'<br />';
    die();
}

deconnexion($co);
