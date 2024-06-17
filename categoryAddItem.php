<?php
    include("header.html");
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantify · Add Category</title>
    <link rel="stylesheet" href="path/to/your/bootstrap.css"> <!-- Add your Bootstrap CSS file path here -->
</head>
<body>
        <!--This is the live-->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Category Name</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <form id="saveCategory">
            <!--This is the modal body-->
            <div class="modal-body">
                <div class="alert alert-warning d-none">
                </div>
                <div class="mt-4">
                    <input type="text" class="form-control border border-dark" name="categoryName" placeholder="Input Category Name" autocomplete="off">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </form>
        
        


    </div>
    </div>
    <button type="button" class="btn btn-outline-primary m-2" data-bs-toggle="modal" data-bs-target="#categoryModal">
    Add Category
    </button>
    <div class="container-sm text-center">
    <table class="table mt-5 border">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Category Name</th>
        <th scope="col"></th><!--This is for the modal button-->
        </tr>
    </thead>
    <tbody>
    <tr>
        <th scope="row">1</th>
        <td>Category 1</td>
        <td>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                <img src="images/ic_edit.png" alt="Description of the image">
            </button>
        </td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td>Category 2</td>
        <td>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                <img src="images/ic_edit.png" alt="Description of the image">
            </button>
        </td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td>Category 3</td>
        <td>
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                <img src="images/ic_edit.png" alt="Description of the image">
            </button>
        </td>
    </tr>
  </tbody>
</table>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
         $(document).on('submit', '#saveCategory', function (e) {
        e.preventDefault();
        
        var formData = new FormData(this);

        formData.append("save_category", true);

        $.ajax({
            type: 'post',
            url: 'ajaxFiles/categoryAjax.php',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json', // Corrected dataType
            success: function (response){
                if(response.status == 200){
                    $('.alert').addClass('d-none'); // Corrected selector
                    $('#categoryModal').modal('hide'); // Corrected modal ID
                    $('#saveCategory')[0].reset();
                }
            }
        });
    })
    </script>
</body>
</html>
