<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = trim($_POST['fullName'] ?? '');
    $role_id = (int) trim($_POST['role_id'] ?? '19');
    $phone = trim($_POST['phone'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $user_location = trim($_POST['location'] ?? '');
    $user_password = $_POST['password'] ?? '';
    $confirm_password = $_POST['cPassword'] ?? '';

    if ($user_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match. Please re-enter them.');</script>";
    } elseif ($fullName === '' || $phone === '' || $email === '' || $user_location === '') {
        echo "<script>alert('Please complete all required fields.');</script>";
    } else {

        $sql = "INSERT INTO users (username,email,phone_no,passwords,user_location,role_id) VALUES ($1,$2,$3,$4,$5,$6)";
        $result4 = pg_query_params($conn, $sql, array($fullName,$email,$phone,$user_password,$user_location,$role_id));
    }

        if ($result4) {
            header("Location:loginpage.php");
            echo "<script>window.location.href='loginpage.php';</script>";
            echo "<script>alert('Registration successfully');</script>";
            exit();
        }
}else{
        echo "<script>alert('Error creating account: " . pg_last_error($conn) . "');</script>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>registerpage</title>
        <link rel="stylesheet" href="req.css">
        <link rel="stylesheet" href="index.css">
        <style>
            a p{
                color:#27ae60;
                font-size:14px;
                margin-top:13px;
            }
            a p:hover{
                font-size:15px;
                transition:font-size 0.2s;
            }
        </style>
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
                <div class="pickup">
                    <a href="req.php">pick-up?</a>
                </div>

            </div>
        </div>
        <div class="register">
            <form action="register.php" method="POST">
                <fieldset>
                    <legend>E-WASTE REGISTRATION</legend>

                    <label for="fullName">Full Name</label>
                    <input class="input" id="fullName" name="fullName" type="text" placeholder="Enter your full name" required>
                    <label>ROLE</label>
                    <label class="option">
                        <input type="radio" name="role_id" value="18" required> RECOVERY COORDINATORY
                    </label>
                    <label class="option">
                        <input type="radio" name="role_id" value="19"> ASSESSMENT TECHNICIAN 
                    </label>

                    <label for="phone">Phone Number</label>
                    <input class="input" id="phone" name="phone" type="tel" placeholder="Enter your phone number" inputmode="numeric" pattern="[0-9]+" required>

                    <label for="email">Email</label>
                    <input class="input" id="email" name="email" type="email" placeholder="Enter your email address" required>

                    <label for="location">Street/Location</label>
                    <input class="input" id="location" name="location" type="text" placeholder="Enter your street address" pattern="[A-Za-z0-9\s]+" required>
                
                    <label for="password">Enter password</label>
                    <input class="input" id="password" name="password" type="password" placeholder="Enter your password" required>
                    <label for="password">Confirm password</label>
                    <input class="input" id="cPassword" name="cPassword" type="password" placeholder="Comfirm your password" required>

                    <button type="submit">Register</button>

                    <a href="loginpage.php"><p>have account?login</p></a>

                </fieldset>
            </form>
        </div>

    </body>
</html>