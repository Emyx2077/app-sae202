<?php require 'head.php';

if (!empty($_SESSION['userId'])){
    header('location:board.php');
}

?>

<h1>test</h1>
<a href="login.php">login</a>