<?php
include "../headers.php";
?>

<body>

    <div class="container">


        <?php
include "../connection.php";
$link = new mysqli($servername, $username, $password, $dbname);
        $ID = $_GET['ID'];       
        $sql = "select * from reports where `ID` = $ID";
        $run =  mysqli_query($link,$sql);  
        $data = mysqli_fetch_array($run);

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     if (isset($_POST['save'])) 
     {
        $ID = $_POST['ID'];
        $REPORT_TITTLE = $_POST['REPORT_TITTLE'];
        $Pat_ID = $_POST['Pat_ID'];
        $DATE_TIME = $_POST['DATE_TIME'];
        $filename = $_FILES['DOCUMENTS']["name"];
        $tempname = $_FILES['DOCUMENTS']["tmp_name"];
        $picsize = $_FILES['DOCUMENTS']["size"];
        $pictype = $_FILES['DOCUMENTS']["type"];
        move_uploaded_file($tempname,"docfile/".$filename);
           
        
         
    
        $link = new mysqli($servername, $username, $password, $dbname);
        if (($_FILES["DOCUMENTS"]["type"] == "application/pdf") )
        {
        
    
         $sql = "UPDATE `reports` SET `REPORT_TITTLE`='$REPORT_TITTLE',`Pat_ID`='$Pat_ID',`DATE_TIME`='$DATE_TIME',`DOCUMENTS`='$filename' WHERE id= $ID";
       
       
         $result = mysqli_query($link, $sql);
                
         echo "<script >
         window.location = 'selectrp.php';
         </script>";    
        }
        else {
            echo "<script >
            alert('File must bhi PDF');
            </script>";
            echo "<script >
            window.location = 'selectrp.php';
            </script>";  

        }
        }
    
    
     }

        ?>
<form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" name="ID" value="<?php echo $data[0]?>">
                <label for="NAME" class="form-label">REPORT_TITTLE</label>
                <input type="text" value="<?php echo $data[1]?>" class="form-control" aria-describedby="emailHelp" name="REPORT_TITTLE">
                <label for="NAME" class="form-label">Patient</label>
                <select class="form-select" name="Pat_ID">
                    <?php
                $sql = "SELECT * FROM `patient`";
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
                <label for="NAME" class="form-label">DATE_TIME</label>
                <input value="<?php echo $data[2]?>" type="datetime-local" class="form-control" aria-describedby="emailHelp" name="DATE_TIME">
              
                <br>
                <label for="">DOCUMENTS</label> <br>
                <?php echo $data[4]?>
                <input value="<?php echo $data[4]?>" name="DOCUMENTS" type="file"> <br> <br>
                <button type="submit" name="save" class="btn btn-primary">Submit</button>
            </div>
        </form> <br>

<br>

         <br>

         <?php
include "../connection.php";

$sql = "select * from `reports`";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);?>
<body>
    
<a class="btn-primary btn-sm text-bold fs-4" href="insertrp.php">Add Reports</a> <br><br>
<table class="table table-dark table-striped">
    <thead>
        <tr>

            <th >#</th>
            <th >REPORT_TITTLE</th>
            <th >Patient</th>
            <th >DATE_TIME</th>
            <th >DOCUMENTS</th>
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
                <?php echo $res['REPORT_TITTLE'];?>
            </td>
              <td>
                <?php echo $res['Pat_ID'];?>
            </td>         <td>
                <?php echo $res['DATE_TIME'];?>
            </td>         <td>
             <a class="text-white" href="docfile/<?php echo $res['DOCUMENTS'];?>"><?php echo $res['DOCUMENTS'];?></a>   
            </td>        
          
           
            <td>
                <button class="btn-primary btn-sm" name= "delete"> <a class="text-white" href="deleterp.php?ID=<?php
            echo $res['ID'];?>"> Delete</a> </button>
           </td>
            <td>
                <button class="btn-primary  btn-sm"> <a class="text-white" href="updreport.php?ID=<?php
            echo $res['ID'];?>"> Update</a> </button>
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