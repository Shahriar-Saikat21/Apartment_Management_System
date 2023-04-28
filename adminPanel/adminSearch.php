<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); 
    
        include('../databaseConnection.php');

        $sql = "SELECT * FROM `flats`";
        $result = mysqli_query($con,$sql);

        $record = mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);
        
    ?>

    <div class="container">
        <h1 class="head text-center">Information Search</h1>  
        <div class="row my-5">
            <div class="col-sm-6 mb-3 mb-sm-0 w-100">
                <div class="card h-100"> 
                    <div class="card-body ">
                        <h5 class="card-title">Search By ID</h5>
                        <div class=" d-flex justify-content-center mt-4">
                            <form action="adminIdSearch.php" method="POST" class="w-50" enctype="multipart/form-data">
                                <input type="text" name ="id" class="form-control mb-2" placeholder="Enter ID" required>
                                <select class="form-select" id="floatingSelect" name="option" required>
                                    <option value="" disabled selected hidden>Select Options</option>
                                    <option value="owner">Flat Owner</option>
                                    <option value="tenant">Tenant</option>
                                    <option value="employee">Employee</option>
                                </select>                                  
                                <button type="submit" name="submit" class="btn btn-primary my-3">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card h-100"> 
                    <div class="card-body ">
                        <h5 class="card-title">Flat Profile</h5>
                        <div class="d-flex justify-content-center mt-4">
                            <form action="adminFlatSearch.php" method="POST" class="w-50" enctype="multipart/form-data">
                                <select class="form-select" id="floatingSelect" name="flatId" required>
                                    <option value="" disabled selected hidden>Select Flat Id</option>
                                    <?php foreach($record as $value){ ?>
                                        <option value="<?=$value['id'];?>"><?php echo htmlspecialchars($value['id']);?></option>
                                    <?php }?>
                                </select>                                  
                                <button type="submit" name="submit" class="btn btn-primary my-3">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Employee</h5>
                        <div class="d-flex justify-content-center mt-4">
                            <form action="adminEmployeeProfileSearch.php" method="POST" class="w-50" enctype="multipart/form-data">
                                <select class="form-select my-3" id="floatingSelect" name="status" required>
                                    <option value="" disabled selected hidden>Employees</option>
                                    <option value="1">Active</option>
                                    <option value="0">Ex</option>   
                                    <option value="2">All</option>   
                                </select>                                  
                                <button type="submit" name="submit" class="btn btn-primary mb-5">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card h-100">
                    <div class="card-body ">
                        <h5 class="card-title">Tenant</h5>
                        <div class="d-flex justify-content-center mt-4 ">
                            <form action="adminTenantProfileSearch.php" method="POST" class="w-50" enctype="multipart/form-data">
                                <select class="form-select my-3" id="floatingSelect" name="status" required>
                                    <option value="" disabled selected hidden>Tenants</option>
                                    <option value="1">Active</option>
                                    <option value="0">Ex</option>   
                                    <option value="2">All</option>   
                                </select>                                  
                                <button type="submit" name="submit" class="btn btn-primary mb-5">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Flat Owner</h5>
                        <div class="d-flex justify-content-center mt-4">
                            <form action="adminFlatOwnerSearch.php" method="POST" class="w-50" enctype="multipart/form-data">
                                <select class="form-select my-3" id="floatingSelect" name="status" required>
                                    <option value="" disabled selected hidden>Flat Owner</option>
                                    <option value="1">Active</option>
                                    <option value="0">Ex</option>   
                                    <option value="2">All</option>   
                                </select>                                  
                                <button type="submit" name="submit" class="btn btn-primary mb-5">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-sm-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Bills</h5>
                        <div class="d-flex justify-content-center mt-4">
                            <form action="adminBillSearch.php" method="POST" class="w-50" enctype="multipart/form-data">
                                <select class="form-select" id="floatingSelect" name="flatId" required>
                                    <option value="" disabled selected hidden>Select Flat Id</option>
                                    <?php foreach($record as $value){ ?>
                                        <option value="<?=$value['id'];?>"><?php echo htmlspecialchars($value['id']);?></option>
                                    <?php }?>
                                </select>                
                                <button type="submit" name="submit" class="btn btn-primary mt-3">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Guards</h5>
                        <div class="d-flex justify-content-center mt-4">
                            <form action="adminGuardSearch.php" method="POST" class="w-50" enctype="multipart/form-data">
                                <select class="form-select my-3" id="floatingSelect" name="status" required>
                                    <option value="" disabled selected hidden>Guards</option>
                                    <option value="1">Active</option>
                                    <option value="0">Ex</option>   
                                    <option value="2">All</option>   
                                </select>                                  
                                <button type="submit" name="submit" class="btn btn-primary mb-5">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>