<?php
    function dbCon(){
        $dsn = "mysql:host=localhost;dbname=games";
        $user = "root";
        $passwd = "mysql";
        $pdo = new PDO($dsn, $user, $passwd);
        return $pdo;
    }