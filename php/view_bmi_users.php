<?php
session_start();
include 'db_connect.php';


if (!isset($_SESSION['AppUserID'])) {
    header("Location: login.php");
    exit();
}


$result = $conn->query("SELECT BMIUserID, Name, Age, Gender FROM BMIUsers");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View BMI Users</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
    <link rel="stylesheet" href="css/view_bmi_users.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">BMI Users</h2>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>BMI User ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['BMIUserID']; ?></td>
                    <td><?php echo htmlspecialchars($row['Name']); ?></td>
                    <td><?php echo $row['Age']; ?></td>
                    <td><?php echo $row['Gender']; ?></td>
                    <td>
                        <a href="add_bmi_record.php?bmi_user_id=<?php echo $row['BMIUserID']; ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Add Record
                        </a>
                        <a href="view_bmi_records.php?bmi_user_id=<?php echo $row['BMIUserID']; ?>" class="btn btn-secondary btn-sm">
                            <i class="fas fa-eye"></i> View Records
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <p><a href="index.php" class="btn btn-info">Back to Dashboard</a></p>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
