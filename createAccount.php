<?php
    include("header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantify : Create Account</title>
    <link rel="stylesheet" href="cssFiles/loginPage.css">
</head>
<body>
<div class="text-center fluid">
    <div class="row">
        <div class="col m-4">
            <h2>Create Account</h2><br>
            <div class="container text-center fluid mb-5">
                <div class="row">
                    <div class="col mb-5">
                    <div class="input-group mb-3">
                        <span class="input-group-text border border-dark" id="inputGroup-sizing-default">First Name</span> <!--This is the firstname-->
                        <input type="text" class="form-control border border-dark" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    </div>
                    <div class="col mb-5">
                    <div class="input-group mb-3">
                        <span class="input-group-text border border-dark" id="inputGroup-sizing-default">Last Name</span> <!--This is the lastname-->
                        <input type="text" class="form-control border border-dark" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    </div>
                </div>
                <div class="input-group mb-5" style="width: 50%; margin: 0 auto;">
                    <span class="input-group-text border border-dark" id="inputGroup-sizing-default">Username</span> <!--This is the username-->
                    <input type="text" class="form-control border border-dark" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <div class="row mt-5">
                    <div class="col mt-5">
                        <div class="input-group mb-5">
                            <span class="input-group-text border border-dark " id="inputGroup-sizing-default">Password</span> <!--This is the password-->
                            <input type="text" class="form-control border border-dark" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="col m-5">
                        <div class="input-group mb-5">
                            <span class="input-group-text border border-dark" id="inputGroup-sizing-default">Confirm Password</span> <!--This is the confirm pass-->
                            <input type="text" class="form-control border border-dark" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-primary">Create Account</button>
        </div>
        <div class="col border col-fixed-height p-0">
            <img src="images/bg_clothes.jpg" alt="Clothes" class="fixed-height-img"><!--Images of clothes like literally the other half-->
        </div>
    </div>
</div>
</body>
</html>
