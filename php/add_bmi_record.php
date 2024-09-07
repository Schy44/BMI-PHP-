<?php
session_start();
include 'db_connect.php';

// Check if the user is logged in
if (!isset($_SESSION['AppUserID'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_GET['bmi_user_id'])) {
    header("Location: view_bmi_users.php");
    exit();
}

$bmiUserID = $_GET['bmi_user_id'];
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    // Calculate BMI
    $bmi = $weight / (($height / 100) ** 2);

    // Insert BMI record
    $stmt = $conn->prepare("INSERT INTO BMIRecords (BMIUserID, Height, Weight, BMI) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iddd", $bmiUserID, $height, $weight, $bmi);

    if ($stmt->execute()) {
        $message = "BMI Record added successfully";
    } else {
        $message = "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add BMI Record</title>
    <link rel="stylesheet" href="css/add_bmi_record.css.css"> 
    <style>
  /* General body styles */
body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
}

/* Container styling */
.container {
    margin-top: 50px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin-left: auto;
    margin-right: auto;
}

/* Form styling */
form {
    display: flex;
    flex-direction: column;
}

/* Label styling */
label {
    font-weight: bold;
    margin-top: 10px;
}

/* Input and button styling */
input[type="number"],
button {
    padding: 10px;
    margin-top: 5px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

button {
    background-color: #007bff;
    color: white;
    border: none;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

/* Alert styling */
.alert {
    padding: 10px;
    margin-top: 10px;
    border-radius: 4px;
}

.alert-info {
    background-color: #d9edf7;
    color: #31708f;
}
</style>
</head>

<body>
    <div class="container">
        <h2>Add BMI Record</h2>

        <?php if ($message): ?>
        <div class="alert alert-info">
            <?php echo htmlspecialchars($message); ?>
        </div>
        <?php endif; ?>

        <form method="post" action="">
            <label for="height">Height (in cm):</label><br>
            <input type="number" id="height" name="height" step="0.01" required><br>

            <label for="weight">Weight (in kg):</label><br>
            <input type="number" id="weight" name="weight" step="0.01" required><br><br>

            <button type="submit">Add BMI Record</button>
        </form>

        <p><a href="view_bmi_users.php">Back to BMI Users</a></p>
    </div>
</body>

</html>
