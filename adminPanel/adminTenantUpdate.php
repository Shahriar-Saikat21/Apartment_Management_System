<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
        include('../databaseConnection.php');

        $id = $_GET['id'];
        
        
    ?>

    <div class="container">
        <h1 class="head text-center">Tenant Update</h1> 
        <?php echo $id;?>
    </div>
    
</body>
</html>