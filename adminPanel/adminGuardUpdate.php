<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');

        $id = $_GET['id'];

        $s = "SELECT * FROM `employee` WHERE _status = 1 AND designation = 'Security Guard'";
        $r = mysqli_query($con,$s);
        $re = mysqli_fetch_all($r,MYSQLI_ASSOC);
        mysqli_free_result($r);

        $sqlTwo = "SELECT * FROM guard WHERE id = '$id'";
        $resultTwo = mysqli_query($con,$sqlTwo);

        $record = mysqli_fetch_all($resultTwo,MYSQLI_ASSOC);
        mysqli_free_result($resultTwo);

        
    ?>

    <div class="container">
        <h1 class="head text-center">Guard Information Update</h1> 
        <div class="d-flex justify-content-center mt-4">
            <form action="adminGuardUpdate.php" method="POST" class="w-50 ">
                <div class="mb-3 mt-2">
                    <label for="exampleInputEmail1" class="form-label">Guard ID</label>
                    <input type="text" name="id" class="form-control" id="exampleInputEmail1" value="<?=$id;?>" readonly required>
                </div>
                <select class="form-select my-3" id="floatingSelect" name="e_id">
                    <option value="" disabled selected hidden>Select Employee ID</option>
                    <?php foreach($re as $value){ ?>
                        <!-- should available only unregister s.guard id -->
                        <option value="<?=$value['id'];?>"><?php echo htmlspecialchars($value['id']);?></option>
                    <?php }?>
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" id="exampleInputEmail1"  value="<?=$record[0]['_password'];?>" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-5">Update</button>
                <a class="btn btn-outline-primary mb-5" href="../adminPanel/adminSearch.php" role="button">Cancel</a>
            </form>
        </div>
    </div>

    <?php 
        if(isset($_POST['submit'])){
            $gId = htmlspecialchars($_POST['id']);
            $eId = htmlspecialchars($_POST['e_id']);
            $password = htmlspecialchars($_POST['password']);
    
            $sql = "UPDATE `guard` SET employee_Id = '$eId',_password = '$password'
                WHERE id = '$gId'";
    
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
        mysqli_close($con); 
    ?>
    
</body>
</html>