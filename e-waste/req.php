<?php 

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['fullName'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $accN = $_POST['accN'];
    $Eweight = $_POST['Eweight'];
    $category = $_POST['category'];
    $condition = $_POST['condition'];



    $sql = "INSERT INTO users (username, phone_no, email, user_location, account_no) VALUES ($1,$2,$3,$4,$5)
    RETURNING user_id
    ";

    $result1 = pg_query_params($conn, $sql,array($fullName, $phone, $email, $location, $accN));
    $result2 = false;

    if ($result1) {
        $users = pg_fetch_assoc($result1);
        $user_id = $users['user_id'];

        $sql2 = "INSERT INTO waste (estimated_weight, user_id, waste_type, waste_condition) VALUES ($1, $2, $3, $4)";
        $result2 = pg_query_params($conn, $sql2, array($Eweight, $user_id, $category, $condition));
    }

    if ($result1 && $result2) {
        echo "<script>alert('Pickup request submitted successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting pickup request: " . pg_last_error($conn) . "');</script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Pickup</title>
    <style>

    </style>
    <link rel="stylesheet" href="req.css">
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="header">
        <div class="left-header">
            <a href="index.php"><img class="icon" src="image/logo.png" alt=""></a>
            <p class="name">Smart E-waste Recovery & Bounty Platform</p>
        </div>
        <div class="middle-header">
        </div>
        <div class="right-header">
            <a href="loginpage.php">Staff login</a>
            <a href="register.php">register</a>
            <div class="pickup">
                <a href="req.php">pick-up?</a>
            </div>

        </div>

    </div>
    <div class="container">
        <div class="left-section">
            <h1>Current E-Waste Pickup status</h1>
            <p>Check the status of your e-waste pickup request at any time.</p>


        </div>
        <div class="right-section">
            <form action="" method="POST">
                <fieldset>
                    <legend>E-WASTE PICKUP REQUEST</legend>

                    <label for="fullName">Full Name</label>
                    <input class="input" id="fullName" name="fullName" type="text" placeholder="Enter your full name" required>

                    <label for="phone">Phone Number</label>
                    <input class="input" id="phone" name="phone" type="tel" placeholder="Enter your phone number" inputmode="numeric" pattern="[0-9]+" required>

                    <label for="email">Email</label>
                    <input class="input" id="email" name="email" type="email" placeholder="Enter your email address" required>

                    <label for="location">Street/Location</label>
                    <input class="input" id="location" name="location" type="text" placeholder="Enter your street address" pattern="[A-Za-z0-9\s]+" required>

                    <label for="accN">Account Number</label>
                    <input class="input" id="accN" name="accN" type="text" placeholder="Enter your account number" pattern="[A-Za-z0-9\s]+" required>

                    <label for="Eweight">Estimated Weight (kg)</label>
                    <input class="input" id="Eweight" name="Eweight" type="number" placeholder="Enter estimated weight" required>

                    <label for="category">E-Waste Category</label>
                    <input class="input" id="category" name="category" type="text" placeholder="e.g., Electronics, Computers, Mobile Phones" required>

                    <label>E-Waste Condition</label>
                    <label class="option">
                        <input type="radio" name="condition" value="Critical/Worst" required> Critical/Worst
                    </label>
                    <label class="option">
                        <input type="radio" name="condition" value="Worse"> Worse
                    </label>
                    <label class="option">
                        <input type="radio" name="condition" value="Normal"> Normal
                    </label>
                    <label class="option">
                        <input type="radio" name="condition" value="Very Good"> Very Good
                    </label>
                    <label class="option">
                        <input type="radio" name="condition" value="Excellent"> Excellent
                    </label>

                    <button type="submit">Submit Request</button>
                </fieldset>
            </form>
        </div>
    </div>
  
</body>
</html>