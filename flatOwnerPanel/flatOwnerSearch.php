<!DOCTYPE html>
<html lang="en">
    <?php 
        include('flatOwnerHeader.php'); 
        include('../databaseConnection.php'); 
        session_start();

        $id = $_SESSION['id'];
        $sql =  "SELECT flats.id FROM flats
        INNER JOIN flatowner
        ON flats.ownerId = flatowner.id
        WHERE flatowner.id = '$id'";
        $result = mysqli_query($con,$sql);

        $record = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);

        mysqli_close($con);

    ?>

    <div class="container">
        <h1 class="head text-center">Search Information</h1> 
        <div class="d-flex justify-content-center mt-4">
            <form action="flatOwnerSearchFunc.php" method="POST" class="w-50 ">
                <select class="form-select" id="floatingSelect" name="flatId" required>
                    <option value="" disabled selected hidden>Select Flat Id</option>
                    <?php foreach($record as $value){ ?>
                        <option value="<?=$value['id'];?>"><?php echo htmlspecialchars($value['id']);?></option>
                    <?php }?>
                </select>
                <select class="form-select my-3" id="floatingSelect" name="option" required>
                    <option value="" disabled selected hidden>Select Option</option>
                    <option value="1">Active Tenant</option>
                    <option value="0">Ex Tenant</option>
                </select>
                
                <button type="submit" name="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

    </div>
    
</body>
</html>