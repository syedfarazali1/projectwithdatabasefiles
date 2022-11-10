<?php
include "../connection.php";
include "../headers.php";
?>

  <body>

<div class="container-fluid">
    
        <form action="/HOSPITAL/city/insertcity.php" method= "post">  
      <div class="container-fluid mb-3">
 
        <label for="NAME" class="form-label">NAME</label>
        <input type="text" class="form-control" id="NAME" aria-describedby="emailHelp" name="NAME"> 
  
           <br>
           <button type="submit" name="save" class="btn btn-primary">Submit</button>
      </div>
  </form>  <br>


    <?php
    include "../connection.php";
  $sql = "select * from `cities`";
  $result = mysqli_query($link, $sql);
  $num = mysqli_num_rows($result);?>
  <table class="table table-dark table-striped">
    <thead>
        <tr>

            <th >#</th>
            <th >First</th>
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
            <a class="text-white" href="citdel.php?ID=<?php
            echo $res['ID'];?>">  <button class="btn-primary btn-sm" name= "delete">  Delete </button></a>
           </td>
            <td>
            <a class="text-white" href="citupd.php?ID=<?php
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

