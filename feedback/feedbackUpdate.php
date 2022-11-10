<?php
include "../headers.php";
?>
<?php
include "../connection.php";

$conn = new mysqli($servername, $username, $password, $dbname);
        $ID = $_GET['ID'];       
     $sql= " SELECT * FROM `feedback` WHERE ID =$ID";
       
        $run =  mysqli_query($conn,$sql); 

        $data = mysqli_fetch_array($run); 
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     if (isset($_POST['Updated'])) 
               //   print_r($result);

     {
        $MASSAGE = $_POST['MASSAGE'];

        $link = new mysqli($servername, $username, $password, $dbname);
        $sql = "UPDATE `feedback` SET  MASSAGE='$MASSAGE',`Pat_ID`=4 WHERE ID=$ID ";
        
     $result = mysqli_query($link, $sql);

     //  print_r($sql);


      if($result)
      {
         echo "updated successfully";
      }
      echo "<script >
      window.location = 'select-feedback.php';
      </script>";
  }
}

?>



    <div class="containe mt-5">
        <form action="" method="Post">
            <h1> FEED BACK </h1>
           
            <h1> SHARE YOUR EXPRIENCE</h1>
            <div class="col-md-3">
                <label for="validationCustom01" class="form-label">Message</label>
                <input type="text" name="MASSAGE" value="<?php echo $data[1]?>" class="form-control"
                    id="validationCustom01" required>
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <div class="mb-3 form-check">
            </div>
            <button type="submit" class="btn btn-primary" name="Updated">Submit</button>
        </form> <br>





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
</body>