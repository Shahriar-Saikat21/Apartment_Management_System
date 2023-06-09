<?php
    include('databaseConnection.php');

    session_start();

    $error = "";
    

    if(isset($_POST['submit'])){
        $id = htmlspecialchars($_POST['userId']);
        $pass = htmlspecialchars($_POST['pass']);

        $_SESSION['id'] = htmlspecialchars($_POST['userId']);

        $table = "";
        $flag = "";

        if(preg_match("/^A/",$id)){
            $table = "admin";
            $flag = 1;
        }else if(preg_match("/^F/",$id)){
            $table = "flatowner";
            $flag = 2;
        }else if(preg_match("/^T/",$id)){
            $table = "tenant";
            $flag = 3;
        }else if(preg_match("/^G/",$id)){
            $table = "guard";
            $flag = 4;
        }else{
            $flag = 0;
        }

        if($flag==0){
            $error = "Invalid ID or Password";
        }else{
            $sql = "SELECT * FROM $table WHERE id = '$id' AND BINARY _password = '$pass' AND _status = 1";
            $result = mysqli_query($con,$sql);

            $record = mysqli_fetch_all($result,MYSQLI_ASSOC);
            mysqli_free_result($result);
            mysqli_close($con);

            if(empty($record)){
                $error = "Invalid ID or Password";
            }else{
                if($flag == 1){
                    header("Location:adminPanel/adminAccount.php");
                }else if($flag == 2){
                    header("Location:flatOwnerPanel/flatOwnerProfile.php");
                }else if($flag == 3){
                    header("Location:tenantPanel/tenantProfile.php");
                }else if($flag == 4){
                    header("Location:guardPanel/guestStore.php");
                }   
            }
        }     
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safe Home || Welcome</title>
    <link rel="icon" type="image/png" href="image/12.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="section">
        <div class="container hero">
            <div class="logo my-3">
                <h1>Safe Home</h1>
            </div>
        </div>x
        <div class="container">
            <div class="row">
                <div class="col-7"></div>
                <div class="col-5 my-5 p-5 formDesign">
                    <form method="post" action="#">
                        <h2>Log In</h2>
                        <div class="mb-3">
                            <label class="form-label">User ID</label>
                            <input type="text" name="userId" class="form-control" id="exampleInputEmail1" required placeholder="Enter User Id">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="pass" class="form-control" id="exampleInputPassword1" required placeholder="Enter Password">
                        </div>
                        <div class="mb-3">
                            <label class="errorMsg"><?php echo $error;?></label>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>