<?php

require'head_admin.php';

//reccuprer et encoder en base64 la phrase final
$base64sentence = base64_encode($_POST['finalSentence']);
$password = $_POST['keyPass'];
$nbRoom = $_POST['nb'];

//encodage via password
$method = METHOD;
$iv = IV; //à peut être modifier

$encData = openssl_encrypt($base64sentence, $method, $password, false, $iv);

//echo $encData.'<br>';


//calcul longueur phrase final, encoder base64 et vigenere
$encDataStrLength = strlen($encData);

//echo $encDataStrLength.'<br>';

if ($encDataStrLength < $nbRoom){
    $_SESSION['erreur'] = "phrase finale trop courte par rapport au nombre de salle";
    header('location:key_create.php');
}


//calcul pour savoir en combien de morceau diviser la clé
$cutIn =  $encDataStrLength / $nbRoom;

//echo $cutIn.'<br>';

//on log la phrase encoder en X suite X caract
$_SESSION['split'] = str_split($encData,  $cutIn);

header('location:create_hint.php');



