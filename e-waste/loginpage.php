<?php
session_start();
include 'db_connect.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $sql = "SELECT users.user_id, users.email, roles.role_id, roles.role_name, users.passwords
            FROM users
            JOIN roles ON users.role_id = roles.role_id
            WHERE users.email = $1
            AND users.passwords =$2
            ";
    $result = pg_query_params($conn, $sql, array($email,$password));

    if ($result && pg_num_rows($result) > 0) {
        $user = pg_fetch_assoc($result);
        $stored = $user['passwords'] ?? '';
        $password_ok = false;
        if (!empty($stored) && password_verify($password, $stored)) {
            $password_ok = true;
        } elseif ($password === $stored) {
            $password_ok = true;
        }

        if ($password_ok) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role_id'] = $user['role_id'];
            $_SESSION['role_name'] = $user['role_name'];

            if ($user['role_name'] === 'coordinator' || $user['role_id'] == 18) {
                header('Location: inCharge_dashboard.php');
                exit();
            } elseif ($user['role_name'] === 'technician' || $user['role_id'] == 19) {
                header('Location: technician.php');
                exit();
            }

            header('Location: index.php');
            exit();
        } else {
            $error = 'Invalid email or password.';
        }
    } else {
        $error = 'Invalid email or password.';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>login page</title>
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

        <div class="login">
            <form action="" method="POST">
                <fieldset>
                    <legend>E-WASTE STAFF LOGIN</legend>

                    <?php if(!empty($error)): ?>
                        <p class="error" style="color:#c0392b;"><?php echo htmlspecialchars($error); ?></p>
                    <?php endif; ?>

                    <label for="username">User Email</label>
                    <input class="input" id="username" name="email" type="email" placeholder="Enter email" required>

                    <label for="password">password</label>
                    <input class="input" id="password" name="password" type="password" placeholder="Enter password" required>


                    <button type="submit">Login</button>

                    <a href="register.php"><p>dont have an account? register</p></a>
                </fieldset>
            </form>
        </div>
    </body>
</html>