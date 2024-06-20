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
            c.categoryID,
            c.categoryName,
            m.description,
            m.size,
            m.price,
            m.stock,
            m.imagePath
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
    $merchID = isset($row['merchID']) ? $row['merchID'] : '';
    $itemName = isset($row['itemName']) ? $row['itemName'] : '';
    $categoryName = isset($row['categoryName']) ? $row['categoryName'] : '';
    $description = isset($row['description']) ? $row['description'] : '';
    $size = isset($row['size']) ? $row['size'] : '';
    $price = isset($row['price']) ? $row['price'] : '';
    $stock = isset($row['stock']) ? $row['stock'] : '';
    $categoryID = isset($row['categoryID']) ? $row['categoryID'] : '';
    $imagePath = isset($row['imagePath']) ? $row['imagePath'] : ''; // Include imagePath
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
    <div class="d-flex m-4 gap-4 align-items-center">
        <button type="button" class="btn-close btn-close-red" aria-label="Close" onclick="location.href='inventoryPage.php'"></button>
        <button type="button" class="btn btn-outline-primary ml-4">
            <a href="categoryAddItem.php" class="text-decoration-none text-reset">Add Category</a>
        </button>
    </div>
    <div class="container text-center p-4">
        <form method="post" action="ajaxFiles/insertMerch.php" id="formEditMerch" autocomplete="off" enctype="multipart/form-data">
            <h4>Update Item</h4>
            <input type="hidden" name="merchID" value="<?php echo $merchID; ?>">
            <div class="row">
                <div class="col">
                    <div class="container">
                        <div class="input-group mb-3 itemName-input">
                            <span class="input-group-text mt-3" id="inputGroup-sizing-default">Item Name</span>
                            <input type="text" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemName" value="<?php echo htmlspecialchars($itemName); ?>">
                        </div>
                        <div class="input-group mb-3 mt-4 itemName-input">
                            <span class="input-group-text mt-3" id="inputGroup-sizing-default">Description</span>
                            <input type="text" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemDesc" value="<?php echo htmlspecialchars($description); ?>">
                        </div>
                        <div class="input-group mt-4 itemName-input">
                            <span class="input-group-text mt-3 mb-3" id="inputGroup-sizing-default">Size</span>
                            <input type="text" class="form-control mt-3 mb-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemSize" value="<?php echo htmlspecialchars($size); ?>">
                            <span class="input-group-text mt-3 mb-3" id="inputGroup-sizing-default">Price</span>
                            <input type="number" class="form-control mt-3 mb-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemPrice" value="<?php echo htmlspecialchars($price); ?>">
                        </div>
                        <div class="input-group mb-3 itemName-input">
                            <span class="input-group-text mt-3" id="inputGroup-sizing-default">Stock</span>
                            <input type="text" class="form-control mt-3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="itemStock" value="<?php echo htmlspecialchars($stock); ?>">
                        </div>
                        <select name="category" class="form-select itemName-input mt-4" aria-label="Default select example" required>
                            <option selected disabled><?php echo "$categoryName"; ?></option>
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
                    <div class="input-group mb-3 mt-4 itemName-input">
                        <div class="container">
                            <button type="submit" class="btn btn-warning ml-5" id="btnUpdateMerch">
                                Save
                            </button>
                            <button type="submit" class="btn btn-danger ml-5" id="btnDeleteMerch">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card mt-4 border border-black" style="width: 20rem;">
                    <img id="itemImagePreview" src="<?php echo htmlspecialchars($imagePath); ?>" class="card-img-top mt-2" alt="...">
                    <div class="card-body">
                        <p class="card-text">This is an image description</p>
                        <p class="card-text">
                        <div class="h5 text-danger">350</div>
                        </p>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01"></label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="itemImage" accept=".jpg, .png, .jpeg" onchange="previewImage(event)">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        function previewImage(event) {
            const input = event.target;
            const file = input.files[0];
            const preview = document.getElementById('itemImagePreview');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        }

        $(document).ready(function() {
            $(document).on('submit', '#formEditMerch', function(e) {
                e.preventDefault();

                var categoryID = $('select[name="category"]').val();
                var formData = new FormData(this);
                formData.append("updateMerch", true);

                $.ajax({
                    type: 'POST',
                    url: 'ajaxFiles/insertMerch.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if (response.status === 'success') {
                            window.location.href = 'inventoryPage.php';
                            alert('Item successfully added.');
                        } else {
                            console.error('Failed to add merch:', response.message);
                            alert('Failed to add merchandise: ' + response.message + '. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        window.location.href = 'inventoryPage.php';
                    }
                });
            });

            $('#btnDeleteMerch').click(function(e) {
                e.preventDefault();
                var merchID = $('input[name="merchID"]').val();

                $.ajax({
                    type: 'POST',
                    url: 'ajaxFiles/insertMerch.php',
                    data: {
                        archiveMerchID: merchID
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            alert('Item successfully archived.');
                            window.location.href = 'inventoryPage.php';
                        } else {
                            alert('Failed to archive item: ' + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX request failed:', error);
                        alert('An error occurred while archiving the item. Please try again later.');
                    }
                });
            });
        });
    </script>
</body>
</html>
