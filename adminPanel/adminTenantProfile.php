<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');
        $sql = "SELECT * FROM `flats`";
        $result = mysqli_query($con,$sql);
    
        $record = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);
        mysqli_close($con);       
    ?>

    <div class="container">
        <h1 class="head text-center">Create Tenant Profile</h1>  
        <div class="d-flex justify-content-center mt-4">
            <form action="adminTenantProfileFunc.php" method="POST" class="w-50 ">
                <div class="mb-3 mt-2">
                    <label for="exampleInputEmail1" class="form-label">Tenant ID</label>
                    <input type="text" name="id" class="form-control" id="exampleInputEmail1" required>
                </div>
                <select class="form-select" id="floatingSelect" name="flatId">
                    <option value="" disabled selected hidden>Select Flat Id</option>
                    <?php foreach($record as $value){ ?>
                        <option value="<?=$value['id'];?>"><?php echo htmlspecialchars($value['id']);?></option>
                    <?php }?>
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NID No.</label>
                    <input type="text" name="nid" class="form-control" id="exampleInputEmail1" required>
                </div>
                <select class="form-select my-3" id="floatingSelect" name="status">
                    <option value="" disabled selected hidden>Status</option>
                    <option value="1">Active</option>
                    <option value="0">Ex-Tenant</option>   
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
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="form-group my-3">
                    <label for="">Flat Hire Date </label>
                    <input type="date" name="start" class="form-control" />
                </div>
                <div class="form-group my-3">
                    <label for="">Flat Release Date </label>
                    <input type="date" name="end" class="form-control" />
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Image</label>
                    <input class="form-control" type="file" id="formFile">
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-5">Create</button>
            </form>
        </div>
        
    </div>
    
</body>
</html>