<?php
include "../headers.php";
?>

<body>

    <div class="container">


        <?php
            include "../connection.php";
        $link = new mysqli($servername, $username, $password, $dbname);
        $ID = $_GET['ID'];       
        $sql = "select * from patient where `ID` = $ID";
        $run =  mysqli_query($link,$sql);  
        $data = mysqli_fetch_array($run);

     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     if (isset($_POST['update'])) 
     {
        $ID = $_POST['ID'];
        $NAME = $_POST['NAME'];
        $Address = $_POST['Address'];
        $Ph_Num = $_POST['Ph_Num'];
        $Age = $_POST['Age'];
        $city = $_POST['city'];
        $Blood_Group = $_POST['Blood_Group'];
        $Email = $_POST['Email'];
        $Passwords = $_POST['Password'];
        $filename = $_FILES['images']["name"];
        $tempname = $_FILES['images']["tmp_name"];
        $picsize = $_FILES['images']["size"];
        $pictype = $_FILES['images']["type"];
        move_uploaded_file($tempname,"images/".$filename);
    $sqls = "UPDATE `patient` SET `Name`='$NAME',`images`='$filename',`Address`='$Address',`Ph_Num`='$Ph_Num',`Age`='$Age',`CIt_Id`='$city',`Blood Group`='$Blood_Group',`Password`='$Passwords',`Email`='$Email' WHERE `ID` = '$ID'";

      $run =  mysqli_query($link,$sqls);  
            
         echo "<script >
         window.location = 'patselect.php';
         </script>";    
              }
    
    
     }

        ?>
 <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <input type="hidden" class="form-control"  aria-describedby="emailHelp" value="<?php echo $data[0]?>" name="ID">
            <label for="NAME" class="form-label">NAME</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" value="<?php echo $data[1]?>" name="NAME">
            <label for="NAME" class="form-label">Image</label> <br>
            <img height="30px" width="30px" src="images/<?php echo $data[2]?>" alt="<?php echo $data['images'];?>">
            <input type="file" class="form-control"   name="images">
            
            <label for="NAME" class="form-label">Address</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" value="<?php echo $data[3]?>" name="Address">
            <label for="NAME" class="form-label">Phone</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" value="<?php echo $data[4]?>" name="Ph_Num"> <label
                for="NAME" class="form-label">Age</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" value="<?php echo $data[5]?>" name="Age">
            <label for="NAME" class="form-label">city</label>
            <select class="form-select" name="city" >
                <!-- <option selected disable value="<?php echo $data[6]?> "><?php echo $data[5]?></option> -->
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
            <label for="NAME" class="form-label">Blood Gorup</label>
            <input type="text" class="form-control" value="<?php echo $data[7]?>"  aria-describedby="emailHelp" name="Blood_Group"> 
            <label for="NAME" class="form-label">Password</label>
            <input type="text" name="Password" value="<?php echo $data[8]?>" class="form-control"  aria-describedby="emailHelp" >
             <label for="NAME" class="form-label">Email</label>
            <input type="text" name="Email" class="form-control" value="<?php echo $data[9]?>" aria-describedby="emailHelp" > 
            <br>
            <button type="submit" name="update" class="btn btn-primary">Submit</button>
        </div>
    </form> <br>

         <br>

<?php
include "../connection.php";

$sql = "select * from `patient`";
$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);?>

<table class="table table-dark table-striped">
    <thead>
        <tr>

            <th >#</th>
            <th >Name</th>
            <th >Address</th>
            <th >Number</th>
            <th >Age</th>
            <th >City</th>
            <th >Blood Group</th>
            <th >Email</th>
            <th >PASSWORD</th>
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
            <img height="30px" width="30px" src="images/<?php echo $res['images'];?>" alt="<?php echo $res['images'];?>">
        
    </td>
      <td>
        <?php echo $res['Address'];?>
    </td>         <td>
        <?php echo $res['Ph_Num'];?>
    </td>         <td>
        <?php echo $res['Age'];?>
    </td>         <td>
        <?php 
      echo $res['CIt_Id'];
        ?>
    </td>     
       <td>
        <?php echo $res['Blood Group'];?>
    </td>   
         <td>
        <?php echo $res['Password'];?>
    </td>
    <td>
        <?php echo $res['Email'];?>
    </td>
    <td>
    <a class="text-white" href="patdele.php?ID=<?php
    echo $res['ID'];?>">   <button class="btn-primary btn-sm" name= "delete">  Delete </button></a>
   </td>
    <td>
    <a class="text-white" href="patupd.php?ID=<?php
    echo $res['ID'];?>"> <button class="btn-primary btn-sm">  Update </button></a>
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

