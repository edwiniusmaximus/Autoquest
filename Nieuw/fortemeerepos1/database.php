<?php


    function connecttodb()
    {

        $db = "mysql:host=localhost;dbname=mydb;port=3306";
        $user = "root";
        $pass = "root";
        return $pdo = new PDO($db, $user, $pass);
    }





