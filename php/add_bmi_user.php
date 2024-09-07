<?php
session_start();
include 'db_connect.php';


if (!isset($_SESSION['AppUserID'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];


    $stmt = $conn->prepare("INSERT INTO BMIUsers (Name, Age, Gender) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $age, $gender);

    if ($stmt->execute()) {
        $message = "BMI User added successfully";
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
    <title>Add BMI User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/add_bmi_user.css">
</head>

<body>
    <div class="container">
        <h2>Add BMI User</h2>

        <?php if ($message): ?>
        <div class="alert alert-info">
            <?php echo $message; ?>
        </div>
        <?php endif; ?>

        <form method="post" action="add_bmi_user.php">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" class="form-control">
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add BMI User</button>
        </form>

        <p><a href="index.php">Back to Dashboard</a></p>
    </div>
</body>

</html>
