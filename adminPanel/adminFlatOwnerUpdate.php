<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');
        
        $id = $_GET['id'];

        $sqlTwo = "SELECT * FROM flatOwner WHERE id = '$id'";
        $resultTwo = mysqli_query($con,$sqlTwo);

        $record = mysqli_fetch_all($resultTwo,MYSQLI_ASSOC);
        mysqli_free_result($resultTwo);

    ?>

    <div class="container">
        <h1 class="head text-center">Update Flat Owner Profile</h1>  
        <div class="d-flex justify-content-center mt-4">
            <form action="adminFlatOwnerUpdate.php" method="POST" class="w-50 " enctype="multipart/form-data">
                <div class="mb-3 mt-2">
                    <label for="exampleInputEmail1" class="form-label">FlatOwner ID</label>
                    <input type="text" name="id" class="form-control" id="exampleInputEmail1" value="<?=$id;?>" readonly required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?= $record[0]['name'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NID No.</label>
                    <input type="text" name="nid" class="form-control" id="exampleInputEmail1" value="<?= $record[0]['nid'];?>"required>
                </div>
                <select class="form-select my-3" id="floatingSelect" name="status" required>
                    <option value="" disabled selected hidden>Status</option>
                    <option value="1">Active</option>
                    <option value="0">Ex-Flat Owner</option>   
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" value="<?= $record[0]['address'];?>"required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" value="<?= $record[0]['phone'];?>"required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" id="exampleInputEmail1" value="<?= $record[0]['_password'];?>"required>
                </div>
                <div class="form-group my-3">
                    <label for="">Buying Date </label>
                    <input type="date" name="start" class="form-control" value="<?= $record[0]['buying'];?>"required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Selling Date </label>
                    <input type="date" name="end" class="form-control" 
                        value="<?php if($record[0]['selling']=='1970-01-01'){
                                    echo "";
                                }else{ 
                                    echo $record[0]['selling'];
                                }?>" />
                </div>
                <div class="mb-3">
                    <div class="col-md-4">
                        <?php echo '<img src = "data:image;base64,'.base64_encode($record[0]['image']).' " alt="..." >';?>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-5">Update</button>
                <a class="btn btn-outline-primary mb-5" href="../adminPanel/adminSearch.php" role="button">Cancel</a>
            </form>
        </div>
        
    </div>
    
    <?php 
        if(isset($_POST['submit'])){
            $id = htmlspecialchars($_POST['id']);
            $name = htmlspecialchars($_POST['name']);
            $nid = htmlspecialchars($_POST['nid']);
            $status = (int)htmlspecialchars($_POST['status']);
            $address = htmlspecialchars($_POST['address']);
            $phone = htmlspecialchars($_POST['phone']);
            $password = htmlspecialchars($_POST['password']);
            $buy = date('Y-m-d', strtotime($_POST['start'])); 
            $sell = date('Y-m-d', strtotime($_POST['end'])); 

            $sql = "UPDATE `flatowner` SET  name = '$name ',nid = '$nid',address ='$address',
                phone = '$phone',_status = '$status',_password = '$password',
                buying = '$buy',selling = '$sell' WHERE id = '$id'";

    
            
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