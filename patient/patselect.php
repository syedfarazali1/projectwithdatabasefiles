
<?php
include "../headers.php";
?>
<?php
include "../connection.php";

$sql = "select * from `patient`";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);?>
<body>
    <div class="container">
    <a class="btn-primary btn-sm text-bold fs-4" href="patinsert.php">Add Patient</a> <br><br>

    <table class="table table-dark table-striped">
    <thead>
        <tr>

            <th >#</th>
            <th >Name</th>
            <th >Images</th>
            <th >Address</th>
            <th >Number</th>
            <th >Age</th>
            <th >City</th>
            <th >Blood Group</th>
            <th >Email</th>
            <th >PASSWORD</th>
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
                    <img height="30px" width="30px" src="images/<?php echo $res['images'];?>" alt="<?php echo $res['images'];?>">
                
            </td>
              <td>
                <?php echo $res['Address'];?>
            </td>         <td>
                <?php echo $res['Ph_Num'];?>
            </td>         <td>
                <?php echo $res['Age'];?>
            </td>         <td>
                <?php 
              echo $res['CIt_Id'];
                ?>
            </td>     
               <td>
                <?php echo $res['Blood Group'];?>
            </td>   
                 <td>
                <?php echo $res['Password'];?>
            </td>
            <td>
                <?php echo $res['Email'];?>
            </td>
            <td>
                <button class="btn-primary btn-sm" name= "delete"> <a class="text-white" href="patdele.php?ID=<?php
            echo $res['ID'];?>"> Delete</a> </button>
           </td>
            <td>
                <button class="btn-primary btn-sm"> <a class="text-white" href="patupd.php?ID=<?php
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