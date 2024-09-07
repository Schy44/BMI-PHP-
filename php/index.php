<?php
session_start();
include 'db_connect.php';

 
if (!isset($_SESSION['AppUserID'])) {
    header("Location: login.php");
    exit();
}


$username = htmlspecialchars($_SESSION['Username']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>


    <div class="dashboard-header bg-light py-4">
        <div class="container text-center">
            <h1 class="display-4">Welcome, <?php echo $username; ?>!</h1>
            <p class="lead">This is your dashboard. Navigate through the options below.</p>
        </div>
    </div>


    <div class="container dashboard-content py-5">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card card text-center">
                    <a href="bmi_calculator.php" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <i class="fas fa-calculator fa-3x mb-3"></i>
                            <h3 class="card-title">BMI Calculator</h3>
                            <p class="card-text">Track your BMI with our calculator.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card card text-center">
                    <a href="add_bmi_user.php" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <i class="fas fa-user-plus fa-3x mb-3"></i>
                            <h3 class="card-title">Add BMI User</h3>
                            <p class="card-text">Add a new user to track BMI.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card card text-center">
                    <a href="view_bmi_users.php" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <i class="fas fa-users fa-3x mb-3"></i>
                            <h3 class="card-title">View BMI Users</h3>
                            <p class="card-text">Manage and view all BMI users.</p>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="dashboard-card card text-center">
                    <a href="logout.php" class="text-decoration-none text-dark">
                        <div class="card-body">
                            <i class="fas fa-sign-out-alt fa-3x mb-3"></i>
                            <h3 class="card-title">Logout</h3>
                            <p class="card-text">Sign out of your account.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
