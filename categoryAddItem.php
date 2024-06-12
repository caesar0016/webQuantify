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
</head>
<body>
    <div class="div" >
        <button type="button" class="btn-close m-4" aria-label="Close" onclick="location.href='addItem.php'"></button>
    </div>
    <div class="container text-center"> <!--container tex-center div-->
        <div class="row">     <!--This is the row div-->
            <div class="col"> <!--1 out of 2 column-->
                <h4>Category Name</h4>
                <div class="input-group mb-3 px-4 mt-4">
                    <input type="text" class="form-control border-black" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>
                <button type="button" class="btn btn-primary">Confirm</button>
            </div>            <!--1 out of 2 column-->
            <!--Division -->
            <div class="col border border-dark">     <!--2 out of 2 column-->
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Polo Male</td>
                    <td>
                        <a href="#" class="btn" role="button">
                        <img src="images/ic_edit.png" alt="Edit">
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Polo Female</td>
                    <td>
                        <a href="#" class="btn" role="button">
                        <img src="images/ic_edit.png" alt="Edit">
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Pants Male</td>
                    <td>
                        <a href="#" class="btn" role="button">
                        <img src="images/ic_edit.png" alt="Edit">
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">4</th>
                    <td>Pants Female</td>
                    <td>
                        <a href="#" class="btn" role="button">
                        <img src="images/ic_edit.png" alt="Edit">
                        </a>
                    </td>
                    </tr>
                    <tr>
                    <th scope="row">5</th>
                    <td>Anniversary Shirt</td>
                    <td>
                        <a href="#" class="btn" role="button">
                        <img src="images/ic_edit.png" alt="Edit">
                        </a>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>            <!--2 out of 2 column-->
        </div>                  <!--This is the row div-->
    </div> <!--container tex-center div-->
</body>
</html>