 <!-- Appointment Start -->
 

    
 <div class="container-fluid bg-primary my-5 py-5">
        <div class="container py-5">
           <div class="container text-center">
           <h1 class="display-4">Find and book the best doctors near you</h1>
      
           </div>
            <div class="row gx-5">
                
                <div class="col-lg-12">
                    <div class="bg-white text-center rounded p-5">
                        
                        <form action="appointment.php">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
 
                                    <select id="cit" name="ctid" class="form-select bg-light border-0" style="height: 55px;">
                                    <option value="" disable> City</option>
                                    <?php
include "../connection.php";
$sql = "select * from `cities`";    
$query = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    echo     " <option value='{$row['ID']}'>{$row['Name']}</option>";
}

?>
                                        
                                        </select>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <select id="sp" name="spid" class="form-select bg-light border-0" style="height: 55px;">
                                    <option value="" disable> Specialist</option>
                                    <?php
include "../connection.php";
$sql = "SELECT * FROM specialist";
$query = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    echo     " <option value='{$row['ID']}'>{$row['Name']}</option>";
}

?>
                                     
                                    </select>
                                </div>
                             
                                
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="search" type="submit">Make An
                                        Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

   


    <!-- Appointment End -->