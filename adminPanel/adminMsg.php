<!DOCTYPE html>
<html lang="en">
    <?php 
        include('adminHeader.php'); 
        include('../databaseConnection.php');
        
        session_start();
        $senderId = $_SESSION['id'];

        $sql = "SELECT * FROM `flats`";
        $result = mysqli_query($con,$sql);
    
        $record = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);

        if(isset($_POST['submit'])){
            $msg = htmlspecialchars($_POST['message']);
            $f_id = htmlspecialchars($_POST['flatId']);
            $select = (int)htmlspecialchars($_POST['select']);

            $sqlThree = "SELECT ownerId,tenant.id,flats.id AS flatID FROM `flats` 
                INNER JOIN tenant ON flats.id = tenant.flat_Id WHERE flats.id = '$f_id'";
            $resultThree = mysqli_query($con,$sqlThree);
            $recordTwo = mysqli_fetch_all($resultThree,MYSQLI_ASSOC);
            mysqli_free_result($resultThree);

            $ownerId = $recordTwo[0]['ownerId'];
            $tenantId = $recordTwo[0]['id'];
            $flatId = $recordTwo[0]['flatID'];

            $sqlTwo = "";

            $mid = rand();

            if($select==1){
                $sqlTwo = "INSERT INTO `message` VALUES ('$mid','$flatId','$senderId','$ownerId','$msg',CURRENT_DATE(),NOW())";
            }else{
                $sqlTwo = "INSERT INTO `message` VALUES ('$mid','$flatId','$senderId','$tenantId','$msg',CURRENT_DATE(),NOW())";
            }

            
            $resultTwo = mysqli_query($con,$sqlTwo);
    
            if($resultTwo){
                echo "
                    <script>
                        alert('Message has been sent !!');
                        document.location.href = 'adminMsg.php';
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('Unsuccessful, Sometimes Goes Wrong !!');
                        document.location.href = 'adminMsg.php';
                    </script>
                ";
            }
        }
        mysqli_close($con);

    ?>

    <div class="container">
        <h1 class="head text-center">Message Archeive </h1>  
        <div class="row">
            <div class="col-8 my-3">
                <form action="adminMsg.php" method="POST" class="w-80 " enctype="multipart/form-data">
                    <div class="form-floating mb-2">
                        <textarea class="form-control"  name ="message" style="height: 400px ;resize: none;"></textarea>
                        <label for="floatingTextarea2">Write Your Message Within 500 Words...</label>
                    </div>
                    <select class="form-select" id="floatingSelect" name="flatId" required>
                        <option value="" disabled selected hidden>Select Flat Id</option>
                        <?php foreach($record as $value){ ?>
                            <option value="<?=$value['id'];?>"><?php echo htmlspecialchars($value['id']);?></option>
                        <?php }?>
                    </select>
                    <select class="form-select my-3" id="floatingSelect" name="select" required>
                        <option value="" disabled selected hidden>Select</option>
                        <option value="1">Flat Owner</option>
                        <option value="0">Tenant</option>   
                    </select>
                    <button type="submit" name="submit" class="btn btn-primary mb-5">Send Message</button>
                </form>
            </div>
            <div class="col-4">
                <div class="row my-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sent Messages</h5>
                            <a href="../adminPanel/adminSentMsg.php" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Received Messages</h5>
                            <a href="../adminPanel/adminReceivedMsg.php" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    
</body>
</html>