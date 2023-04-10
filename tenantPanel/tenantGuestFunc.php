<!DOCTYPE html>
<html lang="en">
    <?php include('tenantHeader.php');
        session_start(); 
        $id = $_SESSION['id'];
        include('../databaseConnection.php');

        $sqlTwo = "SELECT flat_id FROM `tenant` WHERE id = '$id'";
        $resultTwo = mysqli_query($con,$sqlTwo);
        $userTwo = mysqli_fetch_all($resultTwo,MYSQLI_ASSOC);
        $fId = $userTwo[0]['flat_id'];

        if(isset($_POST['submit'])){ 
            $dob = date('Y-m-d', strtotime($_POST['date'])); 

            $sql ="SELECT guest.flat_id, guest.name, guest.address, guest.phone, guest._time
            FROM `tenant`
            INNER JOIN `guest`
            ON tenant.flat_Id = guest.flat_id
            WHERE tenant.id = '$id' AND _date = '$dob'";
            $result = mysqli_query($con,$sql);

            $users = mysqli_fetch_all($result,MYSQLI_ASSOC);

            mysqli_free_result($result);
            mysqli_close($con); 
        }   
    ?>

    <div class="container">
        <h1 class="head text-center">Daily Guest List</h1>
        <p class="pid">Flat ID : <?php echo htmlspecialchars($fId);?></p>
        <p class="pid">Date : <?php echo htmlspecialchars($dob);?></p>
        <?php foreach($users as $i){ ?>
            <div class="card mb-3 ">
                <div class="card-body">
                    <h5 class="card-title">Guest Name : <?php echo htmlspecialchars($i['name']);?></h5>
                    <p class="card-text">Address: <?php echo htmlspecialchars($i['address']);?></p>
                    <p class="card-text">Phone: <?php echo htmlspecialchars($i['phone']);?></p>
                    <p class="card-text">Time: <?php echo htmlspecialchars($i['_time']);?></p>
                </div>
            </div>
        <?php } ?>  
    </div>

</body>
</html>