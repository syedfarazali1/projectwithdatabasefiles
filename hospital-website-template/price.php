
  <script>
    window.onload = function() {
var element = document.getElementById("Pricing");
 element.classList.add("Active");
    };

</script>
<?php
    include("userheader.php")
    ?>


    <!-- Pricing Plan Start -->
    <?php
include 'pricesec.php';
   ?>
    <!-- Pricing Plan End -->


    <!-- Appointment Start -->
    <?php
     if (isset($_SESSION["user"]) || isset($_SESSION["admin"] ) )  {
                     
        include 'appointsec.php';        
    }

   ?>
    <!-- Appointment End -->


    <!-- Team Start -->
    <?php
include 'team.php';
   ?>
    <!-- Team End -->


    <?php
    include("userfooter.php")
    ?>
