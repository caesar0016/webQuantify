<?php
include("header.html");
include("database.php");

// Check if the merchID is provided in the URL
if (!isset($_GET['merchID']) || !is_numeric($_GET['merchID'])) {
    echo "Invalid merchID";
    exit;
}

$merchID = (int)$_GET['merchID']; // Ensure merchID is an integer to prevent SQL injection

$query = "SELECT 
            m.merchID, 
            m.itemName,
            c.categoryName,
            m.description,
            m.size,
            m.price,
            m.stock
          FROM merchtbl AS m
          LEFT JOIN categorytbl AS c
          ON m.categoryID = c.categoryID
          WHERE m.merchID = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $merchID);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    // Fetch the result
    $row = $result->fetch_assoc();
    $itemName = isset($row['itemName']) ? $row['itemName'] : ''; // Initialize $itemName with the item name, or an empty string if not available
    $categoryName = isset($row['categoryName']) ? $row['categoryName'] : ''; 
    $description = isset($row['description']) ? $row['description'] : ''; 
    $size = isset($row['size']) ? $row['size'] : ''; 
    $price = isset($row['price']) ? $row['price'] : ''; 
    $stock = isset($row['stock']) ? $row['stock'] : ''; 
} else {
    echo "Item not found.";
    exit;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantify · Edit Item</title>
</head>

<body>
    <!-- This is the close button -->
    <div class="d-flex m-4 gap-4 align-items-center">
        <!-- Button with red close style, redirects on click -->
        <button type="button" class="btn-close btn-close-red" aria-label="Close" onclick="location.href='inventoryPage.php'"></button>
        <!-- Add Category button with left margin -->
        <button type="button" class="btn btn-outline-primary ml-4">
            <a href="categoryAddItem.php" class="text-decoration-none text-reset">Add Category</a>
        </button>
    </div>
    <div class="container text-center p-4">
        <form method="post" action="ajaxFiles/insertMerch.php" id="formSaveMerch" autocomplete="off" enctype="multipart/form-data">
            <h4>Update Item</h4>
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="input-group mb-3 itemName-input">
                            <!-- Item Name -->
                            <span class="input-group-text mt-3" id="inputGroup-sizing-default">Item Name</span>
                            <input type="text" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemName" value="<?php echo htmlspecialchars($itemName); ?>">
                        </div>
                        <!-- Description -->
                        <div class="input-group mb-3 mt-4 itemName-input">
                            <span class="input-group-text mt-3" id="inputGroup-sizing-default">Description</span>
                            <input type="text" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemDesc" value="<?php echo htmlspecialchars($description); ?>">
                        </div>
                        <!-- Size and Price -->
                        <div class="input-group mt-4 itemName-input">
                            <span class="input-group-text mt-3 mb-3" id="inputGroup-sizing-default">Size</span>
                            <input type="text" class="form-control mt-3 mb-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemSize" value="<?php echo htmlspecialchars($size); ?>">
                            <span class="input-group-text mt-3 mb-3" id="inputGroup-sizing-default">Price</span>
                            <input type="number" class="form-control mt-3 mb-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemPrice" value="<?php echo htmlspecialchars($price); ?>">
                        </div>
                        <!-- Stock -->
                        <div class="input-group mb-3 itemName-input">
                            <span class="input-group-text mt-3" id="inputGroup-sizing-default">Stock</span>
                            <input type="text" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemStock" value="<?php echo htmlspecialchars($stock); ?>">
                        </div>
                        <!-- Category Selection -->
                        <select name="category" class="form-select itemName-input mt-4" aria-label="Default select example" required>
                            <option selected disabled><?php echo"$categoryName";?></option>
                            <?php
                            require 'database.php';

                            $query = "SELECT * FROM categoryTbl WHERE archive = 1";
                            $query_run = mysqli_query($conn, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                while ($categoryList = mysqli_fetch_assoc($query_run)) {
                                    echo '<option value="' . $categoryList['categoryID'] . '">' . $categoryList['categoryName'] . '</option>';
                                }
                            } else {
                                echo '<option disabled>No categories found</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <!-- Save Button -->
                    <div class="input-group mb-3 mt-4 itemName-input">
                        <div class="container">
                            <button type="submit" class="btn btn-warning ml-5">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Image Preview -->
                <div class="card mt-4 border border-black" style="width: 20rem;">
                    <img id="itemImagePreview" src="" class="card-img-top mt-2" alt="...">
                    <div class="card-body">
                        <p class="card-text">This is an image description</p>
                        <p class="card-text"><div class="h5 text-danger">350</div></p>
                    </div>
                    <!-- File Input -->
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01"></label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="itemImage" accept=".jpg, .png, .jpeg" onchange="previewImage(event)" required>
                    </div>
                </div>
            </div>
        </form>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // This handles adding merch to the database
            $(document).on('submit', '#formSaveMerch', function(e) {
                e.preventDefault();

                var categoryID = $('select[name="category"]').val();
                // Get form data
                var formData = new FormData(this);
                formData.append("addMerch", true);

                // Send AJAX request
                $.ajax({
                    type: 'POST',
                    url: 'ajaxFiles/insertMerch.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json', // Ensure we expect JSON data
                    success: function(response) {
                        console.log(response);
                        if (response.status === 'success') {
                            console.log(response);
                            // Uncomment this line if you want to reload the page on success
                            location.reload();
                            alert('Item successfully added.');
                        } else {
                            console.error('Failed to add merch:', response.message);
                            alert('Failed to add merchandise: ' + response.message + '. Please try again.');
                            console.log(response);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX request failed:', error);
                        alert('An error occurred while adding merchandise. Please try again later.');
                    }
                });
            });
        });
    </script>
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var itemImagePreview = document.getElementById('itemImagePreview');
                itemImagePreview.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

</body>

</html>