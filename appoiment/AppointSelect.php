

            <?php
include "../headers.php";
?>
<a class="btn-primary btn" href="BookingAppointementInsert.php">Take Appointment</a>
                   <div class="container">
                    <div class="col-lg-12">
                          <h1>Appointment List Display</h1>

                    <table class="table">

                            <tr>
                                <th> ID </th>
                               <th>Date_Time</th>
                                <th>Pat_ID</th>
                                <th>Doctor_ID</th>
                                <th>Ph_Num</th>
                                <th>Address</th>
                                <th>Consultancy_Fees</th>
                                <th col="2">Action</th>
                               

                            </tr>
                  <?php
                              include "../connection.php";
                              $conn = new mysqli($servername, $username, $password, $dbname);
                               $sql = "SELECT * FROM `appointments` ";
                              
                                $result = mysqli_query($conn ,$sql);
                              
                                $num = mysqli_num_rows($result);
                                while ($row = mysqli_fetch_array($result)) {
                                           
                                    
                       ?>           
                            <tr>
                                   <td><?php echo $row['ID']; ?></td>  
                                    <td><?php echo $row['Date_Time']; ?></td>
                                    <td><?php echo $row['Pat_ID']; ?></td>
                                    <td><?php echo $row['Doctor_ID']; ?></td>
                                    <td><?php echo $row['Ph_Num']; ?></td>
                                    <td><?php echo $row['Address']; ?></td>
                                    <td><?php echo $row['Consultancy_Fees']; ?></td>
                                  

                   <td>
                        <button class="btn-primary btn"> 
                        <a href="BAdelete.php?ID=<?php echo $row['ID']; ?>
                       "class="text-white">
                      Delete
                      </a>
                    </button>
              </td>
                   <td> <button class="btn-primary btn"> <a href="BAupdate.php?ID=<?php echo $row['ID']; ?>
                   "class="text-white">Update</a></button></td>




                            </tr>
                            <?php
                                     }
                            ?>
                                                 

            
                        </table>
                    </div>
                   </div>
           
                   <?php
include "../footer.php";
?>

                  </body>
           
        
         
          
             
               
       
                

