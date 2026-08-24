<?php 
session_start();


?>
<!DOCTYPE html>
<html>
    <head>
        <title>Technician Dashboard</title>
        <link rel="stylesheet" href="index.css">
        <style>
            h1 {
                text-align: center;
                color: #27ae60;
                margin-top: 20px;
            }
            .welcome {
                text-align: center;
                color: #555;
                font-size: 16px;
            }  
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
            }
            h2 {
                margin-top: 0;
                color: #27ae60;
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
            }
            .requests {
                margin-top: 20px;
                display: flex;
                flex-direction:row;
            }
            .requests-stats {
                flex: 1;
                display: flex;
                flex-direction: column;
            }
            .view-requests {
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .view-requests button {
                background-color: #27ae60;
                color: white;
                border: none;
                padding: 20px 20px;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }
            .view-requests button:hover {
                background-color: #1e8449;
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
        <h1>Technician Dashboard</h1>
        <p class="welcome">Welcome to the technician dashboard. You can now manage your tasks and monitor your activity from here.</p>

        <div class="container">
            <div class="panel">
                <div class="requests">
                    <div class="requests-stats">
                        <h2>Assigned Requests</h2>
                        <p>No requests assigned at the moment.</p>
                    </div>
                    <div class="view-requests">
                        <button type="button" onclick="window.location.href='viewRequest.php'">View Requests</button>
                    </div>
                </div>
            </div>
            <div class="panel">
                <h2>Completed Requests</h2>
                <p>No completed requests to display.</p>
            </div>

            <div class="panel">
                <h2>Recent Activity</h2>
                <p>No recent activity to display.</p>
            </div>  

        </div>


    </body>
</html>
                    