
<!DOCTYPE html>
<html lang="en">
    <?php include('tenantHeader.php'); ?>

    <div class="container">
        <h1 class="head text-center">Daily Guest Search</h1>  
        <div class="d-flex justify-content-center mt-4">
            <form action="tenantGuestFunc.php" method="POST" class="w-50 ">                
                <div class="form-group my-3">
                    <label for="">Date </label>
                    <input type="date" name="date" class="form-control" required/>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Search</button>
            </form>
        </div>       
    </div>
    
</body>
</html>