<?php
session_start();
include 'db_connect.php';


if (!isset($_SESSION['AppUserID'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['bmi_user_id'])) {
    header("Location: view_bmi_users.php");
    exit();
}

$bmiUserID = $_GET['bmi_user_id'];


$stmt = $conn->prepare("SELECT RecordID, Height, Weight, BMI, RecordedAt FROM BMIRecords WHERE BMIUserID = ?");
$stmt->bind_param("i", $bmiUserID);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View BMI Records</title>
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
   
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link rel="stylesheet" href="css/view_bmi_records.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">BMI Records</h2>

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Record ID</th>
                    <th>Height (cm)</th>
                    <th>Weight (kg)</th>
                    <th>BMI</th>
                    <th>Recorded At</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['RecordID']; ?></td>
                    <td><?php echo $row['Height']; ?></td>
                    <td><?php echo $row['Weight']; ?></td>
                    <td><?php echo number_format($row['BMI'], 2); ?></td>
                    <td><?php echo $row['RecordedAt']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <p><a href="view_bmi_users.php" class="btn btn-info"><i class="fas fa-arrow-left"></i> Back to BMI Users</a></p>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
