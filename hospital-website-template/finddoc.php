<div class="container-fluid bg-primary my-5 py-5">
        <div class="container py-5">
            <form action="searchdoc.php">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Find A Doctor</h5>
                <h1 class="display-4 mb-4">Find A Healthcare Professionals</h1>
                <h5 class="text-white fw-normal">Duo ipsum erat stet dolor sea ut nonumy tempor. Tempor duo lorem eos
                    sit sed ipsum takimata ipsum sit est. Ipsum ea voluptua ipsum sit justo</h5>
            </div>
            <div class="mx-auto" style="width: 100%; max-width: 600px;">
                <div class="input-group">   
                    <select placeholder="" name="spid" class="form-select border-primary w-25" style="height: 60px;">
                    <option value="" disable> Specialist</option>
                    <?php
                                                include "../connection.php";
                                                $sql = "SELECT * FROM specialist";
                                               $query = mysqli_query($link, $sql);
                                                while ($row = mysqli_fetch_assoc($query)) {
                                        echo     " <option value='{$row['ID']}'>{$row['Name']}</option>";
                                                }

                                                ?>
                    </select>
                    <input type="text" name="doctor" class="form-control border-primary w-50" placeholder="Doctor Name">
                    <button typle="button" name="search" class="btn btn-dark border-0 w-25">Search</button>
                </div>
            </div>
            </form>
        </div>
    </div>