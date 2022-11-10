<script>
    window.onload = function () {
        var element = document.getElementById("Appointment");
        element.classList.add("Active");
    };

</script>
<?php
        include("userheader.php")
?>
<?php
include "../connection.php";

$conn = new mysqli($servername, $username, $password, $dbname);
        // die if connection was not  connected


        if(isset($_POST['save']))
        {
          
          $Date_Time=$_POST["Date_Time"];
          $Pat_ID= 4;
          $Doctor_ID=$_POST["Doctor_ID"];
          $Ph_Num=$_POST["Ph_Num"];
          $Address=$_POST["Address"];
          $Consultancy_Fees =$_POST["Consultancy_Fees"];
          
                     //SQL QUERY TO BE EXECUTED
       $sql="INSERT INTO `appointments`(`Date_Time`, `Pat_ID`, `Doctor_ID`, `Ph_Num`, `Address`, `Consultancy_Fees`) 
        VALUES ('$Date_Time','$Pat_ID','$Doctor_ID',' $Ph_Num','$Address','$Consultancy_Fees')";
     
         $result = mysqli_query($conn , $sql);  
       
         echo "<script >
         window.location = 'index.php';
         </script>";
      }
  ?>
<div class="container">
    <div class="row mt-5">
        <div class="col-12 text-center">
            <h1 class="display-4">Make An Appointment For Your Family</h1>
        </div>
    </div>
</div>
<?php
include "../connection.php";
if(isset($_GET['search'])) {
    $spid = $_GET['spid'];
    $doc = $_GET['ctid'];
    if (!$_GET['spid'] && !$_GET['ctid']) {
        $sql = "select * from `doctor`";
     echo " <div class='col-12 text-center'><h5 class='display-4'>All Doctor's Are Here</h5></div>";
    }
    else {
        
        $spid = $_GET['spid'];
        $citid = $_GET['ctid'];
    if (empty($spid) ) {
      $sql = "select * from `doctor` where Cit_ID =$citid"; 
      
    }
    elseif (empty($citid)) {
        $sql = "select * from `doctor` where Spe_ID = $spid";
    }
    
    else {
    
        $sql = "select * from `doctor` where Cit_ID =$citid and Spe_ID = $spid"; 
       } 
    }
}
    else {
        
        $sql = "select * from `doctor`";
        echo " <div class='col-12 text-center'><h5 class='display-4'>All Doctor's Are Here</h5></div>";

}   
$query = mysqli_query($link, $sql);
while ($row = mysqli_fetch_assoc($query)) { ?>
<div class="container-fluid py-5">
    <div class="container py-5 bg-primary">
        <div class="row">
            <div class="col-2">
                <style>
                    #img {
                        border-radius: 50%;
                    }
                </style>
                <img id="img" src="../doctor/images/<?php echo $row["Pic"]?>" width="150px" height="150px"
                alt="" srcset="">
            </div>
            <div class="col-5">
                <p class="text-dark fw-bolder"> Name: Dr.
                    <?php echo $row["Dr_Name"]?>
                </p>

                <p class="text-dark fw-bolder"> Description: Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Expedita quasi odio possimus fuga at unde, blanditiis iure eius sit quisquam doloribus quo cum ipsa
                    tenetur hic distinctio tempora maxime cumque.</p>
                <div class="row">
                    <div class="col-3 text-dark fw-bolder">
                        Timing:
                        <?php echo $row["Timing"]?>
                    </div>
                    <div class="col-3 text-dark fw-bolder">
                        Days: <br>
                        <?php echo $row["Days"]?>
                    </div>
                    <div class="col-3 text-dark fw-bolder">
                        Fess <br>
                        <?php echo $row["Consultancy_Fees"]?>
                    </div>
                    <div class="col-3 text-dark fw-bolder">
                        Specialist <br>
                      
                        <?php $sp = $row["Spe_ID"];
                      $sqls = "select * from `specialist` where ID =$sp";
                  
                        $querys = mysqli_query($link, $sqls);

                        while ($rows = mysqli_fetch_assoc($querys)) {
                             echo $rows["Name"];
                        }
                            ?>
                        
                        
                    </div>
                </div>
            </div>

            <div class="col-5">
                <form action="" method="post" >
                        <input type="hidden" name="Doctor_ID" value="<?php echo $row["ID"]?>">
                        <input type="hidden" name="Date_Time" value="<?php echo $row["Timing"]." ".$row["Days"]?>">
                        <input type="hidden" name="Consultancy_Fees" value="<?php echo $row["Consultancy_Fees"]?>">
                    <input type="text" class="form-control text-dark border-0" placeholder="Your Email"
                        style="height: 55px;" require><br>
                    <input type="text" name="Ph_Num" class="form-control text-dark border-0" placeholder="Your Number"
                        style="height: 55px;" require>   <br>
                         <input type="text" name="Address" class="form-control text-dark border-0" placeholder="Your Address"
                        style="height: 55px;" require>
                    <br>
                    <button class="btn btn-light w-100 py-3" name="save" type="submit">Make An
                        Appointment</button>
                </form>
            </div>

        </div>
    </div>
</div>
<?php

}


?>





<?php
        include("userfooter.php")
        ?>