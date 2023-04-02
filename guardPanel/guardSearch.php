<?php
    include('../databaseConnection.php');

    $sql = "SELECT * FROM `flats`";
    $result = mysqli_query($con,$sql);

    $record = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);

    mysqli_close($con); 
?>

<!DOCTYPE html>
<html lang="en">
    <?php include('guardHeader.php'); ?>

    <div class="container">
        <h1 class="head text-center">Guest Search</h1>  
        <div class="d-flex justify-content-center mt-4">
            <form action="guardSearchFunc.php" method="POST" class="w-50 ">
                <select class="form-select" id="floatingSelect" name="flatId">
                    <option value="" disabled selected hidden>Select Flat Id</option>
                    <?php foreach($record as $value){ ?>
                        <option value="<?=$value['id'];?>"><?php echo htmlspecialchars($value['id']);?></option>
                    <?php }?>
                </select>
                <div class="form-group my-3">
                    <label for="">Date </label>
                    <input type="date" name="date" class="form-control" />
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Search</button>
            </form>
        </div>       
    </div>
    
</body>
</html>