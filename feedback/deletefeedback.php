<?php
include "../connection.php";

$conn = new mysqli($servername, $username, $password, $dbname);
        $ID = $_GET['ID'];       
     $sql= " Delete FROM `feedback` WHERE ID =$ID";
       
        $run =  mysqli_query($conn,$sql); 
        echo "<script >
    window.location = 'select-feedback.php';
    </script>";
        ?>