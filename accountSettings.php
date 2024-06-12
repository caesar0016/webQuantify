<?php
    include("header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantify-Account Settings</title>
</head>
<body>
    <div class="container text-center m-4 ">
        <h2>Account Settings</h2>
    </div>
    <div class="mx-4 text-center border bg-secondary">
        <div class="row">
            <div class="col d-flex flex-column align-items-center justify-content-center mt-4 text-black">
                <label for="firstNameInput" class="form-label">First Name</label>
                <input class="form-control m-2" type="text" aria-label="default input example" style="width: 30%;">
            </div>
            <div class="col d-flex flex-column align-items-center justify-content-center mt-4 text-black">
                <label for="firstNameInput" class="form-label">Last Name</label>
                <input class="form-control m-2" type="text" aria-label="default input example" style="width: 30%;">
            </div>
        </div>
        <div class="row">
            <div class="col d-flex flex-column align-items-center justify-content-center mt-4 text-black">
                <label for="firstNameInput" class="form-label">Email</label>
                <input class="form-control m-2" type="text" aria-label="default input example" style="width: 30%;">
            </div>
            <div class="col d-flex flex-column align-items-center justify-content-center mt-4 text-black">
                <label for="firstNameInput" class="form-label">Username</label>
                <input class="form-control m-2" type="text" aria-label="default input example" style="width: 30%;">
            </div>
        </div>
        <div class="row">
            <div class="col d-flex flex-column align-items-center justify-content-center mt-4 text-black">
                <label for="firstNameInput" class="form-label">Password</label>
                <input class="form-control m-2" type="text" aria-label="default input example" style="width: 30%;">
            </div>
            <div class="col d-flex flex-column align-items-center justify-content-center mt-4 text-black">
                <label for="firstNameInput" class="form-label">Confirm Password</label>
                <input class="form-control m-2" type="text" aria-label="default input example" style="width: 30%;">
            </div>
        </div>
        <div class="row mb-4">
            <div class="col d-flex flex-column align-items-center justify-content-center mt-4 text-black">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle text-black border border-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Select Role
                    <ul class="dropdown-menu border border-dark">
                        <li>Normal User</li>
                        <li>Admin</li>
                    </ul>
                    </button>
                </div>
            </div>
            <div class="col d-flex flex-column align-items-center justify-content-center mt-4 text-black">
                <button type="button" class="btn btn-primary text-black">Save</button>
            </div>
        </div>
    </div>
</body>
</html>