<?php

require'head_admin.php';

//reccuprer et encoder en base64 la phrase final
$finalSentence = base64_encode($_POST['finalSentence']);
$password = $_POST['keyPass'];
$nbRoom = $_POST['nb'];

$finalSentenceLength = strlen($finalSentence);

if ($finalSentenceLength < $nbRoom){
    $_SESSION['erreur'] = "phrase finale trop courte par rapport au nombre de salle";
    header('location:key_create.php');
}

$cutIn =  $finalSentenceLength / $nbRoom;

/*echo $finalSentenceLength.'<br>';
echo $finalSentence.'<br>';*/

$splitSentence =  str_split($finalSentence,  $cutIn);

$_SESSION['split'] = str_split($finalSentence,  $cutIn);

header('location:create_hint.php');



