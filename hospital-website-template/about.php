<script>
    window.onload = function() {
var element = document.getElementById("About");
 element.classList.add("Active");
    };

</script>
    <?php
    include("userheader.php")
    ?>
    
    
    
    <!-- About Start -->
    <?php
include 'aboutsec.php';
   ?>
    <!-- About End -->


     <!-- Search Start -->

     <?php
    
    if (isset($_SESSION["user"]) || isset($_SESSION["admin"] ) )   {
                     
                            include 'finddoc.php';               
                        }
                       
                      
                        
                        ?>
    <!-- Search End -->


    <!-- Team Start -->
    <?php
include 'team.php';
   ?>
    <!-- Team End -->

    <?php
    include("userfooter.php")
    ?>