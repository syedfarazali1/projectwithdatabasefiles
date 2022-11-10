
  <script>
    window.onload = function() {
var element = document.getElementById("Service");
 element.classList.add("Active");
    };

</script>
<?php
    include("userheader.php")
    ?>
  
<div class="div">
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


 <!-- Testimonial Start -->
<?php
include 'feedback.php';
   ?>
    <!-- Testimonial End -->

</div>

<?php
    include("userfooter.php")
    ?>