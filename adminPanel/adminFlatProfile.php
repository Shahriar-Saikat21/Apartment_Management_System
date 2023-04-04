<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');
        if(isset($_POST['submit'])){
            $fId = htmlspecialchars($_POST['id']);
            $oId = htmlspecialchars($_POST['o_id']);
    
            $sql = "INSERT INTO `flats` VALUES ('$fId','$oId')";
            $result = mysqli_query($con,$sql);
    
            if($result){
                echo "
                    <script>
                        alert('Information has been stored !!');
                        document.location.href = 'adminAccount.php';
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('Unsuccessful, Sometimes Goes Wrong !!');
                        document.location.href = 'adminAccount.php';
                    </script>
                ";
            }
        }
        mysqli_close($con);
    ?>

    <div class="container">
        <h1 class="head text-center">Create Flat Profile</h1>  
        <div class="d-flex justify-content-center mt-4">
            <form action="adminFlatProfile.php" method="POST" class="w-50 ">
                <div class="mb-3 mt-2">
                    <label for="exampleInputEmail1" class="form-label">Flat ID</label>
                    <input type="text" name="id" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Flat Owner ID</label>
                    <input type="text" name="o_id" class="form-control" id="exampleInputEmail1" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-5">Create</button>
            </form>
        </div>
        
    </div>
    
</body>
</html>