<!DOCTYPE html>
<html lang="en">
    <?php 
        include('tenantHeader.php'); 
        include('../databaseConnection.php');
        
        session_start();
        $senderId = $_SESSION['id'];

        if(isset($_POST['submit'])){
            $msg = htmlspecialchars($_POST['message']);
            $select = (int)htmlspecialchars($_POST['select']);

            $sql = "SELECT flats.ownerId,flat_Id FROM `tenant` 
                INNER JOIN flats
                ON tenant.flat_Id = flats.id
                WHERE tenant.id = '$senderId'";
            $result = mysqli_query($con,$sql);
            $record = mysqli_fetch_all($result,MYSQLI_ASSOC);
            mysqli_free_result($result);

            $ownerId = $record[0]['ownerId'];
            $flatId = $record[0]['flat_Id'];

            $sqlTwo = "";

            $mid = rand();

            if($select==1){
                $sqlTwo = "INSERT INTO `message` VALUES ('$mid','$flatId','$senderId','$ownerId','$msg',CURRENT_DATE(),NOW())";
            }else{
                $sqlTwo = "INSERT INTO `message` VALUES ('$mid','$flatId','$senderId','A100','$msg',CURRENT_DATE(),NOW())";
            }

            
            $resultTwo = mysqli_query($con,$sqlTwo);
    
            if($resultTwo){
                echo "
                    <script>
                        alert('Message has been sent !!');
                        document.location.href = 'tenantMsg.php';
                    </script>
                ";
            }else{
                echo "
                    <script>
                        alert('Unsuccessful, Sometimes Goes Wrong !!');
                        document.location.href = 'tenantMsg.php';
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
                <form action="tenantMsg.php" method="POST" class="w-80 " enctype="multipart/form-data">
                    <div class="form-floating mb-2">
                        <textarea class="form-control"  name ="message" style="height: 400px ;resize: none;"></textarea>
                        <label for="floatingTextarea2">Write Your Message Within 500 Words...</label>
                    </div>
                    <select class="form-select my-3" id="floatingSelect" name="select" required>
                        <option value="" disabled selected hidden>Select</option>
                        <option value="1">Flat Owner</option>
                        <option value="0">Admin</option>   
                    </select>
                    <button type="submit" name="submit" class="btn btn-primary mb-5">Send Message</button>
                </form>
            </div>
            <div class="col-4">
                <div class="row my-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sent Messages</h5>
                            <a href="../tenantPanel/tenantSentMsg.php" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Received Messages</h5>
                            <a href="../tenantPanel/tenantReceivedMsg.php" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
    
</body>
</html>