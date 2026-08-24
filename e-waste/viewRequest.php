<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>View Request</title>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="form.css">
        <style>
            h1 {
                text-align: center;
                color: #27ae60;
                margin-top: 20px;
            }
            .description {
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
                position:relative;
            }
            .Form{
                display:none;
                position:absolute;
                margin-top:-600px;
                margin-left:900px;

            }
            .panel {
                background: white;
                border-radius: 14px;
                padding: 24px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.08);
                margin-bottom: 22px;
                margin-top: 30px;
                padding-bottom:60px;
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
                margin-top: -15px;
            }
            .info-details{
                background-color:#27ae60;
                border-radius:5px;
                display:flex;
                flex-direction:row;
                color:white;
                box-shadow: 3px 4px 19px rgba(0,0,0,0.3);
                margin-top:30px;
            }
            .key{
                background-color:#27ae60;
                display:flex;
                flex-direction:column;
                margin-left:20px;

            }
            .key p{
                font-size:20px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            .value{
                margin-left:20px;
                display:flex;
                flex-direction:column;
            }
            .value p{
                font-size:20px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
            details{
                display: flex;
                flex-direction:column;
            }
            .toForm{
                padding:4px 10px;
                height:10px;

            }
            .button{
                background-color: #27ae60;
                color: white;
                border: none;
                padding: 20px 20px;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
                margin-left:85%;
            }
            .button:hover{
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
        <div>
            <h1>View Request</h1>
            <p class="description">This is a simple view for displaying request details.</p>
        </div>
        <div class="container">
            <div class="panel">
                <h2>Request Details</h2>
                <p>No request details available at the moment.</p>
                <details>
                    <summary>more info</summary>
                    <div class="info-details">
                        <div class="key">
                            <p>location</p>
                            <p>contact</p>
                            <p>date applied</p>
                            <p>condition</p>

                        </div>
                        <div class="value">
                            <p>not available</p>
                            <p>not available</p>
                            <p>not available</p>
                            <p>not available</p>
                        </div>

                    </div>

                        <div class="toForm">
                            <button class="button" onclick="Form()">fill the form</button>
                        </div>
                </details>
            </div>
        </div>
        <div id="is_form" class="Form">
                <form action="" method="POST">
                    <fieldset>
                        <legend>E-WASTE DETAILS FORM</legend>

                        <label for="Eweight">Actual Weight (kg)</label>
                        <input class="input" id="Eweight" name="Eweight" type="number" placeholder="Enter Actual weight" required>

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
                        <button class="form-button" type="submit">Submit Request</button>
                        <button class="form-button" onclick="Form()" >go back</button>


                    </fieldset>
                </form>
        </div>

    </body>
</html>
<script src="viewRequest.js"></script>