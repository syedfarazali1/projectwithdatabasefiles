<?php
        include("userheader.php")
?>
 
 
   <!-- Search Result Start -->
   <div class="container-fluid bg-primary py-5">
        <div class="container">
        <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Find A Doctor</h5>
                <h1 class="display-4 mb-4">Find A Healthcare Professionals</h1>
                <h5 class="fw-normal">Duo ipsum erat stet dolor sea ut nonumy tempor. Tempor duo lorem eos sit sed ipsum takimata ipsum sit est. Ipsum ea voluptua ipsum sit justo</h5>
       
                <form action="searchdoc.php">
                   <div class="mx-auto" style="width: 100%; max-width: 600px;">
                <div class="input-group">   
                    <select placeholder="" name="spid" class="form-select border-primary w-25" style="height: 60px;">
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
                    <input type="text" name="doctor" class="form-control border-primary w-50" placeholder="Doctor Name">
                    <button typle="button" name="search" class="btn btn-dark border-0 w-25">Search</button>
                </div>
                 </div>
            </form>
            </div>
        
            <div class="row g-5">
 <?php

include "../connection.php";
if(isset($_GET['search'])) {
    $spid = $_GET['spid'];
    $doc = $_GET['doctor'];


 if (empty($spid) & empty($doc) ){
    echo " <div class='col-12 text-center'><h5 class='display-4'>All Doctor's Are Here</h5></div>";
    $sql = "select * from `doctor` ";
}
else if (empty($spid) ) {
    $sql = "select * from `doctor` where Dr_Name = '$doc' "; 
}
else if (empty($doc) ) {
      $sql = "select * from `doctor` where Spe_ID = $spid ";
} 

else {

     $sql = "select * from `doctor` where Dr_Name = '$doc' and Spe_ID = $spid ";
}
}
else {
    echo " <div class='col-12 text-center'><h5 class='display-4'>All Doctor's Are Here</h5></div>";
    $sql = "select * from `doctor` ";   
}
$query = mysqli_query($link, $sql);

while ($row = mysqli_fetch_assoc($query)) { ?>


                <div class="col-lg-6 team-item">
                    <div class="row g-0 bg-light rounded overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="../doctor/images/<?php echo $row["Pic"]?>" style="object-fit: cover;">
                        </div>
                        <div class="col -12 col-sm-7 h-100 d-flex flex-column">
                            <div class="mt-auto p-4">
                                <h3>Doctor <?php echo $row["Dr_Name"]?></h3>
                                <h6 class="fw-normal fst-italic text-primary mb-4"> <?php $sp = $row["Spe_ID"];
                      $sqls = "select * from `specialist` where ID =$sp";
                  
                        $querys = mysqli_query($link, $sqls);

                        while ($rows = mysqli_fetch_assoc($querys)) {
                             echo $rows["Name"];
                        }
                            ?> Specialist</h6>
                                <p class="m-0">Dolor lorem eos dolor duo eirmod sea. Dolor sit magna rebum clita rebum dolor</p>
                            </div>
                            <div class="d-flex mt-auto border-top p-4">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
               
                
    <?php
}

?>

            </div>
        </div>
    </div>
    <!-- Search Result End -->

    <?php
        include("userfooter.php")
        ?>