<?php include('adminHeader.php'); 
    include('../databaseConnection.php');

    $string = $_GET['id'];
    $header = explode("/",$string);;
    $id = $header[0];
    $time = $header[1];

    $sql = "DELETE FROM bill WHERE flat_id = '$id' AND _time = '$time'";
    $result = mysqli_query($con,$sql);
    if($result){
        echo "
            <script>
                alert('Delete Successful !!');
                document.location.href = '../adminPanel/adminSearch.php';
            </script>";
    }else{
        echo "<script>
                alert('Unsuccessfull, Something goes wrong !!');
                document.location.href = '../adminPanel/adminSearch.php';
            </script>";
    }
    
    
?>
