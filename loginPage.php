<?php
    include("header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="cssFiles/loginPage.css">
</head>
<body>
<div class="text-center fluid">
    <div class="row">
        <div class="col mt-4 m-4">
            <h2>Welcome to Quantify</h2><br>
            <div class="container mt-4">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 col-lg-6">
                        <div class="w-100">
                            <label class="visually-hidden mt-4" for="autoSizingInput">Name</label>
                            <input type="text" class="form-control border-black mt-4 mb-4" id="autoSizingInput" placeholder="Username"> <!--Username Input-->
                                <!--This is the divider for the username and password-->
                            <label class="visually-hidden mt-4 " for="autoSizingInput">Name</label>
                            <input type="password" class="form-control border-black mt-4 mb-4" id="autoSizingInput" placeholder="Password"> <!--Password Input-->
                            <button type="button" class="btn btn-primary">Login</button><!--This is the button login-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col border col-fixed-height p-0">
            <img src="images/bg_clothes.jpg" alt="Clothes" class="fixed-height-img">
        </div>
    </div>
</div>
</body>
</html>