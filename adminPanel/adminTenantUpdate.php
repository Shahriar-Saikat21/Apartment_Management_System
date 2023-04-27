<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');

        $id = $_GET['id'];

        $sqlTwo = "SELECT * FROM tenant WHERE id = '$id'";
        $resultTwo = mysqli_query($con,$sqlTwo);

        $record = mysqli_fetch_all($resultTwo,MYSQLI_ASSOC);
        mysqli_free_result($resultTwo);

        $sqlThree = "SELECT * FROM `flats`";
        $resultThree = mysqli_query($con,$sqlThree);
    
        $recordTwo = mysqli_fetch_all($resultThree,MYSQLI_ASSOC);
        mysqli_free_result($resultThree);
        
    ?>

    <div class="container">
        <h1 class="head text-center">Tenant Information Update</h1> 
        <div class="d-flex justify-content-center mt-4">
            <form action="adminTenantUpdate.php" method="POST" class="w-50 " enctype="multipart/form-data">
                <div class="mb-3 mt-2">
                    <label for="exampleInputEmail1" class="form-label">Tenant ID</label>
                    <input type="text" name="id" class="form-control" id="exampleInputEmail1" value="<?=$id;?>" readonly required>
                </div>
                <select class="form-select" id="floatingSelect" name="flatId" required>
                    <option value="" disabled selected hidden>Select Flat Id</option>
                    <?php foreach($recordTwo as $value){ ?>
                        <option value="<?=$value['id'];?>"><?php echo htmlspecialchars($value['id']);?></option>
                    <?php }?>
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?=$record[0]['name'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NID No.</label>
                    <input type="text" name="nid" class="form-control" id="exampleInputEmail1" value="<?=$record[0]['nid'];?>" required>
                </div>
                <select class="form-select my-3" id="floatingSelect" name="status" required>
                    <option value="" disabled selected hidden>Status</option>
                    <option value="1">Active</option>
                    <option value="0">Ex-Tenant</option>   
                </select>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleInputEmail1" value="<?=$record[0]['address'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" value="<?=$record[0]['phone'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Password</label>
                    <input type="text" name="password" class="form-control" id="exampleInputEmail1" value="<?=$record[0]['_password'];?>" required>
                </div>
                <div class="form-group my-3">
                    <label for="">Flat Hire Date </label>
                    <input type="date" name="start" class="form-control" value="<?=$record[0]['rent'];?>" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Flat Release Date </label>
                    <input type="date" name="end" class="form-control" 
                        value="<?php if($record[0]['_release']=='1970-01-01'){
                            echo "";
                        }else{ 
                            echo $record[0]['_release'];
                        }?>"
                    />
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
            $f_id = htmlspecialchars($_POST['flatId']);
            $name = htmlspecialchars($_POST['name']);
            $nid = htmlspecialchars($_POST['nid']);
            $status = (int)htmlspecialchars($_POST['status']);
            $address = htmlspecialchars($_POST['address']);
            $phone = htmlspecialchars($_POST['phone']);
            $password = htmlspecialchars($_POST['password']);
            $rent = date('Y-m-d', strtotime($_POST['start'])); 
            $realese = date('Y-m-d', strtotime($_POST['end'])); 

            $sql = "UPDATE `tenant` SET  flat_Id ='$f_id',name = '$name',nid = '$nid',
            address = '$address',phone = '$phone',_status = '$status',
            _password = '$password',rent = '$rent',
            _release = '$realese' WHERE id = '$id'";

    
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