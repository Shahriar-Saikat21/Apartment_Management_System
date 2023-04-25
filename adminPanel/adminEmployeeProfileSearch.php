<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');
        if(isset($_POST['submit'])){
            $status = (int)htmlspecialchars($_POST['status']);
            $post = htmlspecialchars($_POST['designation']);

            $sql = "";
            if($status==1){
                $sql = "SELECT * FROM `employee` WHERE _status = '$status' AND designation = '$post'";
            }else if($status==0){
                $sql = "SELECT * FROM `employee` WHERE _status = '$status'AND designation = '$post'";
            }else{
                $sql = "SELECT * FROM `employee`WHERE designation = '$post'";
            }

            $record = mysqli_query($con,$sql);
            $result = mysqli_fetch_all($record,MYSQLI_ASSOC);
            mysqli_free_result($record);
            mysqli_close($con); 

            if(!$result){
                echo "
                    <script>
                        alert('No records found !!');
                        document.location.href = '../adminPanel/adminSearch.php';
                    </script>
                ";
            }

        }
        
    ?>

    <div class="container">
        <h1 class="head text-center">Search Employee Profile</h1> 
        <div>
            <a class="btn btn-outline-primary" href="../adminPanel/adminSearch.php" role="button">Back To Search</a>
        </div> 
        <table class="table table-striped">
            <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">NID</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Salary</th>
                    <th scope="col">Join Date</th>
                    <th scope="col">Leaving Date</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result as $i){?>
                        <tr>
                            <th scope="row"><?php echo $i['id'];?></th>
                            <td><?php echo $i['name'];?></td>
                            <td><?php echo $i['nid'];?></td>
                            <td><?php echo $i['address'];?></td>
                            <td><?php echo $i['phone'];?></td>
                            <td><?php echo $i['salary'];?></td>
                            <td><?php echo $i['start_time'];?></td>
                            <td><?php if($i['end_time']=="1970-01-01"){
                                echo "Not Applicable";
                            }else{
                                echo $i['end_time'];
                            }
                            
                            ?></td>
                            <td><?php echo '<img src = "data:image;base64,'.base64_encode($i['image']).' " alt="..." >';?></td>
                            <td><a class="btn btn-primary" href="../adminPanel/adminEmployeeUpdate.php?id=<?php echo $i['id'];?>" role="button">Update</a></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>