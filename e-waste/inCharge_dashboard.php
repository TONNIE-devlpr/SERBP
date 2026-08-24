<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Recovery Coordinator Dashboard</title>
        <link rel="stylesheet" href="index.css">
        <style>

            .container {
                display: flex;
                flex-direction: column;
                max-width: 1100px;
                margin: 32px auto;
                padding: 0 20px;
            }
            .panel {
                background: white;
                border-radius: 14px;
                padding: 24px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.08);
                margin-bottom: 22px;
                margin-top: 30px;
                max-width: 100%;
            }
            h1 {
                margin-top: 0;
                color: #1f3d2d;
            }
            .stats {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
                gap: 18px;
            }
            .stat-box {
                background: #eafaf1;
                border: 1px solid #c9ebd6;
                border-radius: 12px;
                padding: 18px;
            }
            .stat-box strong {
                display: block;
                font-size: 28px;
                color: #27ae60;
                margin-top: 8px;
            }
            .nav {
                display: flex;
                margin-right: 50px;
                gap: 20px;
                flex-wrap: wrap;
            }
            .nav a {
                text-decoration: none;
                color: white;
                background:none;
                padding: 10px 16px;
                border-radius: 8px;
                margin-top:-10px;
            }
        </style>
    </head>
    <body>
        <div class="header">
            <div class="left-header">
                <a href="index.php"><img class="icon" src="image/logo.png" alt="Logo"></a>
                <p class="name">Smart E-waste Recovery & Bounty Platform</p>
            </div>
            <div class="middle-header">
            </div>
            <div class="right-header">
                <div class="nav">
                    <a href="req.php">New Pickup</a>
                    <a href="index.php">Home</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="panel">
                <h1>Recovery Coordinator Dashboard</h1>
                <p>Welcome to the staff dashboard. You can now manage pickup requests and monitor activity from here.</p>
            </div>

            <div class="stats">
                <div class="stat-box">
                    <span>Total pickups</span>
                    <strong>0</strong>
                </div>
                <div class="stat-box">
                    <span>Pending pickups</span>
                    <strong>0</strong>
                </div>
                <div class="stat-box">
                    <span>Assigned pickups</span>
                    <strong>0</strong>                    
                </div>
                <div class="stat-box">
                    <span>Unassigned pickups</span>
                    <strong>0</strong>
                </div>
                <div class="stat-box">
                    <span>Completed recoveries</span>
                    <strong>0</strong>
                </div>
            </div>
            <div class="panel">
                <h2>Reports</h2>
                <p>No reports available at the moment.</p>
            </div>
            <div class="panel">
                <h2>Recent Activity</h2>
                <p>No recent activity to display.</p>
        </div>
    </body>
</html>