<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');

        $string = $_GET['id'];
        $header = explode("/",$string);;
        $id = $header[0];
        $time = $header[1];
        
        
    ?>

    <div class="container">
        <h1 class="head text-center"> Bill Update</h1> 
        <?php echo $id;?>
        <?php echo $time;?>
    </div>
    
</body>
</html>