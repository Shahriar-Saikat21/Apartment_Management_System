<!DOCTYPE html>
<html lang="en">
    <?php include('guardHeader.php');
    include('../databaseConnection.php');

    $sql = "SELECT * FROM `flats` inner join `guest` on flats.flat_id = guest.flat_id ";
    $result = mysqli_query($con,$sql);

    $record = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);

    mysqli_close($con); 
 ?>

    <div class="container">
        <h1 class="head text-center">Guest List</h1>
        <p class="pid">Flat ID : <?php echo htmlspecialchars($fId)?></p>
        <p class="pid">Date : <?php echo htmlspecialchars($dob)?></p>
        <?php foreach($users as $i){ ?>
            <div class="card mb-3 ">
                <div class="card-body">
                    <h5 class="card-title">Guest Name : <?php echo htmlspecialchars($i['name'])?></h5>
                    <p class="card-text">Address: <?php echo htmlspecialchars($i['address'])?></p>
                    <p class="card-text">Phone: <?php echo htmlspecialchars($i['phone'])?></p>
                    <p class="card-text">Time: <?php echo htmlspecialchars($i['_time'])?></p>
                </div>
            </div>
        <?php } ?>  
    </div>

</body>
</html>