<!DOCTYPE html>
<html lang="en">
    <?php

        include('flatOwnerHeader.php');
        include('../databaseConnection.php'); 
        session_start();

        $id = $_SESSION['id'];

        $sql = "SELECT FO.name AS ownerName, FO.nid AS ownerID, FO.address AS ownerAdr, 
            FO.image AS ownerImg,FO.phone AS ownerPhone, buying, 
            F.id AS flatId, T.id AS tenantID, T.rent AS tenantRent
            FROM `flatowner` AS FO
            INNER JOIN flats AS F
            ON FO.id = F.ownerId
            INNER JOIN tenant AS T
            ON F.id = T.flat_Id
            WHERE FO.id = '$id' AND T._status = 1";
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
                            <?php echo '<img src = "data:image;base64,'.base64_encode($result[0]['ownerImg']).' " alt="..." >';?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Flat Owner Detail</h5>
                                <p class="card-text">Flat Owner ID: <?php  echo $id;?></p>
                                <p class="card-text">Name:<?php echo $result[0]['ownerName'];?></p>
                                <p class="card-text">NID: <?php echo $result[0]['ownerID'];?></p>
                                <p class="card-text">Permanent Address: <?php echo $result[0]['ownerAdr'];?></p>
                                <p class="card-text">Phone: <?php echo $result[0]['ownerPhone'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card px-5">
                    <div class="card-body">
                        <!-- should come from DB -->
                        <h5 class="card-title"><i> Emgergency Contact </i></h5>
                        <p class="card-text">Manager : 01022 - 001122</p>
                        <p class="card-text">CareTaker : 01022 - 001127</p>
                        <p class="card-text">Electrician : 01022 - 001789</p>
                        <p class="card-text">Fire Service : 01022 - 012344</p>
                        <p class="card-text">CareTaker : 01022 - 088995</p>
                    </div>
                </div>
            </div>
        </div>  
        <table class="table table-striped">
            <thead>
                    <th scope="col">Flat ID</th>
                    <th scope="col">Buying Date</th>
                    <th scope="col">Tenant ID</th>
                    <th scope="col">Rent Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($result as $i){?>
                        <tr>
                            <th scope="row"><?php echo $i['flatId'];?></th>
                            <td><?php echo $i['buying'];?></td>
                            <td><?php echo $i['tenantID'];?></td>
                            <td><?php echo $i['tenantRent'];?></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    
</body>
</html>