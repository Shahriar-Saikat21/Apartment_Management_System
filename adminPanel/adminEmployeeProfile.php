<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');
        if(isset($_POST['submit'])){
            $id = htmlspecialchars($_POST['id']);
            $name = htmlspecialchars($_POST['name']);
            $nid = htmlspecialchars($_POST['nid']);
            $designation = htmlspecialchars($_POST['designation']);
            $status = (int)htmlspecialchars($_POST['status']);
            $address = htmlspecialchars($_POST['address']);
            $phone = htmlspecialchars($_POST['phone']);
            $salary = (int)htmlspecialchars($_POST['salary']);
            $a_id= htmlspecialchars($_POST['a_id']);
            $join = date('Y-m-d', strtotime($_POST['start'])); 
            $ex = date('Y-m-d', strtotime($_POST['end'])); 
            $pic = addslashes($_FILES['pic']['tmp_name']);
            $pic_name = addslashes($_FILES['pic']['tmp_name']);
            $pic = file_get_contents($pic);
            $pic = base64_encode($pic);
    
            $sql = "INSERT INTO `employee` VALUES ('$id','$name','$nid','$designation',
                    '$address','$phone','$salary','$status','$a_id','$join','$ex','$pic')";
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
        <h1 class="head text-center">Create Employee Profile</h1>  
        <div class="d-flex justify-content-center mt-4">
            <form action="adminEmployeeProfile.php" method="POST" class="w-50" enctype="multipart/form-data">
                <div class="mb-3 mt-2">
                    <label for="exampleInputEmail1" class="form-label">Employee ID</label>
                    <input type="text" name="id" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NID No.</label>
                    <input type="text" name="nid" class="form-control" id="exampleInputEmail1" required>
                </div>
                <select class="form-select my-3" id="floatingSelect" name="designation">
                    <option value="" disabled selected hidden>Designation</option>
                    <option value="Security Guard">Security Guard</option>
                    <option value="Care Taker">Care Taker</option>
                    <option value="Technical">Technical</option>
                    <option value="Worker">Worker</option>    
                </select>
                <select class="form-select my-3" id="floatingSelect" name="status">
                    <option value="" disabled selected hidden>Status</option>
                    <option value="1">Active</option>
                    <option value="0">Ex-Employee</option>   
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Salary</label>
                    <input type="text" name="salary" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Admin ID</label>
                    <input type="text" name="a_id" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="form-group my-3">
                    <label for="">Joining Date </label>
                    <input type="date" name="start" class="form-control" />
                </div>
                <div class="form-group my-3">
                    <label for="">End Date </label>
                    <input type="date" name="end" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Image</label>
                    <input class="form-control" type="file" id="formFile" name="pic">
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-5">Create</button>
            </form>
        </div>
        
    </div>
    
</body>
</html>