<?php

    $host = 'localhost';
    $port = 8111;
    $dbname = 'quest';
    $user = 'root';
    $password = '';

    try{
        $dbh = new PDO("mysql:host={$host};port={$port};dbname={$dbname}",$user,$password);
    }
    catch(PDOException $e){
        echo 'Connection Failed: '.$e->getMessage();
    }

?>