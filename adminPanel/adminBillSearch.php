<!DOCTYPE html>
<html lang="en">
<?php include('adminHeader.php'); 
        include('../databaseConnection.php');
        if(isset($_POST['submit'])){
            $fid = htmlspecialchars($_POST['flatId']);

            $sql = "SELECT *,(rent+maintenance+e_bill+w_bill+g_bill) AS total FROM `bill` WHERE flat_id = '$fid' ORDER BY _time DESC";

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
        <h1 class="head text-center">Search Flats Monthly Bills</h1>  
        <h2 class="head text-center">Flat ID :<?php echo $fid;?></h2>  
        <div>
            <a class="btn btn-outline-primary" href="../adminPanel/adminSearch.php" role="button">Back To Search</a>
        </div> 
        <table class="table table-striped">
            <thead>
                    <th scope="col">Tenant ID</th>
                    <th scope="col">Rent</th>
                    <th scope="col">Maintenance</th>
                    <th scope="col">Electric Bill</th>
                    <th scope="col">E Bill Ref</th>
                    <th scope="col">Gas Bill</th>
                    <th scope="col">G Bill Ref</th>
                    <th scope="col">Water Bill</th>
                    <th scope="col">W Bill Ref</th>
                    <th scope="col">Total</th>
                    <th scope="col">Time</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result as $i){?>
                        <tr>
                            <th scope="row"><?php echo $i['tenant_id'];?></th>
                            <td><?php echo $i['rent'];?></td>
                            <td><?php echo $i['maintenance'];?></td>
                            <td><?php echo $i['e_bill'];?></td>
                            <td><?php echo $i['e_ref'];?></td>
                            <td><?php echo $i['w_bill'];?></td>
                            <td><?php echo $i['w_ref'];?></td>
                            <td><?php echo $i['g_bill'];?></td>
                            <td><?php echo $i['g_ref'];?></td>
                            <td><?php echo $i['total'];?></td>
                            <td><?php echo $i['_time'];?></td>
                            <td><button class="btn btn-primary">Update</button></td>
                            <td><button class="btn btn-danger">Delete</button></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>

