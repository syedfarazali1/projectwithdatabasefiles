<?php
include "../headers.php";
?>

<?php
include "../connection.php";
$sql = "select * from `cities`";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);?>
<a class="btn-primary btn-sm text-bold fs-4" href="Index.php">Add City</a> <br><br>
<table class="table table-dark table-striped">
    <thead>
        <tr>

            <th >#</th>
            <th >First</th>
            <th colspan="2">Action</th>
            

        </tr>
    </thead>
    <tbody>

        <?php
    while ($res = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <th >
                <?php echo $res['ID'];?>
            </th>
            <td>
                <?php echo $res['Name'];?>
            </td>
            <td>
            <a class="text-white" href="citdel.php?ID=<?php
            echo $res['ID'];?>">  <button class="btn-primary btn-sm" name= "delete">  Delete </button></a>
           </td>
            <td>
            <a class="text-white" href="citupd.php?ID=<?php
            echo $res['ID'];?>">    <button class="btn-primary btn-sm">  Update </button></a>
            </td>
        </tr>

        <?php
    }


?>

    </tbody>
</table>
<?php
include "../footer.php";
?>