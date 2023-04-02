<!DOCTYPE html>
<html lang="en">
    <?php include('guardHeader.php'); ?>

    <div class="container">
        <?php       
        include('../databaseConnection.php');
            if(isset($_POST['submit'])){ 
                $fId = htmlspecialchars($_POST['flatId']);
                $dob = date('Y-m-d', strtotime($_POST['date'])); 

                $sql = "SELECT * FROM `guest` WHERE flat_id = '$fId' AND _time = '$dob'";
                $result = mysqli_query($con,$sql);

                $users = mysqli_fetch_all($result,MYSQLI_ASSOC);

                mysqli_free_result($result);
                mysqli_close($con); 

            }
        ?>
        <h1 class="head text-center">Guest List</h1>
        <p class="card-text">Flat ID : <?php echo htmlspecialchars($fId)?></p>
        <p class="card-text">Date : <?php echo htmlspecialchars($dob)?></p>
        <?php foreach($users as $i){ ?>
            <div class="card w-75 mb-3">
                <div class="card-body">
                    <h5 class="card-title">Guest Name : <?php echo htmlspecialchars($i['name'])?></h5>
                    <p class="card-text">Address: <?php echo htmlspecialchars($i['address'])?></p>
                    <p class="card-text">Phone: <?php echo htmlspecialchars($i['phone'])?></p>
                </div>
            </div>
        <?php } ?>  
    </div>

</body>
</html>