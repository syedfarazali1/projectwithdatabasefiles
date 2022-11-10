<?php
include "../connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['save'])) {


        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Massage = $_POST['Massage'];
        $Subject = $_POST['Subject'];
       
     

$link = new mysqli($servername, $username, $password, $dbname);

$sql = "INSERT INTO `contact_us`( `Name`, `Email`, `Massage`, `Subject`) VALUES ('$Name','$Email','$Massage','$Subject')";
 $result = mysqli_query($link, $sql);
        
 echo "<script >
         window.location = 'Index.php';
         </script>";
        }


}


?>  
