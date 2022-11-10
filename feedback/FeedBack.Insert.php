<?php
include "../headers.php";
?>

<?php
     include "../connection.php";

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['save'])) {
            // $Pat_ID = $_POST[Patid];
            $Message = $_POST['Message'];

            $link = new mysqli($servername, $username, $password, $dbname);

  $sql= "INSERT INTO `feedback`(`Massage`,`Pat_ID`) VALUES ('$Message','8')";

   $result = mysqli_query($link, $sql);
   echo "<script >
    window.location = 'select-feedback.php';
    </script>";  }
        }
    
?>



    <div class="containe mt-5">
        <form action="" method="Post">
            <h1> FEED BACK </h1>
         
            <div class="col-md-3">
                <label for="validationCustom01" class="form-label">Message</label>
              
                <textarea class="form-control" name="Message" required rows="10" col="30"></textarea>

                <div class="valid-feedback">
                    Looks good!
                </div>
            </div> <br>
            
            <button type="submit" class="btn-primary btn-sm" name="save">Submit</button>
        </form>


    </div>

<br>
    <?php
include "../connection.php";
$conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM `feedback`";
     $result = mysqli_query($conn, $sql);
     $num = mysqli_num_rows($result);
     ?>

<table class="table table-dark table-striped">
<thead>
        <tr>
                <th> Id </th>
                <th>Massage</th>
                <th>Patient</th>
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
                <?php echo $res['MASSAGE'];?>
            </td> 
             <td>
                <?php echo $res['Pat_ID'];?>
            </td>
             <td>
 
            
            <button  type="submit" class="btn-primary btn-sm text-white" class="text-white"><a href="feedbackUpdate.php?ID=<?php echo $res['ID'];?>" class="text-white">Update</a></button> 
           </td>
            <td>
                <button class="btn-primary btn-sm text-white"><a  href="deletefeedback.php?ID=<?php
            echo $res['ID'];?>"class="text-white">Delete</a></button>
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

