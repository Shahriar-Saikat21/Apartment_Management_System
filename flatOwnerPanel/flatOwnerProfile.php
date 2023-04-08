<!DOCTYPE html>
<html lang="en">
    <?php include('flatOwnerHeader.php'); 
        session_start();
    ?>

    <div class="container">
          <h1>flatOwner Panel - Profile Section</h1>
          <h1><?php echo $_SESSION['id'];?></h1>
            
    </div>
    
</body>
</html>