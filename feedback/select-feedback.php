
<?php
include "../headers.php";
?>
<?php
include "../connection.php";
$conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM `feedback`";
     $result = mysqli_query($conn, $sql);
     $num = mysqli_num_rows($result);
     ?>
<a href="FeedBack.Insert.php" class="btn btn-primary">Add Feedback</a>
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
                <div class="content">
                <?php echo $res['MASSAGE'];?>
                </div>
            </td> 
             <td>

                <?php 
              $IDS = $res['Pat_ID'];
              $sqls = "SELECT * FROM `patient` WHERE ID = $IDS";
              $results = mysqli_query($link, $sqls);
              $nums = mysqli_num_rows($results);
                  while ($ss = mysqli_fetch_array($results)) {
                  echo $ss['Name'];
              }
            ?>
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