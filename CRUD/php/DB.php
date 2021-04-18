<?php

function Createdb(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bookstore";

    $connect = mysqli_connect($servername, $username, $password, $dbname);

    if(!$connect){
        die("Connection failed:".mysqli_connect_error());
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    if(mysqli_query($connect, $sql)){
        $connect = mysqli_connect($servername, $username, $password, $dbname);
        $sql = "
                CREATE TABLE IF NOT EXISTS books(
                    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                    book_title VARCHAR (25) NOT NULL,
                    book_publisher VARCHAR(20),
                    book_price FLOAT
                );
        ";
        if(mysqli_query($connect , $sql)){
            return $connect;
        }else {
            echo "Not able to create table.";
        }
    }else{
        echo "Error creating database".mysqli_error($connect);
    }
}