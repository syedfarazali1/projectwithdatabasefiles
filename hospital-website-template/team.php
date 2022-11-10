<div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Our Doctors</h5>
                <h1 class="display-4">Qualified Healthcare Professionals</h1>

            </div>
            <div class="owl-carousel team-carousel position-relative">

                <?php
                
                include "../connection.php";

                                        $sql = "select * from `doctor`";
                                $result = mysqli_query($link, $sql);
                                        $num = mysqli_num_rows($result);
                
             
                                   while ($res = mysqli_fetch_array($result)) {
                             ?>
                <div class="team-item check">
                    <div class="row g-0 bg-light rounded overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="../doctor/images/<?php echo $res['Pic'];?>"
                                style="object-fit: cover;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                            <div class="mt-auto p-4">
                                <h3>
                                    <?php echo"Dr ". $res['Dr_Name'];?>
                                </h3>
                                <h6 class="fw-normal fst-italic text-primary mb-4">
                                    <?php
                $id = $res['Spe_ID'];
                $sqls = "SELECT * FROM `specialist` WHERE ID = $id";
                $results = mysqli_query($link, $sqls);
                $nums = mysqli_num_rows($results);
                    while ($ss = mysqli_fetch_array($results)) {
                    echo  $ss['Name']. " Specialist";
                }?>
                                </h6>
                                <p class="m-0 bold">Days
                                    <?php echo $res['Days'];?>
                                </p>
                                <br>
                                <p class="m-0 bold">Timing
                                    <?php echo $res['Timing'];?>
                                </p>
                            </div>
                            <div class="d-flex mt-auto border-top p-4">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#"><i
                                        class="fab fa-linkedin-in"></i></a>
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