    <?php
    include "../connection.php";
    include "../headers.php";
    ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])) {
    
    
            $NAME = $_POST['NAME'];
            $Address = $_POST['Address'];
            $Ph_Num = $_POST['Ph_Num'];
            $Age = $_POST['Age'];
            $city = $_POST['city'];
            $Blood_Group = $_POST['Blood_Group'];
            $Email = $_POST['Email'];
            $Password = $_POST['Password'];
            $filename = $_FILES['images']["name"];
            $tempname = $_FILES['images']["tmp_name"];
            $picsize = $_FILES['images']["size"];
            $pictype = $_FILES['images']["type"];
            move_uploaded_file($tempname,"images/".$filename);
           
         
    
    $link = new mysqli($servername, $username, $password, $dbname);
    
    $sql = "INSERT INTO `patient`( `Name`, `Address`, `Ph_Num`, `Age`, `CIt_Id`, `Blood Group`, `Password`, `Email`,images) VALUES ('$NAME','$Address','$Ph_Num','$Age',$city,'$Blood_Group','$Email','$Password','$filename')";
    
     $result = mysqli_query($link, $sql);
            
     echo "<script >
     window.location = 'patselect.php';
     </script>";    }
    
    
    }



?>

    <div class="container">
    
    <form action="patinsert.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">

            <label for="NAME" class="form-label">NAME</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name="NAME">
            <label for="NAME" class="form-label">Address</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name="Address">
            <label for="NAME" class="form-label">Phone</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name="Ph_Num"> <label
                for="NAME" class="form-label">Age</label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name="Age">
            <label for="NAME" class="form-label">city</label>
            <select class="form-select" name="city" >
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
            <input type="text" class="form-control"  aria-describedby="emailHelp" name="Blood_Group"> 
            <label for="NAME" class="form-label">Email</label>
            <input type="text" name="Email" class="form-control"  aria-describedby="emailHelp" name="Blood_Group"> <label for="NAME" class="form-label">Password</label>
            <input type="text" name="Password" class="form-control"  aria-describedby="emailHelp" name="Blood_Group"> <label for="NAME" class="form-label">images</label>
            <input type="file" name="images" class="form-control"  aria-describedby="emailHelp" name="images"> 
            <br>
            <button type="submit" name="save" class="btn btn-primary">Submit</button>
        </div>
    </form> <br>

</div>
<div class="container">
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
            <th >Images</th>
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
                <button class="btn-primary btn-sm" name= "delete"> <a class="text-white" href="patdele.php?ID=<?php
            echo $res['ID'];?>"> Delete</a> </button>
           </td>
            <td>
                <button class="btn-primary btn-sm"> <a class="text-white" href="patupd.php?ID=<?php
            echo $res['ID'];?>"> Update</a> </button>
            </td>
        </tr>

        <?php
    }


?>

    </tbody>
</table>

</div>
</div>

<?php
include "../footer.php";
?>

</body>

