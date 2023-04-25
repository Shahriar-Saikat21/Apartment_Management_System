<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');
        if(isset($_POST['submit'])){
            $status = (int)htmlspecialchars($_POST['status']);

            $sql = "";
            if($status==1){
                $sql = "SELECT guard.id AS id ,employee_Id,employee.name AS eid,employee.phone AS phone, employee.start_time AS s,employee.end_time AS o, employee.image AS img
                FROM `guard` 
                INNER JOIN employee
                ON guard.employee_Id = employee.id
                WHERE guard._status = '$status'";
            }else if($status==0){
                $sql = "SELECT guard.id AS id ,employee_Id,employee.name AS eid, employee.phone AS phone,employee.start_time AS s,employee.end_time AS o, employee.image AS img
                FROM `guard` 
                INNER JOIN employee
                ON guard.employee_Id = employee.id
                WHERE guard._status = '$status'";
            }else{
                $sql = "SELECT guard.id AS id ,employee_Id,employee.name AS eid,employee.phone AS phone, employee.start_time AS s,employee.end_time AS o, employee.image AS img
                FROM `guard` 
                INNER JOIN employee
                ON guard.employee_Id = employee.id";
            }

            $record = mysqli_query($con,$sql);
            $result = mysqli_fetch_all($record,MYSQLI_ASSOC);
            mysqli_free_result($record);
            mysqli_close($con); 

            if(!$result){
                echo "
                    <script>
                        alert('No records has been found !! !!');
                        document.location.href = '../adminPanel/adminSearch.php';
                    </script>
                ";
            }

        }
        
    ?>

    <div class="container">
        <h1 class="head text-center">Search Guard Profile</h1> 
        <div>
            <a class="btn btn-outline-primary" href="../adminPanel/adminSearch.php" role="button">Back To Search</a>
        </div> 
        <table class="table table-striped">
            <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Employee ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Service Start</th>
                    <th scope="col">Service End</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result as $i){?>
                        <tr>
                            <th scope="row"><?php echo $i['id'];?></th>
                            <td><?php echo $i['employee_Id'];?></td>
                            <td><?php echo $i['eid'];?></td>
                            <td><?php echo $i['phone'];?></td>
                            <td><?php echo $i['s'];?></td>
                            <td><?php if($i['o']=="1970-01-01"){
                                echo "Not Applicable";
                            }else{
                                echo $i['o'];
                            }
                            
                            ?></td>
                            <td><?php echo '<img src = "data:image;base64,'.base64_encode($i['img']).' " alt="..." >';?></td>
                            <td><button class="btn btn-primary">Update</button></td>                            
                            <td><a class="btn btn-danger" href="../adminPanel/adminGuardDelete.php?id=<?php echo $i['id'];?>" role="button">Delete</a></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>