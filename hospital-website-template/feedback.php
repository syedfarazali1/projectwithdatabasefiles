<div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Testimonial</h5>
                <h1 class="display-4">Patients Say About Our Services</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                    <?php
                
                include "../connection.php";

                $sql = "select * from `feedback`";
                $result = mysqli_query($link, $sql);
                $num = mysqli_num_rows($result);
                
             
                while ($res = mysqli_fetch_array($result)) { ?>

                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                            <?php 
              $IDS = $res['Pat_ID'];
              $sqls = "SELECT * FROM `patient` WHERE ID = $IDS";
              $results = mysqli_query($link, $sqls);
              $nums = mysqli_num_rows($results);
                  while ($ss = mysqli_fetch_array($results)) {?>
                    
             
                                <img class="img-fluid rounded-circle mx-auto" src="../patient/images/<?php echo $ss['images'];?>" alt="">
                                <?php   }
               ?>
                                <div class="position-absolute top-100 start-50 translate-middle d-flex align-items-center justify-content-center bg-white rounded-circle"
                                    style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-4 fw-normal ">    <?php echo $res['MASSAGE'];?></p>
                            <hr class="w-25 mx-auto">
                            <h3>
                        
                            <?php 
              $IDS = $res['Pat_ID'];
              $sqls = "SELECT * FROM `patient` WHERE ID = $IDS";
              $results = mysqli_query($link, $sqls);
              $nums = mysqli_num_rows($results);
                  while ($ss = mysqli_fetch_array($results)) {
                  echo $ss['Name'];
              }
            ?>
                        </h3>
                            <h6 class="fw-normal text-primary mb-3">Profession</h6>
                        </div> 
                        <?php
                             }


                ?>

                    </div>
                </div>
            </div>
        </div>
    </div>