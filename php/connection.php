<?php

    function connect_db(){

        $server='localhost';
        $username='root';
        $password='';
        $database='coursehub';
    
        $connection=new mysqli($server,$username,$password,$database);
    
        if($connection->connect_error)
        {
            die("Connection failed: " . $connection->connect_error);
        }
        return $connection;
    }
?>