<!DOCTYPE html>
<html lang="en">
    <?php include('tenantHeader.php');
        include('../databaseConnection.php');
        session_start();
        $id = $_SESSION['id'];

        if(isset($_POST['submit'])){ 
            $time = htmlspecialchars($_POST['month']); 

            $sql ="SELECT  *, ROUND((rent+maintenance+e_bill+g_bill+w_bill),2) AS total
                FROM `bill` WHERE tenant_id = '$id' AND _time = '$time'";
            $result = mysqli_query($con,$sql);

            $users = mysqli_fetch_all($result,MYSQLI_ASSOC);

            mysqli_free_result($result);
            mysqli_close($con); 
        }
    
    ?>

    <div class="container">
        <h1 class="head text-center">Monthly Bill's Information</h1>
        <?php foreach($users as $i){ ?>
            <div class="card mb-3 ">
                <div class="card-body">
                    <h5 class="card-title"><b>Summary of Bills</b></h5>
                    <h6 class="card-title"><b>Month : <?php echo htmlspecialchars($i['_time']);?></b></h6>
                    <p class="card-text">Rent: <?php echo htmlspecialchars($i['rent']);?></p>
                    <p class="card-text">Maintenance: <?php echo htmlspecialchars($i['maintenance']);?></p>
                    <p class="card-text">Electricity Bill: <?php echo htmlspecialchars($i['e_bill']);?></p>
                    <p class="card-text">Electricity Bill References: <?php echo htmlspecialchars($i['e_ref']);?></p>
                    <p class="card-text">Gas Bill: <?php echo htmlspecialchars($i['g_bill']);?></p>
                    <p class="card-text">Gas Bill References: <?php echo htmlspecialchars($i['g_ref']);?></p>
                    <p class="card-text">Water Bill: <?php echo htmlspecialchars($i['w_bill']);?></p>
                    <p class="card-text">Water Bill References: <?php echo htmlspecialchars($i['w_ref']);?></p>
                    <p class="card-text"><b><i>Total: <?php echo htmlspecialchars($i['total']);?> BDT</i></b></p>
                </div>
            </div>
        <?php } ?>
    </div>
    
</body>
</html>