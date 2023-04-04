<?php include('adminHeader.php'); 
    include('../databaseConnection.php');
    if(isset($_POST['submit'])){
        $gId = htmlspecialchars($_POST['id']);
        $eId = htmlspecialchars($_POST['e_id']);
        $password = htmlspecialchars($_POST['password']);

        $sql = "INSERT INTO `guard` VALUES ('$gId','$eId','$password')";
        $result = mysqli_query($con,$sql);

        if($result){
            echo "
                <script>
                    alert('Information has been stored !!');
                    document.location.href = 'adminAccount.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Unsuccessful, Sometimes Goes Wrong !!');
                    document.location.href = 'adminAccount.php';
                </script>
            ";
        }
    }
    mysqli_close($con);
?>