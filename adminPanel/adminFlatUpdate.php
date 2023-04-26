<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');
        $id = $_GET['id'];

        $s = "SELECT id FROM `flatowner` WHERE _status = 1";
        $r = mysqli_query($con,$s);
        $re = mysqli_fetch_all($r,MYSQLI_ASSOC);
        mysqli_free_result($r);

        if(isset($_POST['submit'])){
            $fId = htmlspecialchars($_POST['id']);
            $oId = htmlspecialchars($_POST['flatOwnerId']);
    
            $sql = "UPDATE`flats` SET ownerId = '$oId' WHERE id = '$fId'";
            $result = mysqli_query($con,$sql);
    
            if($result){
                echo "
                    <script>
                        alert('Information has been updated !!');
                        document.location.href = 'adminSearch.php';
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('Unsuccessful, Sometimes Goes Wrong !!');
                        document.location.href = 'adminSearch.php';
                    </script>
                ";
            }
        }
        
    ?>

    <div class="container">
        <h1 class="head text-center">Flat Information Update</h1> 
        <div class="d-flex justify-content-center mt-4">
            <form action="adminFlatUpdate.php" method="POST" class="w-50 ">
                <div class="mb-3 mt-2">
                    <label for="exampleInputEmail1" class="form-label">Flat ID</label>
                    <input type="text" name="id" class="form-control" id="exampleInputEmail1"  value="<?=$id;?>" readonly required>
                </div>
                <select class="form-select my-3" id="floatingSelect" name="flatOwnerId" required>
                    <option value="" disabled selected hidden>Select Flat Owner Id</option>
                    <?php foreach($re as $value){ ?>
                        <option value="<?=$value['id'];?>"><?php echo htmlspecialchars($value['id']);?></option>
                    <?php }?>
                </select>
                <button type="submit" name="submit" class="btn btn-primary mb-5">Update</button>
                <a class="btn btn-outline-primary mb-5" href="../adminPanel/adminSearch.php" role="button">Cancel</a>
            </form>
        </div>
    </div>
    
</body>
</html>