
<?php
include "../headers.php";
?>


<?php
include "../connection.php";

$sql = "select * from `doctor`";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);?>
<body>
<a class="btn-primary btn-sm text-bold fs-4" href="docinsert.php">Add Doctor</a> <br><br>

<table class="table table-dark table-striped">
    <thead>
        <tr>

            <th >#</th>
            <th >Dr_Name</th>
            <th >Specialist</th>
            <th >Time</th>
            <th >Days</th>
            <th >City</th>
            <th >Avaible_Status</th>
            <th >Picture</th>
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
           
          

            <td> Dr
                <?php echo $res['Dr_Name'];?>
            </td>
          
            <td>
                <?php
                $id = $res['Spe_ID'];
                $sqls = "SELECT * FROM `specialist` WHERE ID = $id";
                $results = mysqli_query($link, $sqls);
                $nums = mysqli_num_rows($results);
                    while ($ss = mysqli_fetch_array($results)) {
                    echo $ss['Name'];
                }?>
            </td>       
              <td>
                <?php echo $res['Timing'];?>
            </td>         <td>
                <?php echo $res['Days'];?>
            </td>         <td>
                <?php 
              $id = $res['Cit_ID'];
                $sqlss = "SELECT * FROM `cities` WHERE ID = $id";
                $resultss = mysqli_query($link, $sqlss);
                $nums = mysqli_num_rows($resultss);
                    while ($sss = mysqli_fetch_array($resultss)) {
                    echo $sss['Name'];
                }

                ?>
            </td>     
               <td>
                <?php echo $res['Avaible_Status'];?>
            </td>   
                 <td>
                    <img height="30px" width="30px" src="images/<?php echo $res['Pic'];?>" alt="<?php echo $res['Pic'];?>">
                
            </td>
          
            <td>
                <button class="btn-primary btn-sm" name= "delete"> <a class="text-white" href="docdele.php?ID=<?php
            echo $res['ID'];?>"> Delete</a> </button>
           </td>
            <td>
            <a class="text-white" href="docupd.php?ID=<?php
            echo $res['ID'];?>">  <button class="btn-primary btn-sm"> Update</button></a> 
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

</body>