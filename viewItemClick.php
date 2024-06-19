<?php
    include("header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Click</title>
    <link rel="stylesheet" href="cssFiles/viewItemClick.css">
</head>
<body class="light">
    <div class="container-fluid text-center mt-4">
        <div class="row justify-content-center">
            <div class="col-5 ">
                <div class="card mx-auto border border-dark border-3" style="width: 20rem;">
                    <img src="https://media.karousell.com/media/photos/products/2022/2/21/sti_college_school_uniform_1645456214_0f6c08a3" class="card-img-top" alt="Clothes Images" style="width: 100%; height: 50%; margin: auto;">
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
            <div class="col-4">
                <h1>Pickup Date</h1><br>
                <div class="calendar border border-primary w-2">
                    <div class="calendar-header">
                        <span class="month-picker" id="month-picker">
                            June
                        </span>
                        <div class="year-picker">
                            <span class="year-change" id="prev-year">
                                <pre><</pre>
                            </span>
                            <span id="year">2024</span>
                            <span class="year-change" id="next-year">
                                <pre>></pre>
                            </span>
                        </div>
                    </div>
                    <div class="calendar-body">
                        <div class="calendar-week-day">
                            <div>Sun</div>
                            <div>Mon</div>
                            <div>Tue</div>
                            <div>Wed</div>
                            <div>Thu</div>
                            <div>Fri</div>
                            <div>Sat</div>
                        </div>
                        <div class="calendar-days">
                            <div>
                                1
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                            <div>2</div>
                            <div>3</div>
                            <div>4</div>
                            <div>5</div>
                            <div>6</div>
                            <div>7</div>
                            <div>1</div>
                            <div>2</div>
                            <div>3</div>
                            <div>4</div>
                            <div>5</div>
                            <div>6</div>
                            <div>7</div>
                        </div>
                    </div>
                    <div class="calendar-footer">
                    </div>
                    <div class="month-list">
                    </div>
                </div><!--calendar Header-->
            </div>
        </div>
    </div>
    <script src="jsFiles/viewItemClick.js"></script>
</body>
</html>