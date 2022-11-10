<?php
include "../headers.php";
?>
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

        <?php
include "../footer.php";
?>