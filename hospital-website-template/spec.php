<?php
include "../connection.php";
$sql = "select * from `specialist`";
$query = mysqli_query($link, $sql);
$str = "";
while ($row = mysqli_fetch_assoc($query)) {
    $str .= " <option value='{$row['ID']}'>{$row['Name']}</option>";
}
echo $str;
?>
<?php
include "../connection.php";
$sql = "select * from `specialist`";
$query = mysqli_query($link, $sql);
$str = "";
while ($row = mysqli_fetch_assoc($query)) {
    $str .= " <option value='{$row['ID']}'>{$row['Name']}</option>";
}
echo $str;
?>