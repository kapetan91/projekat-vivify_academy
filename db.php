<?php

function getConnection(){


    $servername = "127.0.0.1";
    $username = "root";
    $password = "vivify";
    $dbname = "zavrsni_projekat";

    try {
        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }   
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
    return $connection;
}
function getPreparedStatement($sql){
    $connection = getConnection();
    $statement = $connection->prepare($sql);
    $statement->execute();
    
    return $statement;
}

function fetchAll($sql){
    return getPreparedStatement($sql)->fetchAll();
}

function fetch($sql){
    return getPreparedStatement($sql)->fetch();
}

function executeQuery($query){
    getPreparedStatement($query);
}


?>

