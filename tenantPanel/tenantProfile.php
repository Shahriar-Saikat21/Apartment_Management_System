<!DOCTYPE html>
<html lang="en">
    <?php include('tenantHeader.php'); 
        include('../databaseConnection.php');
        session_start();

        $id = $_SESSION['id'];

        $sql = "SELECT T.flat_Id,T.name,T.nid,T.address,T.phone,T.image,T.rent,
            O.name AS ownerName,O.nid AS ownerNID,O.address AS ownerAdd,O.phone AS ownerPhone,O.image AS ownerImg,
            DATEDIFF(CURRENT_DATE(),T.rent) AS timePeriod
            FROM `tenant` AS T 
            INNER JOIN flats AS F 
            ON T.flat_Id = F.id 
            INNER JOIN flatowner AS O 
            ON F.ownerId = O.id 
            WHERE T.id = '$id'";
        $record = mysqli_query($con,$sql);
        $result = mysqli_fetch_all($record,MYSQLI_ASSOC);
        mysqli_free_result($record);
        mysqli_close($con); 

        if(!$result){
            echo "
                <script>
                    alert('Unsuccessful, Sometimes Goes Wrong !!');
                    document.location.href = '../index.php';
                </script>
            ";
        }

    ?>

    <div class="container">
        <h1 class="head text-center">Your Detail Information</h1> 
        <div class="row my-5">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <?php echo '<img src = "data:image;base64,'.base64_encode($result[0]['image']).' " alt="..." >';?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Tenant Detail</h5>
                                <p class="card-text">Tenant ID: <?php echo $id;?></p>
                                <p class="card-text">Name:<?php echo $result[0]['name'];?></p>
                                <p class="card-text">NID: <?php echo $result[0]['nid'];?></p>
                                <p class="card-text">Permanent Address: <?php echo $result[0]['address'];?></p>
                                <p class="card-text">Phone: <?php echo $result[0]['phone'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <?php echo '<img src = "data:image;base64,'.base64_encode($result[0]['ownerImg']).' " alt="...">';?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Owner Detail</h5>
                                <p class="card-text">Flat ID: <?php echo $result[0]['flat_Id'];?></p>
                                <p class="card-text">Name: <?php echo $result[0]['ownerName'];?></p>
                                <p class="card-text">NID: <?php echo $result[0]['ownerNID'];?></p>
                                <p class="card-text">Permanent Address: <?php echo $result[0]['ownerAdd'];?></p>
                                <p class="card-text">Phone: <?php echo $result[0]['ownerPhone'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Other Informations</h5>
                        <p class="card-text">Rent Date: <?php echo $result[0]['rent'];?></p>
                        <p class="card-text">Rent Period: <?php echo $result[0]['timePeriod'];?> Days</p>
                        <p class="card-text">More Emergency Contact: <i>Manager : 01022 - 001122 ,</i>
                         <i>CareTaker : 01022 - 0011277 </i> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
