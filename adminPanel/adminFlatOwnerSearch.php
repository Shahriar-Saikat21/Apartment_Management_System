<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');
        if(isset($_POST['submit'])){
            $status = (int)htmlspecialchars($_POST['status']);

            $sql = "";
            if($status==1){
                $sql = "SELECT * FROM `flatowner` WHERE _status = '$status'";
            }else if($status==0){
                $sql = "SELECT * FROM `flatowner` WHERE _status = '$status'";
            }else{
                $sql = "SELECT * FROM `flatowner`";
            }

            $record = mysqli_query($con,$sql);
            $result = mysqli_fetch_all($record,MYSQLI_ASSOC);
            mysqli_free_result($record);
            mysqli_close($con); 

            if(!$result){
                echo "
                    <script>
                        alert('No Records found !!');
                        document.location.href = '../adminPanel/adminSearch.php';
                    </script>
                ";
            }

        }
        
    ?>

    <div class="container">
        <h1 class="head text-center">Search Flat Owners Profile</h1> 
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
                    <th scope="col">Buying Date</th>
                    <th scope="col">Selling Date</th>
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
                            <td><?php echo $i['buying'];?></td>
                            <td><?php if($i['selling']=="1970-01-01"){
                                echo "Not Applicable";
                            }else{
                                echo $i['selling'];
                            }
                            
                            ?></td>
                            <td><?php echo '<img src = "data:image;base64,'.base64_encode($i['image']).' " alt="..." >';?></td>
                            <td><a class="btn btn-primary" href="../adminPanel/adminFlatOwnerUpdate.php?id=<?php echo $i['id'];?>" role="button">Update</a></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>