<!DOCTYPE html>
<html lang="en">
    <?php

        include('flatOwnerHeader.php');
        include('../databaseConnection.php'); 
        session_start();

        $id = $_SESSION['id'];

        if(isset($_POST['submit'])){
            $fId = $_POST['flatId'];
            $option = $_POST['option'];


            if($option==1){
                $sql = "SELECT T.name AS name, T.nid AS nid, T.address AS address, 
                T.phone AS phone, T.image AS img, T.rent AS rent,T._release AS _go
                FROM tenant AS T
                INNER JOIN flats AS F
                ON T.flat_Id = F.id
                INNER JOIN flatowner AS FO
                ON F.ownerId = FO.id
                WHERE F.id = '$fId' AND T._status = 1";
            }else if($option==0){
                $sql="SELECT T.name AS name, T.nid AS nid, T.address AS address, 
                T.phone AS phone, T.image AS img, T.rent AS rent,T._release AS _go
                FROM tenant AS T
                INNER JOIN flats AS F
                ON T.flat_Id = F.id
                INNER JOIN flatowner AS FO
                ON F.ownerId = FO.id
                WHERE F.id = '$fId' AND T._status = 0";;
            }
        }

        $record = mysqli_query($con,$sql);
        $result = mysqli_fetch_all($record,MYSQLI_ASSOC);

        $op = '';
        if($result[0]['_go']=='1970-01-01'){
            $op = "Not Applicable";
        }else{
            $op = $result[0]['_go'];
        }

        mysqli_free_result($record);
        mysqli_close($con); 

        if(!$result){
            echo "
                <script>
                    alert('No information was found !!');
                    document.location.href = 'flatOwnerSearch.php';
                </script>
            ";
        }
    ?>

    <div class="container">
        <h1 class="head text-center">Your Detail Information</h1>
        <?php foreach($result as $i){?>
            <div class="row my-5">
                <div class="col-sm-6 mb-3 mb-sm-0 w-100">
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <?php echo '<img src = "data:image;base64,'.base64_encode($i['img']).' " alt="..." >';?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Tenant Detail</h5>
                                    <p class="card-text">Name:<?php echo $i['name'];?></p>
                                    <p class="card-text">NID: <?php echo $i['nid'];?></p>
                                    <p class="card-text">Permanent Address: <?php echo $i['address'];?></p>
                                    <p class="card-text">Phone: <?php echo $i['phone'];?></p>
                                    <p class="card-text">Rent Date: <?php echo $i['rent'];?></p>
                                    <p class="card-text">Leave Date: <?php echo $op;?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        
        
        <?php } ?>
         
    </div>

    
</body>
</html>