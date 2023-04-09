<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
    include('../databaseConnection.php');

    $sql = "SELECT id,flat_Id FROM `tenant` WHERE _status = 1";
    $result = mysqli_query($con,$sql);

    $record = mysqli_fetch_all($result,MYSQLI_ASSOC);
    mysqli_free_result($result);

    if(isset($_POST['submit'])){
        $OriginalString = htmlspecialchars($_POST['flatId']);
        $headers = explode("/",$OriginalString);
        $fId = $headers[0];
        $tId = $headers[1];
        $rent = (int)htmlspecialchars($_POST['rent']);
        $maintenance = (int)htmlspecialchars($_POST['maintenance']);
        $eBill =(float)htmlspecialchars($_POST['eBill']);
        $eBillRef =htmlspecialchars($_POST['eBillRef']);
        $gBill =(float)htmlspecialchars($_POST['gBill']);
        $gBillRef =htmlspecialchars($_POST['gBillRef']);
        $wBill =(float)htmlspecialchars($_POST['wBill']);
        $wBillRef =htmlspecialchars($_POST['wBillRef']);
        $time = htmlspecialchars($_POST['month']);

        $sqlTwo = "INSERT INTO `bill` VALUES ('$tId','$fId','$rent','$maintenance',
            '$eBill','$eBillRef','$gBill','$gBillRef','$wBill','$wBillRef','$time')";
        $resultTwo = mysqli_query($con,$sqlTwo);

        if($resultTwo){
            echo "
                <script>
                    alert('Information has been stored !!');
                    document.location.href = 'adminBill.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Unsuccessful, Sometimes Goes Wrong !!');
                    document.location.href = 'adminBill.php';
                </script>
            ";
        }
    }

    mysqli_close($con);
   
    ?>

    <div class="container">
          <h1 class="head text-center">Tenant Bills Distribution</h1>
          <div class="d-flex justify-content-center mt-4">
            <form action="adminBill.php" method="POST" class="w-50 ">
                <select class="form-select" id="floatingSelect" name="flatId" required>
                    <option value="" disabled selected hidden>Select Flat & Tenant Id</option>
                    <?php foreach($record as $value){ ?>
                        <?php $val = htmlspecialchars($value['flat_Id'])."/".htmlspecialchars($value['id']);?>
                        <option value="<?=$val;?>"><?php echo $val;?></option>
                    <?php }?>
                </select>
                <div class="form-group my-3">
                    <label for="">Month </label>
                    <input type="month" name="month" class="form-control" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Flat Rent </label>
                    <input type="text" name="rent" class="form-control" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Maintenance </label>
                    <input type="text" name="maintenance" class="form-control" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Electric Bill </label>
                    <input type="text" name="eBill" class="form-control" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Electric Bill References </label>
                    <input type="text" name="eBillRef" class="form-control" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Gas Bill </label>
                    <input type="text" name="gBill" class="form-control" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Gas Bill References </label>
                    <input type="text" name="gBillRef" class="form-control" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Water Bill </label>
                    <input type="text" name="wBill" class="form-control" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Water Bill References </label>
                    <input type="text" name="wBillRef" class="form-control" required/>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-5">Post The Bill</button>
            </form>
        </div>  
    </div>
    
</body>
</html>