<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');
        
        $id = $_GET['id'];

        $sqlTwo = "SELECT * FROM employee WHERE id = '$id'";
        $resultTwo = mysqli_query($con,$sqlTwo);

        $record = mysqli_fetch_all($resultTwo,MYSQLI_ASSOC);
        mysqli_free_result($resultTwo);
        
    ?>

    <div class="container">
        <h1 class="head text-center">Employee Information Update</h1> 
        <div class="d-flex justify-content-center mt-4">
            <form action="adminEmployeeUpdate.php" method="POST" class="w-50" enctype="multipart/form-data">
                <div class="mb-3 mt-2">
                    <label for="exampleInputEmail1" class="form-label">Employee ID</label>
                    <input type="text" name="id" class="form-control" id="exampleInputEmail1" value="<?=$id;?>" readonly required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="<?=$record[0]['name'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NID No.</label>
                    <input type="text" name="nid" class="form-control" id="exampleInputEmail1" value="<?=$record[0]['nid'];?>" required>
                </div>
                <select class="form-select my-3" id="floatingSelect" name="designation" required>
                    <option value="" disabled selected hidden>Designation</option>
                    <option value="Security Guard">Security Guard</option>
                    <option value="Care Taker">Care Taker</option>
                    <option value="Technical">Technical</option>
                    <option value="Worker">Worker</option>    
                </select>
                <select class="form-select my-3" id="floatingSelect" name="status" required>
                    <option value="" disabled selected hidden>Status</option>
                    <option value="1">Active</option>
                    <option value="0">Ex-Employee</option>   
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
                    <label for="exampleInputEmail1" class="form-label">Salary</label>
                    <input type="text" name="salary" class="form-control" id="exampleInputEmail1" value="<?=$record[0]['salary'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Admin ID</label>
                    <input type="text" name="a_id" class="form-control" id="exampleInputEmail1" value="<?=$record[0]['adminId'];?>" readonly required>
                </div>
                <div class="form-group my-3">
                    <label for="">Joining Date </label>
                    <input type="date" name="start" class="form-control" value="<?=$record[0]['start_time'];?>" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">End Date </label>
                    <input type="date" name="end" class="form-control"
                        value="<?php if($record[0]['end_time']=='1970-01-01'){
                            echo "";
                        }else{ 
                            echo $record[0]['end_time'];
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

            $sql = "UPDATE `employee` SET  name = '$name',nid = '$nid',designation = '$designation',
            address = '$address',phone = '$phone',salary = '$salary',_status = '$status',
            adminId = '$a_id',start_time = '$join',end_time = '$ex' WHERE id = '$id'";

            $result = mysqli_query($con,$sql);
    
            if($result){
                echo "
                    <script>
                        alert('Information has been Updated !!');
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