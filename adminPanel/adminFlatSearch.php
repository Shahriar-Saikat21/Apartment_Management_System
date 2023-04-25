<!DOCTYPE html>
<html lang="en">
    <?php 
        include('adminHeader.php'); 
        include('../databaseConnection.php');

        if(isset($_POST['submit'])){
            $fid = htmlspecialchars($_POST['flatId']) ;

            $sql = "SELECT flatowner.id AS FOID, flatowner.name AS FONM ,flatowner.phone AS FOPHN,flatowner.image AS FOIMG,
                tenant.id AS TID, tenant.name AS TNAME, tenant.phone AS TPHN , tenant.image AS TIMG
                FROM `flats` 
                INNER JOIN tenant
                ON flats.id = tenant.flat_Id
                INNER JOIN flatowner
                ON flats.ownerId = flatowner.id
                WHERE flats.id = '$fid'";

            $record = mysqli_query($con,$sql);

            $result = mysqli_fetch_all($record,MYSQLI_ASSOC);
            mysqli_free_result($record);
            mysqli_close($con);
        }

        if(!$result){
            echo "
                <script>
                    alert('No records has been found !!');
                    document.location.href = '../adminPanel/adminSearch.php';
                </script>
            ";
        }
    ?>

    <div class="container">
        <h1 class="head text-center">Flat ID : <?php echo $fid;?></h1>  
        <?php foreach($result as $i){ ?>
            <div class="row my-5">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php echo '<img src = "data:image;base64,'.base64_encode($i['FOIMG']).' " alt="..." >';?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Flat Owner Detail</h5>
                                    <p class="card-text">Flat Owner ID:<?php echo $i['FOID'];?></p>
                                    <p class="card-text">Name:<?php echo $i['FONM'];?></p>
                                    <p class="card-text">Phone: <?php echo $i['FOPHN'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                            <?php echo '<img src = "data:image;base64,'.base64_encode($i['TIMG']).' " alt="..." >';?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Tenant Detail</h5>
                                    <p class="card-text">Tenant ID:<?php echo $i['TID'];?></p>
                                    <p class="card-text">Name:<?php echo $i['TNAME'];?></p>
                                    <p class="card-text">Phone: <?php echo $i['TPHN'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-primary" href="../adminPanel/adminFlatUpdate.php?id=<?php echo $fid;?>" role="button">Update</a>
            <a class="btn btn-outline-primary" href="../adminPanel/adminSearch.php" role="button">Back To Search</a>
        <?php } ?>
        
    </div>
    
    
</body>
</html>
