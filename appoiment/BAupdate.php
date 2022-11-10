<?php
include "../headers.php";
  include "../connection.php";
         $conn = new mysqli($servername, $username, $password, $dbname);
          

            $Id = $_GET['ID'];       
            $sql = "SELECT * FROM `appointments` WHERE ID =$Id";
            $run =  mysqli_query($conn,$sql);
            $data = mysqli_fetch_array( $run);{
            if ($_SERVER['REQUEST_METHOD'] == 'POST') 
            if(isset($_POST['updated']))
            {
               $ID = $_POST['id'];
            
              
                $Date_Time=$_POST["Date_Time"];
                $Pat_ID=$_POST["Pat_ID"];
               $Doctor_ID=$_POST["Doctor_ID"];
                $Ph_Num=$_POST["Ph_Num"];
                 $Address=$_POST["Address"];
                 $Consultancy_Fees =$_POST["Consultancy_Fees"];
               

              $conn = new mysqli($servername, $username, $password, $dbname);


                      $sql = "UPDATE `appointments` SET `Date_Time`='$Date_Time',`Pat_ID`='$Pat_ID',`Doctor_ID`='$Doctor_ID',`Ph_Num`='$Ph_Num',`Address`='$Address',`Consultancy_Fees`='$Consultancy_Fees'  WHERE id= $ID";
     
              $result = mysqli_query($conn ,$sql);
              echo "<script >
              window.location = 'AppointSelect.php';
              </script>"; 
            }
           
          }
?>


<div class=" container mt-5">
    <h2>UpDate Data </h2>
    <form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo $data[0]?>" class="form-control"
                id="validationCustom01" required>
        <div class="col-md-3">
            <label for="validationCustom01" class="form-label">Date_Time</label>
            <input type="text" name="Date_Time" value="<?php echo $data[1]?>" class="form-control"
                id="validationCustom01" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom02" class="form-label">Pat_ID</label>
            <input type="text" name="Pat_ID" value="<?php echo $data[2]?>" class="form-control"
                id="validationCustom02" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Doctor_ID</label>
            <select class="form-select" name="Doctor_ID" value="<?php echo $data[3]?>" id="validationCustom04"
                required>
                <?php
              $sql = "select * from `doctor`";
              $result = mysqli_query($conn, $sql);
              $num = mysqli_num_rows($result)

              ?>
                <?php
              while ($res = mysqli_fetch_array($result)) {  
               ?>
                <option value="<?php
                     echo $res['ID'];?>">
                    <?php
                echo $res['Dr_Name'];              ?>
                </option>
                <?php
                             }               
               ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="validationCustomUsername" class="form-label">Contact No</label>
            <div class="input-group has-validation">
                <input type="text" name="Ph_Num" value="<?php echo $data[4]?>" class="form-control"
                    id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>

       

      <div class="col-md-3">
           <label for="validationCustom03" class="form-label">Address</label>
             <input type="text" value="<?php echo $data[5]?>" name="Address" class="form-control"
        id="validationCustom03" required>

      </div>
      <div class="col-md-3">
            <label for="validationCustom03" class="form-label">Consultancy_Fees</label>
          <input type="text" value="<?php echo $data[6]?>" name="Consultancy_Fees" class="form-control"
        id="validationCustom03" required>
    </div>


<div class="col-12">
    <br><br>
    <div class="col-12">
        <button type="submit" class="btn btn-primary" name="updated">Submit</button>

    </div>
    </form>
</div>

<?php
include "../footer.php";
?>

</body>

