<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');

        $s = "SELECT * FROM `employee` WHERE _status = 1 AND designation = 'Security Guard'";
        $r = mysqli_query($con,$s);
        $re = mysqli_fetch_all($r,MYSQLI_ASSOC);
        mysqli_free_result($r);


        if(isset($_POST['submit'])){
            $gId = htmlspecialchars($_POST['id']);
            $eId = htmlspecialchars($_POST['e_id']);
            $password = htmlspecialchars($_POST['password']);
    
            $sql = "INSERT INTO `guard` VALUES ('$gId','$eId','$password',1)";
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
        <h1 class="head text-center">Create Guard Profile</h1>  
        <div class="d-flex justify-content-center mt-4">
            <form action="adminGuardProfile.php" method="POST" class="w-50 ">
                <div class="mb-3 mt-2">
                    <label for="exampleInputEmail1" class="form-label">Guard ID</label>
                    <input type="text" name="id" class="form-control" id="exampleInputEmail1" required>
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
                    <input type="text" name="password" class="form-control" id="exampleInputEmail1" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
        
    </div>
    
</body>
</html>