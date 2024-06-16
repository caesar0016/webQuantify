<?php
    include("header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid text-center mt-4">
        <div class="row justify-content-center">
            <div class="col-5 ">
                <div class="card mx-auto border border-dark border-3" style="width: 20rem;">
                    <img src="images/bg_clothes.jpg" class="card-img-top" alt="Clothes Images" style="width: 100%; height: 50%; margin: auto;">
                    <div class="card-body text-center" style="width: 50%; margin: auto;">
                        <p class="card-text">Polo</p>
                        <p class="card-text">350</p>
                    </div>
                </div>
            </div>
            <div class="col-3 text-center mt-5">
                <!-- Example single danger button -->
                <div class="btn-group mt-5">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Select Size
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </div><br>
                <div class="btn-group mt-5" role="group" aria-label="Basic outlined example"> <!--Button group for increaseing the qty-->   
                    <button type="button" class="btn btn-outline-primary">
                        <img src="images/ic_minus.png" alt="Edit">
                    </button>
                    <input type="text" class="col-3 text-center border-primary mx-2">
                    <button type="button" class="btn btn-outline-primary">
                        <img src="images/ic_add.png" alt="Edit">
                    </button>
                </div>
                <button type="button" class="btn btn-secondary mt-5">Reserve</button>
            </div>
            <div class="col-4 border">
                <h1>Pickup Date</h1><br>
                
            </div>
        </div>
    </div>
</body>
</html>