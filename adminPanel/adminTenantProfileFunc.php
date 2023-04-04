<?php include('adminHeader.php'); 
    include('../databaseConnection.php');
    if(isset($_POST['submit'])){
        $id = htmlspecialchars($_POST['id']);
        $f_id = htmlspecialchars($_POST['flatId']);
        $name = htmlspecialchars($_POST['name']);
        $nid = htmlspecialchars($_POST['nid']);
        $status = (int)htmlspecialchars($_POST['status']);
        $address = htmlspecialchars($_POST['address']);
        $phone = htmlspecialchars($_POST['phone']);
        $password = htmlspecialchars($_POST['password']);
        $rent = date('Y-m-d', strtotime($_POST['start'])); 
        $realese = date('Y-m-d', strtotime($_POST['end'])); 
        $pic = addslashes($_FILES['pic']['tmp_name']);
        $pic_name = addslashes($_FILES['pic']['tmp_name']);
        $pic = file_get_contents($pic);
        $pic = base64_encode($pic);

        $sql = "INSERT INTO `tenant` VALUES ('$id','$f_id','$name','$nid','$address',
                    '$phone','$status','$password','$pic','$rent','$realese')";
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