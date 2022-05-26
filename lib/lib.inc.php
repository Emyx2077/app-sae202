<?php

session_start();

function connexion(){

    /*try {
        $mabd = new PDO('mysql:host=127.0.0.1;dbname=sae202;charset=UTF8;', USER, PASSWORD);
        $mabd->query('SET NAMES utf8;');
    } catch (PDOException $e) {
        //print "Erreur : vps " . $e->getMessage() . '<br />';
    }*/

    try {
        $mabd = new PDO('mysql:host=localhost;dbname=sae202;charset=UTF8;', 'root', '');
        $mabd->query('SET NAMES utf8;');
        //echo 'connexion successful<br>';
    }  catch(Exception $r) {
        //print "Erreur : localhost " . $r->getMessage() . '<br />';
    }

    return $mabd;
}