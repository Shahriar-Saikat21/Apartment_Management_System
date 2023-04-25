<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
    
        include('../databaseConnection.php');

        if(isset($_POST['submit'])){
            $id = htmlspecialchars($_POST['id']);
            $option = htmlspecialchars($_POST['option']);

            $sql = "";
            $flag = "";
            if($option=='owner'){
                $sql = "SELECT * FROM `flatowner` where BINARY id = '$id'";
                $flag = 1;
            }else if($option=='tenant'){
                $sql = "SELECT * FROM `tenant`where BINARY id = '$id'";
                $flag = 2;
            }else{
                $sql = "SELECT * FROM `employee`where BINARY id = '$id'";
                $flag = 3;
            }

            $record = mysqli_query($con,$sql);
            $result = mysqli_fetch_all($record,MYSQLI_ASSOC);
            mysqli_free_result($record);
            mysqli_close($con); 

            if(!$result){
                echo "
                    <script>
                        alert('NO records found !!');
                        document.location.href = '../adminPanel/adminSearch.php';
                    </script>
                ";
            }

        }  
    ?>

    <div class="container">
        <h1 class="head text-center">Detail Information</h1>
        <?php if($flag == 1){?> 
            <div class="row my-5">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php echo '<img src = "data:image;base64,'.base64_encode($result[0]['image']).' " alt="..." >';?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Flat Owner Detail</h5>
                                    <p class="card-text">Flat Owner ID: <?php  echo $id;?></p>
                                    <p class="card-text">Name:<?php echo $result[0]['name'];?></p>
                                    <p class="card-text">NID: <?php echo $result[0]['nid'];?></p>
                                    <p class="card-text">Permanent Address: <?php echo $result[0]['address'];?></p>
                                    <p class="card-text">Phone: <?php echo $result[0]['phone'];?></p>
                                    <p class="card-text">Status: <?php if($result[0]['_status']==1){
                                            echo "Active";
                                        }else{
                                            echo "Ex";
                                        }                            
                                    ?></p>
                                    <p class="card-text">Buying Date: <?php echo $result[0]['buying'];?></p>
                                    <p class="card-text">Selling Date: 
                                    <?php if($result[0]['selling']=='1970-01-01'){
                                        echo "N/A";
                                    }else{
                                        echo $result[0]['selling'];
                                    }                            
                                    ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary" href="../adminPanel/adminFlatOwnerUpdate.php?id=<?php echo $id;?>" role="button">Update Detail</a>
            <a class="btn btn-outline-primary" href="../adminPanel/adminSearch.php" role="button">Back To Search</a>
        <?php }else if($flag==2){?>
            <div class="row my-5">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php echo '<img src = "data:image;base64,'.base64_encode($result[0]['image']).' " alt="..." >';?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Tenant Detail</h5>
                                    <p class="card-text">Tenant ID: <?php  echo $id;?></p>
                                    <p class="card-text">Flat ID:<?php echo $result[0]['flat_Id'];?></p>
                                    <p class="card-text">Name:<?php echo $result[0]['name'];?></p>
                                    <p class="card-text">NID: <?php echo $result[0]['nid'];?></p>
                                    <p class="card-text">Permanent Address: <?php echo $result[0]['address'];?></p>
                                    <p class="card-text">Phone: <?php echo $result[0]['phone'];?></p>
                                    <p class="card-text">Status: 
                                        <?php if($result[0]['_status']==1){
                                            echo "Active";
                                        }else{
                                            echo "Ex";
                                        }                            
                                    ?></p>
                                    <p class="card-text">Rent Date: <?php echo $result[0]['rent'];?></p>
                                    <p class="card-text">Leave Date: 
                                    <?php if($result[0]['_release']=='1970-01-01'){
                                        echo "N/A";
                                    }else{
                                        echo $result[0]['_release'];
                                    }                            
                                    ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary" href="../adminPanel/adminTenantUpdate.php?id=<?php echo $id;?>" role="button">Update Detail</a>
            <a class="btn btn-outline-primary" href="../adminPanel/adminSearch.php" role="button">Back To Search</a>
        <?php }else{?>
            <div class="row my-5">
                <div class="col-sm-12 mb-3 mb-sm-0">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php echo '<img src = "data:image;base64,'.base64_encode($result[0]['image']).' " alt="..." >';?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Employee Detail</h5>
                                    <p class="card-text">Employee ID: <?php  echo $id;?></p>
                                    <p class="card-text">Name:<?php echo $result[0]['name'];?></p>
                                    <p class="card-text">NID: <?php echo $result[0]['nid'];?></p>
                                    <p class="card-text">Permanent Address: <?php echo $result[0]['address'];?></p>
                                    <p class="card-text">Designation: <?php echo $result[0]['designation'];?></p>
                                    <p class="card-text">Salary: <?php echo $result[0]['salary'];?></p>
                                    <p class="card-text">Phone: <?php echo $result[0]['phone'];?></p>
                                    <p class="card-text">Status: 
                                        <?php if($result[0]['_status']==1){
                                            echo "Active";
                                        }else{
                                            echo "Ex";
                                        }                            
                                    ?></p>
                                    <p class="card-text">Join Date: <?php echo $result[0]['start_time'];?></p>
                                    <p class="card-text">Leave Date: 
                                    <?php if($result[0]['end_time']=='1970-01-01'){
                                        echo "N/A";
                                    }else{
                                        echo $result[0]['end_time'];
                                    }                            
                                    ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary" href="../adminPanel/adminEmployeeUpdate.php?id=<?php echo $id;?>" role="button">Update</a>
            <a class="btn btn-outline-primary" href="../adminPanel/adminSearch.php" role="button">Back To Search</a>
        <?php } ?>  
    </div>

</body>
</html>