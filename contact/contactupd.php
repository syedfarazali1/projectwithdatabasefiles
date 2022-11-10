<?php
include "../headers.php";
?>


<?php
include "../connection.php";
$link = new mysqli($servername, $username, $password, $dbname);
        $ID = $_GET['ID'];       
        $sql = "select * from contact_us where `ID` = $ID";
        $run =  mysqli_query($link,$sql);  
        $data = mysqli_fetch_array($run);

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     if (isset($_POST['update'])) 
     {
    
        $ID = $_POST['id'];
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Massage = $_POST['Massage'];
        $Subject = $_POST['Subject'];
           
         
    
        $link = new mysqli($servername, $username, $password, $dbname);
    
  $sql = "UPDATE `contact_us` SET `Name`='$Name',`Email`='$Email',`Massage`='$Massage' ,`Subject` = '$Subject' WHERE `ID` =  '$ID'";

         $result = mysqli_query($link, $sql);

         echo "<script >
         window.location = 'Index.php';
         </script>";
      }
    
    
     }

        ?>


        <form action="" method="post">
            <div class="mb-3">
                <input type="hidden" class="form-control" id="id" value="<?php echo $data[0]?>"
                    aria-describedby="emailHelp" name="id">
                <label for="NAME" class="form-label">NAME</label>
                <input type="text" class="form-control" id="NAME" value="<?php echo $data[1]?>"
                    aria-describedby="emailHelp" name="Name"> 
                    <label for="NAME" class="form-label">Email</label>
                <input type="text" class="form-control" id="NAME" value="<?php echo $data[2]?>"
                    aria-describedby="emailHelp" name="Email"> 
                    <label for="NAME" class="form-label">Massage</label>
                <input type="text" class="form-control" id="NAME" value="<?php echo $data[3]?>"
                    aria-describedby="emailHelp" name="Massage">     
                       <label for="NAME" class="form-label">Subject</label>
                <input type="text" class="form-control" id="NAME" value="<?php echo $data[3]?>"
                    aria-describedby="emailHelp" name="Subject">

                <br>
                <button type="submit" name="update" class="btn btn-primary">Submit</button>
            </div>
        </form> <br>

           
        <?php
    include "../connection.php";
  $sql = "select * from `contact_us`";
  $result = mysqli_query($link, $sql);
  $num = mysqli_num_rows($result);?>
  <table class="table table-dark table-striped">
    <thead>
        <tr>

            <th >#</th>
            <th >Name</th>
            <th >Email</th>
            <th >Massage</th>
            <th >Subject</th>
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
                <?php echo $res['Email'];?>
            </td>
             <td>
                <?php echo $res['Massage'];?>
            </td><td>
                <?php echo $res['Subject'];?>
            </td>
            <td>
            <a class="text-white" href="contactdel.php?ID=<?php
            echo $res['ID'];?>">  <button class="btn-primary btn-sm" name= "delete">  Delete </button></a>
           </td>
            <td>
            <a class="text-white" href="contactupd.php?ID=<?php
            echo $res['ID'];?>">    <button class="btn-primary btn-sm">  Update </button></a>
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



