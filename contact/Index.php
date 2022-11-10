<?php
include "../connection.php";
include "../headers.php";
?>

  <body>

<div class="container-fluid">
    
        <form action="/HOSPITAL/CONTACT/insertcontact.php" method= "post">  
      <div class="container-fluid mb-3">
 
        <label for="NAME" class="form-label">Name</label>
        <input type="text" class="form-control" id="NAME" aria-describedby="emailHelp" name="Name">  
        <label for="NAME" class="form-label">Email</label>
        <input type="text" class="form-control" id="NAME" aria-describedby="emailHelp" name="Email">   <label for="NAME" class="form-label">Subject</label>
        <input type="text" class="form-control" id="NAME" aria-describedby="emailHelp" name="Subject">  
        <label for="NAME" class="form-label">Massage</label>
        <input type="text" class="form-control" id="NAME" aria-describedby="emailHelp" name="Massage">  
  
           <br>
           <button type="submit" name="save" class="btn btn-primary">Submit</button>
      </div>
  </form>  <br>


    <?php
    include "../connection.php";
  $sql = "select * from `contact_us`";
  $result = mysqli_query($link, $sql);
  $num = mysqli_num_rows($result);?>
  <table class="table table-dark table-striped">
    <thead>
        <tr>

            <th >#</th>
            <th >Name</th>
            <th >Email</th>
            <th >Massage</th>
            <th >Subject</th>
            <th colspan="2">Action</th>
            

        </tr>
    </thead>
    <tbody>

        <?php
    while ($res = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <th >
                <?php echo $res['ID'];?>
            </th>
            <td>
                <?php echo $res['Name'];?>
            </td>
             <td>
                <?php echo $res['Email'];?>
            </td>
             <td>
                <?php echo $res['Massage'];?>
            </td> <td>
                <?php echo $res['Subject'];?>
            </td>
            <td>
            <a class="text-white" href="contactdel.php?ID=<?php
            echo $res['ID'];?>">  <button class="btn-primary btn-sm" name= "delete">  Delete </button></a>
           </td>
            <td>
            <a class="text-white" href="contactupd.php?ID=<?php
            echo $res['ID'];?>">    <button class="btn-primary btn-sm">  Update </button></a>
            </td>
        </tr>

        <?php
    }


        ?>

        </tbody>
        </table>

</div>
<?php
include "../footer.php";
?>

</body>

