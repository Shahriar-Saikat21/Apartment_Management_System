<!DOCTYPE html>
<html lang="en">
    <?php include('adminHeader.php'); ?>

    <div class="container">
        <h1 class="head text-center">Create Profile</h1>  
        <div class="row my-5">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Flat Profile</h5>
                    <p class="card-text">Create Flat Profile for Flat Owners</p>
                    <a href="adminFlatProfile.php" class="btn btn-primary">Create</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Flat Owner</h5>
                    <p class="card-text">Create Profile for Flat Owners</p>
                    <a href="adminFlatOwnerProfile.php" class="btn btn-primary">Create</a>
                </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tenant</h5>
                    <p class="card-text">Create Profile for Tenants</p>
                    <a href="adminTenantProfile.php" class="btn btn-primary">Create</a>
                </div>
                </div>
            </div>
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Employee</h5>
                    <p class="card-text">Create Profile for Employees. Store all informations Carefully</p>
                    <a href="adminEmployeeProfile.php" class="btn btn-primary">Create</a>
                </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Guard</h5>
                    <p class="card-text">Create Profile for Guards, Must has an Employee Account First</p>
                    <a href="adminGuardProfile.php" class="btn btn-primary">Create</a>
                </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>