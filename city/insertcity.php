<?php
include "../connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['save'])) {


        $NAME = $_POST['NAME'];
       
     

$link = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO `cities`(`Name`) VALUES ('$NAME')";
 $result = mysqli_query($link, $sql);
        
 echo "<script >
         window.location = 'Index.php';
         </script>";
        }


}


?>  
