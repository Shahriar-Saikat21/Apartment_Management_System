<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');

        $string = $_GET['id'];
        $header = explode("/",$string);;
        $id = $header[0];
        $time = $header[1];
        
        $sql = "SELECT * FROM bill WHERE flat_id = '$id' AND _time = '$time'";
        $result = mysqli_query($con,$sql);

        $record = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);
        
    ?>

    <div class="container">
    <h1 class="head text-center">Tenant Bills Distribution Update</h1>
          <div class="d-flex justify-content-center mt-4">
            <form action="adminBillUpdate.php" method="POST" class="w-50 ">
                <select class="form-select" id="floatingSelect" name="flatId" required>
                    <?php $val = htmlspecialchars($record[0]['flat_id'])."/".htmlspecialchars($record[0]['tenant_id']);?>
                    <option value="<?=$val;?>"><?php echo $val;?></option>
                </select>
                <div class="form-group my-3">
                    <label for="">Month </label>
                    <input type="month" name="month" class="form-control" value ="<?=$record[0]['_time'];?>" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Flat Rent </label>
                    <input type="text" name="rent" class="form-control" value ="<?=$record[0]['rent'];?>" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Maintenance </label>
                    <input type="text" name="maintenance" class="form-control" value ="<?=$record[0]['maintenance'];?>" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Electric Bill </label>
                    <input type="text" name="eBill" class="form-control" value ="<?=$record[0]['e_bill'];?>" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Electric Bill References </label>
                    <input type="text" name="eBillRef" class="form-control" value ="<?=$record[0]['e_ref'];?>" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Gas Bill </label>
                    <input type="text" name="gBill" class="form-control" value ="<?=$record[0]['g_bill'];?>" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Gas Bill References </label>
                    <input type="text" name="gBillRef" class="form-control" value ="<?=$record[0]['g_ref'];?>" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Water Bill </label>
                    <input type="text" name="wBill" class="form-control" value ="<?=$record[0]['w_bill'];?>" required/>
                </div>
                <div class="form-group my-3">
                    <label for="">Water Bill References </label>
                    <input type="text" name="wBillRef" class="form-control" value ="<?=$record[0]['w_ref'];?>" required/>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-5">Update The Bill</button>
                <a class="btn btn-outline-primary mb-5" href="../adminPanel/adminSearch.php" role="button">Cancel</a>
            </form>
        </div>
    </div>

    <?php 
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
    
            $sqlTwo = "UPDATE `bill` SET rent = '$rent',maintenance ='$maintenance',
                e_bill = '$eBill',e_ref = '$eBillRef',g_bill = '$gBill',
                g_ref = '$gBillRef',w_bill = '$wBill',w_ref = '$wBillRef',
                _time = '$time' WHERE flat_id = '$fId' AND tenant_id = '$tId'";
            $resultTwo = mysqli_query($con,$sqlTwo);
    
            if($resultTwo){
                echo "
                    <script>
                        alert('Information has been updated !!');
                        document.location.href = 'adminSearch.php';
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('Unsuccessful, Sometimes Goes Wrong !!');
                        document.location.href = 'adminSearch.php';
                    </script>
                ";
            }
        }    
        mysqli_close($con);

    ?>
    
</body>
</html>