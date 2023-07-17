<?php

require 'connection.php';

class Customer
{
    private $name;
    private $email;
    private $password;
    private $connection;

    function __construct()
    {
        $this->connection=connect_db();
    }
    function signup($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;

        $selectquery="SELECT * FROM customers WHERE email='$this->email'";
        $result=$this->connection->query($selectquery);
        $count=$result->num_rows;

        if($count){
            echo '<script>alert("Email already registered")</script>';
            echo '<script>window.location.href="signup.php"</script>';
        }

        $hash_password=password_hash($this->password,PASSWORD_BCRYPT);
        $insertquery = "INSERT INTO customers VALUES('','$this->name','$this->email','$hash_password')";

        if ($this->connection->query($insertquery) === TRUE) {
            return 1;
        } else {
            return 0;
        }
    }

    function login($email,$password){

        $this->email=$email;
        $this->password=$password;
        
        $selectquery="SELECT * FROM customers WHERE email='$this->email'";
        $result=$this->connection->query($selectquery);
        if($result->num_rows)
        {
            $row=$result->fetch_assoc();
            $db_password=$row['password'];
            $password_check=password_verify($this->password,$db_password);
            
            if($password_check){

                session_start();
                $_SESSION['Isloggedin']= true;
                $_SESSION['email']=$row['email'];
                $_SESSION['customer_name']=$row['customer_name'];
                return 1;
            }
            else
            {
                return 0;
            }

        }
        else{
            return 0;
        }
    }
}
