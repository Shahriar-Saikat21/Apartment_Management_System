<?php
    include('../databaseConnection.php');
    if(isset($_POST['submit'])){
        $fId = htmlspecialchars($_POST['flatId']);
        $name = htmlspecialchars($_POST['name']);
        $address = htmlspecialchars($_POST['address']);
        $phone =htmlspecialchars($_POST['phone']);

        $sql = "INSERT INTO `guest` VALUES ('$fId','$name','$address','$phone',CURRENT_DATE())";
        $result = mysqli_query($con,$sql);

        if($result){
            echo "
                <script>
                    alert('Information has been stored !!');
                    document.location.href = 'guestStore.php';
                </script>
            ";
        }else{
            echo "
                <script>
                    alert('Unsuccessful, Sometimes Goes Wrong !!');
                    document.location.href = 'guestStore.php';
                </script>
            ";
        }
    }
    mysqli_close($conn);
?>