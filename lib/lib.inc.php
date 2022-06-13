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

function deconnexion(&$mabd){
    $mabd = null;
}

function sanitize($word){
    $wordLower = mb_strtolower($word);
    $wordSanitize = filter_var($wordLower, FILTER_SANITIZE_STRING);
    $wordFinal = htmlentities($wordSanitize, ENT_QUOTES);

    return $wordFinal;
}

function afficherUsers($mabd, $req) {

    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : '.$e->getMessage().'</p>'; die();
        die();
    }

    $lignes_resultat = $resultat->rowCount();
    if ($lignes_resultat>0) {
        echo '<table>'."\n";
        echo '<thead><th>ID User</th><th>Prenom</th><th>Nom</th><th>ID Team</th></thead>';
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>'.$ligne['userId'].'</td>';
            echo '<td>'.$ligne['userPrenom'].'</td>';
            echo '<td>'.$ligne['userNom'].'</td>';
            echo '<td>'.$ligne['userTeamId'].'</td>';
            echo '</tr>';
        }
        echo '</table>'."\n";
    } else {
        echo '<p>Pas de résultat !</p>'; }
}

function afficherTeams($mabd, $req) {

    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : '.$e->getMessage().'</p>'; die();
        die();
    }

    $lignes_resultat = $resultat->rowCount();
    if ($lignes_resultat>0) {
        echo '<table>'."\n";
        echo '<thead><th>Team id</th><th>Team Nom</th><th>Team lvl</th><th>Team nb players</th><th>team code</th><th>Info team</th></thead>';
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>'.$ligne['teamId'].'</td>';
            echo '<td>'.$ligne['teamNom'].'</td>';
            echo '<td>'.$ligne['teamLvl'].'</td>';
            echo '<td>'.$ligne['teamNbPlayers'].'</td>';
            echo '<td>'.$ligne['teamCode'].'</td>';
            echo '<td><a href="team.php?id='.$ligne['teamId'].'">Voir plus</a></td>';
            echo '</tr>';
        }
        echo '</table>'."\n";
    } else {
        echo '<p>Pas de résultat !</p>'; }
}


function generatePinCode($chars){
    $pin="";
    while ($chars!=0){
        $pin .=rand(0,9);
        $chars--;
    }
    return $pin;
}

function afficherKeys($mabd, $req) {

    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : '.$e->getMessage().'</p>'; die();
        die();
    }

    $hashKey = null;

    $lignes_resultat = $resultat->rowCount();
    if ($lignes_resultat>0) {
        echo '<table>'."\n";
        echo '<thead><th>ID</th><th>Key</th><th>Location</th><th>Indice</th></thead>';
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
            $hashKey .= $ligne['hashKey'];
            echo '<tr>';
            echo '<td>'.$ligne['hashId'].'</td>';
            echo '<td>'.$ligne['hashKey'].'</td>';
            echo '<td>'.$ligne['hashIndice'].'</td>';
            echo '<td>'.$ligne['hashHint'].'</td>';
            echo '</tr>';
        }
        echo '<tr><td colspan="4">'.$hashKey.'</td></tr>';
        echo '</table>'."\n";
    } else {
        echo '<p>Pas de résultat !</p>'; }
}

function showUploads($mabd, $req) {

    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : '.$e->getMessage().'</p>'; die();
        die();
    }

    $lignes_resultat = $resultat->rowCount();
    if ($lignes_resultat>0) {
        echo '<table>'."\n";
        echo '<thead><th>Nom Team</th><th>From</th><th>img</th></thead>';
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>'.$ligne['teamNom'].'</td>';
            echo '<td>'.$ligne['uploadNom'].'</td>';
            echo '<td><img src="../'.$ligne['uploadImg'].'" style="width: 100px;"></td>';
            echo '</tr>';
        }
        echo '</table>'."\n";
    } else {
        echo '<p>Pas de résultat !</p>'; }
}

function showSuspect($mabd, $req){
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : '.$e->getMessage().'</p>'; die();
        die();
    }

        $ligne = $resultat->fetch(PDO::FETCH_ASSOC);
        echo '<table>'."\n";
        echo '<thead><th>ID</th><th>Nom</th><th>Hash Code</th></thead>';
            echo '<tr>';
            echo '<td>'.$ligne['suspectId'].'</td>';
            echo '<td>'.$ligne['suspectNom'].'</td>';
            echo '<td>'.$ligne['suspectHash'].'</td>';
            echo '</tr>';
        echo '</table>'."\n";
}
