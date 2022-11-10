<?php
    include "../connection.php";
    include "../headers.php";
    ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])) {
    
    
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
    

        $sql = "INSERT INTO `reports`( `REPORT_TITTLE`, `Pat_ID`, `DATE_TIME`, `DOCUMENTS`) VALUES ('$REPORT_TITTLE','$Pat_ID','$DATE_TIME','$filename')";

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
        window.location = 'insertrp.php';
        </script>";  

    }
            
  
    }
    
    
    }
    


?>

<body>

    <div class="container">

        <form action="insertrp.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">

                <label for="NAME" class="form-label">REPORT_TITTLE</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="REPORT_TITTLE">
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
                <input type="datetime-local" class="form-control" aria-describedby="emailHelp" name="DATE_TIME">
              
                <br>
                <label for="">DOCUMENTS</label> <br>
                <input name="DOCUMENTS" type="file"> <br> <br>
                <button type="submit" name="save" class="btn btn-primary">Submit</button>
            </div>
        </form> <br>

    </div>
    <div class="container">
        
    <?php
include "../connection.php";

$sql = "select * from `reports`";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);?>
<body>
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
            <td> 
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
            <a class="text-white" href="deleterp.php?ID=<?php
            echo $res['ID'];?>">    <button class="btn-primary btn-sm" name= "delete">  Delete </button></a>
           </td>
            <td>
            <a class="text-white" href="docupd.php?ID=<?php
            echo $res['ID'];?>">    <button class="btn-primary  btn-sm">  Update </button></a>
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