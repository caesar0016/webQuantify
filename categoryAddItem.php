<?php
    include("header.html");
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantify · Add Catagory</title>
</head>
<body>
    <div class="div" >
        <button type="button" class="btn-close m-4" aria-label="Close" onclick="location.href='addItem.php'"></button>
    </div>
    
    <div class="container text-center"> <!--container tex-center div-->
        <div class="row">     <!--This is the row div-->
            <div class="col"> <!--1 out of 2 column-->
                Category Name
            </div>            <!--1 out of 2 column-->
            <!--Division -->
            <div class="col">     <!--2 out of 2 column-->
                2 of 2
            </div>            <!--2 out of 2 column-->
        </div>                  <!--This is the row div-->
        
        <div class="row mt-4">     <!--This is the row div-->
            <div class="col"> <!--1 out of 2 column-->
                <input class="form-control border border-2 border-dark" type="text" aria-label="default input example">
            </div>            <!--1 out of 2 column-->
            <!--Division -->
            <div class="col">     <!--2 out of 2 column-->
                2 of 2
            </div>            <!--2 out of 2 column-->
        </div>                  <!--This is the row div-->
        <div class="row mt-4">     <!--This is the row div-->
            <div class="col"> <!--1 out of 2 column-->
            <button type="button" class="btn btn-outline-primary">Save</button>
            </div>            <!--1 out of 2 column-->
            <!--Division -->
            <div class="col">     <!--2 out of 2 column-->
                2 of 2
            </div>            <!--2 out of 2 column-->
        </div>                  <!--This is the row div-->
    </div> <!--container tex-center div-->
</body>
</html>