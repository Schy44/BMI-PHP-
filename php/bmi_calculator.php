<?php
session_start();


$weight = $height = $bmi = $message = '';
$imgSrc = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = isset($_POST['weight']) ? (float)$_POST['weight'] : '';
    $height = isset($_POST['height']) ? (float)$_POST['height'] : '';

    if ($weight <= 0 || $height <= 0) {
        $message = "Please enter a valid weight and height";
    } else {
      
        $feet = floor($height);
        $inches = ($height - $feet) * 10; 
        $totalInches = ($feet * 12) + $inches;
        $heightInMeters = $totalInches * 0.0254;

        $bmi = $weight / ($heightInMeters ** 2);
        $bmi = round($bmi, 1);

    
        if ($bmi < 18.5) {
            $message = 'You are underweight';
            $imgSrc = 'images/underweight.png';
        } elseif ($bmi < 25) {
            $message = 'You are healthy ';
            $imgSrc = 'images/healthy.png';
        } elseif ($bmi < 30) {
            $message = 'You are overweight';
            $imgSrc = 'images/overweight.png';
        } else {
            $message = 'You are obese';
            $imgSrc = 'images/obese.png';
        }
    }
}


if (isset($_POST['reset'])) {
    $weight = $height = $bmi = $message = '';
    $imgSrc = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bmi_calculator.css"> <!-- Custom CSS -->
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">BMI Calculator</h2>

        <form method="POST" action="" class="form-group">
            <div class="form-group">
                <label for="weight">Weight (kg)</label>
                <input type="number" id="weight" name="weight" class="form-control" value="<?php echo htmlspecialchars($weight); ?>" required>
            </div>
            <div class="form-group">
                <label for="height">Height (ft.in)</label>
                <input type="number" id="height" name="height" class="form-control" value="<?php echo htmlspecialchars($height); ?>" step="0.1" required>
                <small class="form-text text-muted">Enter height in feet and inches, e.g., 6.1 for 6 feet 1 inch.</small>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Calculate</button>
                <button type="submit" name="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>

        <?php if ($bmi !== ''): ?>
        <div class="text-center">
            <h3>Your BMI is: <?php echo $bmi; ?></h3>
            <p><?php echo $message; ?></p>
            <?php if ($imgSrc !== ''): ?>
            <div class="img-container">
                <img src="<?php echo $imgSrc; ?>" alt="BMI Image" class="img-fluid">
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>
