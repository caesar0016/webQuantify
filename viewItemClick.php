<?php
include("header.html");
include("database.php");

// Validate and sanitize the merchID parameter
if (isset($_GET['merchID']) && is_numeric($_GET['merchID'])) {
    $merch_id = mysqli_real_escape_string($conn, $_GET['merchID']);
    $merchName = mysqli_real_escape_string($conn, $_GET['itemName']);
    // Proceed with your logic
    // For example, perform a database query using the sanitized $merch_id
    $query = "SELECT * FROM merchTbl WHERE merchID = '$merch_id'";
    $query_run = mysqli_query($conn, $query);
   // echo $merchName;

    // Rest of your code...
} else {
    // Handle invalid or missing merchID parameter
    echo "Invalid merchID";
}
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
            <div class="col-3 ">
                <!-- start of card -->
                <?php
                $query = "Select * from merchTbl where merchID = '$merch_id'";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    while ($merchList1 = mysqli_fetch_assoc($query_run)) {
                        $merchName = $merchList1['itemName'];
                        $imagePath1 = $merchList1['imagePath'];
                        $merchDesc = $merchList1['description'];
                        $price = $merchList1['price'];
                        $stock = $merchList1['stock'];
                        $size = $merchList1['size'];

                        // <img src="img/' . ($imagePath) . '" class="card-img-top" alt="Item Image">
                        echo '
                                <div class="card mx-auto border border-dark border-3 mt-5" style="width: 20rem;">
                                    <img src="ajaxFiles/img/' . $imagePath1 . '" class="card-img-top" alt="Item Image">
                                    <div class="card-body text-center" style="width: 50%; margin: auto;">
                                        <p class="card-text">' . htmlspecialchars($merchName) . '</p>
                                        <p class="card-text">' . htmlspecialchars($merchDesc) . '</p>
                                        <p class="card-text text-danger">P' . htmlspecialchars($price) . '</p>
                                        <p class="card-text">Size: ' . htmlspecialchars($size) . '</p>
                                        <p class="card-text">Stock: ' . htmlspecialchars($stock) . '</p>
                                    </div>
                                </div>
                                ';
                    }
                }

                ?>
                <!-- end of card -->
            </div>
            <div class="col-3 text-center mt-5">
                <!-- This is the middle part -->
                 <form action="" method="post">

                     <div class="h3">Name</div>
                 <input class="form-control" type="text" placeholder="Name" aria-label="default input example" name="clientName" required>
                     <br>
                     <div class="btn-group mt-5" role="group" aria-label="Basic outlined example"> <!--Button group for increaseing the qty-->
                         <button type="button" class="btn btn-outline-primary" id="btnDecrement">
                             <img src="images/ic_minus.png" alt="minusPictures">
                         </button>
                         <input type="text" class="col-3 text-center border-primary mx-2" required>
                         <button type="button" class="btn btn-outline-primary" id="btnIncrement">
                             <img src="images/ic_add.png" alt="IncementPicture">
                         </button>
                     </div>
                     <button id="btnReserve" type="submit" class="btn btn-secondary mt-5">Reserve</button>
                 </form>
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