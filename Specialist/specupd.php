<?php
include "../headers.php";
?>

<body>

    <div class="container">


        <?php
include "../connection.php";
$link = new mysqli($servername, $username, $password, $dbname);
        $ID = $_GET['ID'];       
        $sql = "select * from specialist where `ID` = $ID";
        $run =  mysqli_query($link,$sql);  
        $data = mysqli_fetch_array($run);

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     if (isset($_POST['update'])) 
     {
        $ID = $_POST['ID'];
        $NAME = $_POST['NAME'];       
    
        $link = new mysqli($servername, $username, $password, $dbname);
    
         $sql = "UPDATE `specialist` SET `Name`='$NAME'WHERE id= $ID";
         $result = mysqli_query($link, $sql);
        
         echo "<script >
window.location = 'specinsert.php';
</script>";
      }
    
    
     }

        ?>
 <form action="" method="post">
        <div class="mb-3">
            <input type="hidden" class="form-control"  aria-describedby="emailHelp" value="<?php echo $data[0]?>" name="ID">
            <label for="NAME" class="form-label">NAME</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" value="<?php echo $data[1]?>" name="NAME">
           
            <br>
            <button type="submit" name="update" class="btn btn-primary">Submit</button>
        </div>
    </form> <br>

         <br>

         <div class="container-fluid">


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

        </tbody>
        </table>
    </div>
    <?php
include "../footer.php";
?>

</body>

