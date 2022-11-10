<script>
    window.onload = function () {
        var element = document.getElementById("Home");
        element.classList.add("Active");
    };

</script>

<?php
    include("userheader.php")
    ?>
<!-- <div> -->
    <!-- Hero Start -->
    <?php
include 'hero.php';
   ?>
    <!-- Hero End -->


    <!-- About Start -->
    <?php
include 'aboutsec.php';
   ?>
    <!-- About End -->


    <!-- Services Start -->
    <?php
include 'servicesec.php';
   ?>
    <!-- Services End -->


    <!-- Appointment Start -->
   <?php
     if (isset($_SESSION["user"]) || isset($_SESSION["admin"] ) )  {
                     
        include 'appointsec.php';        
    }

   ?>
<!-- Appointment End -->

    <!-- Pricing Plan Start -->
    <?php
include 'pricesec.php';
   ?>
    <!-- Pricing Plan End -->


    <!-- Team Start -->
    <?php
include 'team.php';
   ?>
    <!-- Team End -->


    <!-- Search Start -->
    <?php
    
    if (isset($_SESSION["user"]) || isset($_SESSION["admin"] ) )   {
                     
                            include 'finddoc.php';               
                        }
                       
                      
                        
                        ?>
    
   
    <!-- Search End -->


    <!-- Testimonial Start -->
  <?php
include 'feedback.php';
   ?>
    <!-- Testimonial End -->


    <!-- Blog Start -->
    <?php
include 'blogsec.php';
   ?>
    <!-- Blog End -->
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<?php
    include("userfooter.php")
    ?>

   