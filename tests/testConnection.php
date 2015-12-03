<?php
    try{
    require_once 'classConnection.php';
    $con = new classConnection('mysql:host=hina;dbname=dbmalemort1', 'malemort1', 'Curser63');
    echo 'OK<br>';

    $query = "Select :nom; :id from Article";
    
    $ret = $con->executeQuery($query, array(':nom'=>array($nom, PDO::PARAM_STR), ':id'=>array($id, PDO::PARAM_INT)));
    
    $result = $con->getResults();
    foreach ($result as $row) {
    echo $row['nom'];
    echo $row['id'];
        }
    
    } catch (PDOException $e){echo $e->getMessage();}
?>
