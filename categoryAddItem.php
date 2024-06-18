<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantify · Add Category</title>
    <link rel="stylesheet" href="npm/node_modules/bootstrap/dist/css/bootstrap.css">
</head>
<body>
    <div class="container-fluid">

    <a href="inventoryPage.php" class="btn-close mt-5 ms-5 mb-3" style="margin-top: 5rem;" aria-label="Close">
        <button type="button" class="btn" aria-hidden="true">&times;</button>
    </a>

    </div>
    <!-- Add Category Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Category Name</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addCategoryForm" method="POST" action="ajaxFiles/categoryAjax.php">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="alert alert-warning d-none"></div>
                        <div class="mt-4">
                            <input type="text" class="form-control border border-dark" id="categoryInput" name="categoryName" placeholder="Input Category Name" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Category</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editCategoryForm" method="POST" action="ajaxFiles/categoryAjax.php">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="alert alert-warning d-none"></div>
                        <div class="mt-4">
                            <input type="hidden" id="editCategoryID" name="categoryID">
                            <input type="text" class="form-control border border-dark" id="editCategoryInput" name="categoryName" placeholder="Input Category Name" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Add Category Button -->
    <button type="button" class="btn btn-outline-primary ms-5 mt-2" data-bs-toggle="modal" data-bs-target="#categoryModal">
        Add Category
    </button>

    <div class="container-sm text-center">
        <table class="table table-striped mt-5 border" id="categoryTbl1">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col"></th><!-- This is for the modal button -->
                </tr>
            </thead>
            <tbody>
            <?php 
                require 'database.php';
                $query = "SELECT * FROM categoryTbl";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) > 0){
                    $index = 0; // Initialize $index
                    foreach($query_run as $categoryList){
                        ?>
                        <tr>
                            <th scope="row"><?= $index + 1 ?></th>
                            <td><?= $categoryList['categoryName'] ?></td> <!-- Access 'categoryName' element -->
                            <td>
                                <button type="button" value="<?= $categoryList['categoryID']; ?>" class="editCategorybtn btn btn-outline-primary edit-category" data-bs-toggle="modal" data-bs-target="#editCategoryModal" data-category="<?= $categoryList['categoryName'] ?>">
                                    <img src="images/ic_edit.png" alt="Edit">
                                </button>
                            </td>
                        </tr>
                        <?php
                        $index++; // Increment $index
                    }
                } else {
                    // Display a message if there are no category names
                    ?>
                    <tr>
                        <td colspan="3">No category names found.</td>
                    </tr>
                    <?php
                }
            ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="npm/node_modules/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <script>
    $(document).ready(function() {
        // Edit category button click event
        $('.edit-category').click(function() {
            var categoryName = $(this).data('category');
            var categoryID = $(this).val();
            $('#editCategoryInput').val(categoryName);
            $('#editCategoryID').val(categoryID);
           alert(categoryID);
        });

        // Form submission for adding category
        $(document).on('submit', '#addCategoryForm', function (e) {
            e.preventDefault();
            
            var formData = new FormData(this);
            formData.append("save_category", true);

            $.ajax({
                type: 'POST',
                url: 'ajaxFiles/categoryAjax.php',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (response) {
                    console.log(response); // Debugging: Log the response to console
                    if(response.status == 200){
                        $('.alert').addClass('d-none');
                        $('#categoryModal').modal('hide');
                        $('#addCategoryForm')[0].reset();
                        // Update table with the new category
                        $('#categoryTbl1').load(location.href + " #categoryTbl1");
                    } else {
                        $('.alert').removeClass('d-none').text(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Debugging: Log any errors to console
                }
            });
        });

        // Form submission for editing category
        $(document).on('submit', '#editCategoryForm', function (e) {
            e.preventDefault();
            
            var formData = new FormData(this);
            formData.append("edit_category", true);
            
            $.ajax({
                type: 'POST',
                url: 'ajaxFiles/categoryAjax.php',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (response) {
                    console.log(response); // Debugging: Log the response to console
                    if(response.status == 200){
                        $('.alert').addClass('d-none');
                        $('#editCategoryModal').modal('hide');
                        $('#editCategoryForm')[0].reset();
                        // Update table with the new category
                        $('#categoryTbl1').load(location.href + " #categoryTbl1");
                    } else {
                        $('.alert').removeClass('d-none').text(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Debugging: Log any errors to console
                }
            });
        });
    });
    </script>

</body>
</html>
