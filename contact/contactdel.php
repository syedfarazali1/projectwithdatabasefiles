
<?php
include "../connection.php";
$ID = $_GET['ID'];

       
$link = new mysqli($servername, $username, $password, $dbname);

 $sql = "DELETE FROM contact_us WHERE `ID` = $ID";
    
mysqli_query($link, $sql);

echo "<script >
window.location = 'contactselect.php';
</script>";






?>  