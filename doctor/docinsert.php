<?php
    include "../connection.php";
    include "../headers.php";
    ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])) {
    
    
            $Dr_Name = $_POST['Dr_Name'];
            $Spe_ID = $_POST['Spe_ID'];
            $Timing = $_POST['Timing'];
            $Days = $_POST['Days'];
            $Cit_ID = $_POST['Cit_ID'];
            $Avaible_Status = $_POST['Avaible_Status'];
            $filename = $_FILES['Pic']["name"];
            $tempname = $_FILES['Pic']["tmp_name"];
            $picsize = $_FILES['Pic']["size"];
            $pictype = $_FILES['Pic']["type"];
            move_uploaded_file($tempname,"images/".$filename);
            
         
    
    $link = new mysqli($servername, $username, $password, $dbname);
    
 $sql = "INSERT INTO `doctor`( `Dr_Name`, `Spe_ID`, `Timing`, `Days`, `Cit_ID`, `Avaible_Status`,  `Pic`) VALUES ('$Dr_Name','$Spe_ID','$Timing','$Days',$Cit_ID,'$Avaible_Status','$filename')";

 $result = mysqli_query($link, $sql);
            
  
    }
    
    
    }



?>

<body>

    <div class="container">

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">

                <label for="NAME" class="form-label">Dr_NAME</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="Dr_Name">
                <label for="NAME" class="form-label">Specialist</label>
                <select class="form-select" name="Spe_ID">
                    <?php
                $sql = "select * from `specialist`";
                $result = mysqli_query($link, $sql);
                 $num = mysqli_num_rows($result);?>

                    <?php
                    while ($res = mysqli_fetch_array($result)) { ?>
                    <option value=" <?php echo $res['ID'];?>">
                        <?php echo $res['Name'];?>
                    </option>
                    <?php   }
                       ?>

                </select>
                <label for="NAME" class="form-label">Timing</label>
                <input type="time" class="form-control" aria-describedby="emailHelp" name="Timing">
                <label for="NAME" class="form-label">Days</label>
                <div class="form-check">
                    <input class="form-check-input" value="MWF" type="radio" name="Days" >
                    <label class="form-check-label" >
                        MWF
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="TTS" type="radio" name="Days"  checked>
                    <label class="form-check-label" >
                        TTS </label>
                </div>
                <label for="NAME" class="form-label">City</label>
                <select class="form-select" name="Cit_ID">
                    <?php
                $sql = "select * from `cities`";
                $result = mysqli_query($link, $sql);
                 $num = mysqli_num_rows($result);?>

                    <?php
                    while ($res = mysqli_fetch_array($result)) { ?>
                    <option value=" <?php echo $res['ID'];?>">
                        <?php echo $res['Name'];?>
                    </option>
                    <?php   }
                       ?>

                </select>
                <p>Status:</p>
                <div class="form-check">
                    <input class="form-check-input" value="Active" type="radio" name="Avaible_Status" >
                    <label class="form-check-label" for="flexRadioDefault1">
                        Active
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="Deactive" type="radio" name="Avaible_Status"  checked>
                    <label class="form-check-label" >
                        DeActive
                    </label>
                </div>

                <label for="">Image</label> <br>
                <input name="Pic" type="file"> <br> <br>
                <button type="submit" name="save" class="btn btn-primary">Submit</button>
            </div>
        </form> <br>

    </div>
    <div class="container-fluid">
        
   
    <?php

$sql = "select * from `doctor`";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);?>
<body>
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
                <?php echo $res['Spe_ID'];?>
            </td>         <td>
                <?php echo $res['Timing'];?>
            </td>         <td>
                <?php echo $res['Days'];?>
            </td>         <td>
                <?php 
              echo $res['Cit_ID'];
                ?>
            </td>     
               <td>
                <?php echo $res['Avaible_Status'];?>
            </td>   
                 <td>
                    <img height="30px" width="30px" src="images/<?php echo $res['Pic'];?>" alt="<?php echo $res['Pic'];?>">
                
            </td>
          
            <td>
            <a<button class="btn-primary btn-sm" name= "delete">  class="text-white" href="docdele.php?ID=<?php
            echo $res['ID'];?>"> Delete </button></a>
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
    </div>

    <?php
include "../footer.php";
?>

</body>