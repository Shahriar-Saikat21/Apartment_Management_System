<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');
        
        $id = $_GET['id'];

        $sqlTwo = "SELECT * FROM flatOwner WHERE id = '$id'";
        $resultTwo = mysqli_query($con,$sqlTwo);

        $record = mysqli_fetch_all($resultTwo,MYSQLI_ASSOC);
        mysqli_free_result($resultTwo);


        mysqli_close($con);

    ?>

    <div class="container">
        <h1 class="head text-center">Update Flat Owner Profile</h1>  
        <div class="d-flex justify-content-center mt-4">
            <form action="adminFlatOwnerProfile.php" method="POST" class="w-50 " enctype="multipart/form-data">
                <div class="mb-3 mt-2">
                    <label for="exampleInputEmail1" class="form-label">FlatOwner ID</label>
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
                <select class="form-select my-3" id="floatingSelect" name="status" required>
                    <option value="" disabled selected hidden>Status</option>
                    <option value="1">Active</option>
                    <option value="0">Ex-Flat Owner</option>   
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
                    <label for="">Buying Date </label>
                    <input type="date" name="start" class="form-control" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Selling Date </label>
                    <input type="date" name="end" class="form-control" />
                </div>
                <!-- <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Image</label>
                    <input class="form-control" type="file" id="formFile" name="pic" required>
                </div> -->
                <button type="submit" name="submit" class="btn btn-primary mb-5">Update</button>
                <a class="btn btn-outline-primary mb-5" href="../adminPanel/adminSearch.php" role="button">Cancel</a>
            </form>
        </div>
        
    </div>

    
</body>
</html>