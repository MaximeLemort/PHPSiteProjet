<?php
try{
    //require_once '../controleur/classConnection.php';
    require '../config/config.php';
    require('../config/Autoload.php');
    Autoload::charger();
    $con = new classConnection($base, $login, $mdp);
    echo 'OK<br>';

    $query = "Select titre, id from Article";
    $query2 = "insert into article values(1, 'Pancakes', 'Gauffres Pates Omelette du Fromage Baguette avec le puree de camembert.', CURRENT_DATE )";
    /*
    $stmt = $con->prepare($query2);
    $stmt->bindValue(titre, 'math', PDO::PARAM_STR);
    $stmt->bindValue(id, '5', PDO::PARAM_INT);
    $stmt->execute();
    */
    $ret = $con->executeQuery($query2,array(':titre'=>array('titre', PDO::PARAM_STR), ':id'=>array('id', PDO::PARAM_INT)));

    /*$result = $con->getResults();
    foreach ($result as $row) {
        echo $row['titre'];
        echo " ";
        echo $row['id'];
        echo '<br>';
    }*/

    $ret = $con->executeQuery($query, array(':titre'=>array('titre', PDO::PARAM_STR), ':id'=>array('id', PDO::PARAM_INT)));
    $res = $con->getResults();
    foreach ($res as $row) {
        echo $row['titre'];
        echo " ";
        echo $row['id'];
        echo '<br>';
    }

} catch (PDOException $e)
{
    $TMessage[]=$e->getMessage();
    require '../vue/erreur.php';
}

