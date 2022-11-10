
<?php
include "../connection.php";
$ID = $_GET['ID'];

       
$link = new mysqli($servername, $username, $password, $dbname);

 $sql = "DELETE FROM patient WHERE `ID` = $ID";
    
mysqli_query($link, $sql);

echo "<script >
     window.location = 'patselect.php';
     </script>";    






?>  