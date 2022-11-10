<?php
    include "../connection.php";
    include "../headers.php";
    ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])) {
    
    
            $NAME = $_POST['NAME'];
         
         
    
    $link = new mysqli($servername, $username, $password, $dbname);
    
    $sql = "INSERT INTO `specialist`(`Name`) VALUES ('$NAME')";
     $result = mysqli_query($link, $sql);
            

     echo "<script >
window.location = 'specinsert.php';
</script>";
    }
    
    
    }



?>
<body>

    <div class="container">
    
    <form action="" method="post">
        <div class="mb-3">

            <label for="NAME" class="form-label">Specialist</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name="NAME">
            <br>
            <button type="submit" name="save" class="btn btn-primary">Submit</button>
        </div>
    </form> <br>

</div>
<div class="container">


<?php
include "../connection.php";
$sql = "select * from `specialist`";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);?>
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
<button class="btn-primary btn-sm" name= "delete"> <a class="text-white" href="spedelete.php?ID=<?php
            echo $res['ID'];?>"> Delete</a> </button>
           </td>
            <td>
                <button class="btn-primary  btn-sm"> <a class="text-white" href="specupd.php?ID=<?php
            echo $res['ID'];?>"> Update</a> </button>
            </td>
        </tr>

        <?php
    }


?>

    </tbody>
</table>        
</div>

<?php
include "../footer.php";
?>

</body>

