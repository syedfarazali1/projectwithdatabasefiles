<?php
include "../headers.php";
?>

<?php
include "../connection.php";

$conn = new mysqli($servername, $username, $password, $dbname);
        // die if connection was not  connected


        if(isset($_POST['save']))
        {
          
          $Date_Time=$_POST["Date_Time"];
          $Pat_ID=$_POST["Pat_ID"];
          $Doctor_ID=$_POST["Doctor_ID"];
          $Ph_Num=$_POST["Ph_Num"];
          $Address=$_POST["Address"];
          $Consultancy_Fees =$_POST["Consultancy_Fees"];
                     //SQL QUERY TO BE EXECUTED
  echo   $sql="INSERT INTO `appointments`(`Date_Time`, `Pat_ID`, `Doctor_ID`, `Ph_Num`, `Address`, `Consultancy_Fees`) 
        VALUES ('$Date_Time','$Pat_ID','$Doctor_ID',' $Ph_Num','$Address','$Consultancy_Fees')";
     die;
         $result = mysqli_query($conn , $sql);  
       
         echo "<script >
         window.location = 'AppointSelect.php';
         </script>";
      }
  ?>




<!-- //appointment  -->
<div class=" container mt-5">
    <h2>OnLine Booking Appointment </h2>
    <form action="" method="POST">
        <div class="col-md-3">
            <label for="validationCustom01" class="form-label">Appointment_Date_Time</label>
            <input type="datetime-local" name="Date_Time" class="form-control" id="validationCustom01" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom02" class="form-label">Pat_ID</label>
            <input type="text" name="Pat_ID" class="form-control" id="validationCustom02" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustomUsername" class="form-label"> Doctor_ID</label>
                <input type="text" name="Doctor_ID" class="form-control" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend" required>
        </div>
        <div class="col-md-3">
            <label for="validationCustom03" class="form-label">Contact_Number</label>
            <input type="text" name="Ph_Num" class="form-control" id="validationCustom03" required>
            <div class="invalid-feedback">
                Please provide a valid city.
            </div>
         </div>

            <div class="col-md-3">
                <label for="validationCustom04" class="form-label"> Address</label>
                <input type="text" class="form-control" name="Address">
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Consultancy_Fees</label>
                <select class="form-select" name="Consultancy_Fees" id="validationCustom04" required>
                    <?php
                              $sql = "select * from `doctor`";
                                  $result = mysqli_query($conn, $sql);
                               $num = mysqli_num_rows($result)

                                ?>
                    <?php
                          while ($res = mysqli_fetch_array($result)) {  
                           ?>
                    <option value="<?php
                     echo $res['Consultancy_Fees'];?>">
                        <?php
                   echo $res['Consultancy_Fees'];              ?>
                    </option>
                    <?php
                                }               
                           ?>


                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
           
            <div class="col-12">
                <br><br>
                <div class="col-12">
                    <input class="btn btn-primary" type="submit" name="save">
            </div>
    </form>
</div>

<div class="container">
    <?php

                  ?>
</div>

<?php
include "../footer.php";
?>

</body>