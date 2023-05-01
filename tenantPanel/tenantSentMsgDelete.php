<?php
    include('../databaseConnection.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM message WHERE id = '$id'";
    $result = mysqli_query($con,$sql);
    if($result){
        echo "
            <script>
                alert('Delete Successful !!');
                document.location.href = '../tenantPanel/tenantSentMsg.php';
            </script>";
    }else{
        echo "<script>
                alert('Unsuccessfull, Something goes wrong !!');
                document.location.href = '../tenantPanel/tenantSentMsg.php';
            </script>";
    }

?>