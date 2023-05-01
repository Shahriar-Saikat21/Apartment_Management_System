<!DOCTYPE html>
<html lang="en">
    <?php 
        include('adminHeader.php'); 
        include('../databaseConnection.php');

        session_start();
        $senderId = $_SESSION['id'];

        $sql = "SELECT * FROM `message` WHERE send_id = '$senderId'
            ORDER BY _date DESC";
        $result = mysqli_query($con,$sql);
    
        $record = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);

        $sqlTwo = "SELECT COUNT(id) AS count FROM `message` WHERE send_id = '$senderId'";
        $resultTwo = mysqli_query($con,$sqlTwo);
    
        $recordTwo = mysqli_fetch_all($resultTwo,MYSQLI_ASSOC);
        mysqli_free_result($resultTwo);

        $count = '';

        if(!$recordTwo){
            $count = 0;
        }else{
            $count = $recordTwo[0]['count'];
        }

        mysqli_close($con);
    ?>

    <div class="container">
        <h1 class="head text-center">Sent Message </h1>
        <div>
            <a class="btn btn-outline-primary" href="../adminPanel/adminMsg.php" role="button">Back To Message</a>
            <p class = "my-2">Total Sent: <?php echo $count;?></p>
        </div> 
        <table class="table table-striped">
            <thead>
                    <th scope="col">Send To</th>
                    <th scope="col">Flat ID</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Message</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($record as $i){?>
                        <tr>
                            <th scope="row"><?php echo $i['receive_id'];?></th>
                            <td><?php echo $i['flat_id'];?></td>
                            <td><?php echo $i['_date'];?></td>
                            <td><?php echo $i['_time'];?></td>
                            <td><?php echo $i['body'];?></td>
                            <td><a class="btn btn-danger" onclick="javascript:return confirm('Are you sure to delete this??');" href="../adminPanel/adminSentMsgDelete.php?id=<?php echo $i['id'];?>" role="button">Delete</a></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>
</html>