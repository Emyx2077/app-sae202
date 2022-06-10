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
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo '<ul>';
            echo '<li>'.$ligne['userId'].'</li>';
            echo '<li>'.$ligne['userPrenom'].'</li>';
            echo '<li>'.$ligne['userNom'].'</li>';
            echo '<li>'.$ligne['userTeamId'].'</li>';
            echo '</ul>';
        }
    } else {
        echo '<p>Pas de résultat !</p>'; }
}

/*function afficherTeams($mabd, $req) {

    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : '.$e->getMessage().'</p>'; die();
        die();
    }

    $lignes_resultat = $resultat->rowCount();
    if ($lignes_resultat>0) {
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
            echo '<ul>';
            echo '<li>'.$ligne['teamId'].'</li>';
            echo '<li>'.$ligne['teamNom'].'</li>';
            echo '<li>'.$ligne['teamLvl'].'</li>';
            echo '<li>'.$ligne['teamNbPlayers'].'</li>';
            echo '<li>'.$ligne['teamCode'].'</li>';
            echo '</ul>';
        }
    } else {
        echo '<p>Pas de résultat !</p>'; }
}*/

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
        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
            $hashKey .= $ligne['hashKey'];
            echo '<ul>';
            echo '<li>'.$ligne['hashId'].'</li>';
            echo '<li>'.$ligne['hashKey'].'</li>';
            echo '<li>'.$ligne['hashIndice'].'</li>';
            echo '<li>'.$ligne['hashHint'].'</li>';
            echo '</ul>';
        }
        return $hashKey;
    } else {
        echo '<p>Pas de résultat !</p>'; }
}