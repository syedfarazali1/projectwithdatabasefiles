<script>
    window.onload = function() {
var element = document.getElementById("Contact");
 element.classList.add("Active");
    };
    
  

</script>
<?php 

    include("userheader.php");
          
    ?>
<?php
include "../connection.php";

?>  

<?php
   include "../connection.php";
   $link = new mysqli($servername, $username, $password, $dbname);
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
      
   
        include "../connection.php";
        $pass = $_POST['pass'];
         $Email = $_POST['Email'];
        $sql = "Select `id`, `username`, `email`, `pass`, `type` from signup where email = '$Email' and pass = '$pass'";
        $result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
   $admin = $row['type'];

       if ($admin == 'user') {
        $_SESSION["user"] = $row['username'];
        $_SESSION["user_id"] = $row['id'];
        $_SESSION["user_type"] = $row['type'];
        echo "<script>
        window.location = 'index.php';
    </script>;"; 
       }
        else if ($row['type'] == 'admin') {
            
            $_SESSION["admin"] = $row['username'];
            $_SESSION["admin_id"] = $row['id'];
            $_SESSION["admin_type"] = $row['type'];
     
            echo "<script>
            window.location = '../Specialist/specselect.php';
        </script>;"; 
        }
    }
}
else {
   echo $error = "Your Login Name or Password is invalid";
}
    }
}
?>
 <div class="container-fluid pt-5">
        <div class="container">
        
            <div class="text-center mx-auto mb-2" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Login Form</h5>
                <h1 class="display-4">Login For More Services </h1>
            </div>
            
            <div class="row justify-content-center position-relative" >
                <div class="col-lg-8">
                    <div class="bg-white rounded p-5 m-5 mb-0">
                    <form action="" method= "post">  
                            <div class="row g-3">
                             
                                <div class="col-12">
                                    <input type="email" class="form-control bg-light border-0" placeholder="Your Email" name="Email" style="height: 55px;">
                                </div>
                                <div class="col-12 ">
                                    <input type="password" class="form-control bg-light border-0" placeholder="Your Name" name="pass" style="height: 55px;">
                                </div>
                            
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" name="login" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
    <?php
    include("userfooter.php")
    ?>