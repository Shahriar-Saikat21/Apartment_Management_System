<!DOCTYPE html>
<html lang="en">
    <?php include('tenantHeader.php');?>

    <div class="container">
          <h1 class="head text-center">Monthly Bill's Information</h1>
          <div class="d-flex justify-content-center mt-4">
            <form action="tenantSearchFunc.php" method="POST" class="w-50 ">
                <div class="form-group my-3">
                    <label for="">Month </label>
                    <input type="month" name="month" class="form-control" required/>
                </div>
                <button type="submit" name="submit" class="btn btn-primary mb-5">Search</button>
            </form>
        </div>
    </div>
    
</body>
</html>