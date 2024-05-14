<?php 
include "db_conn.php";

if(isset($_POST["submit"])){
    $number = $_POST["number"];
    $lastname = $_POST["lastname"];
    $firstname = $_POST["firstname"];
    $email = $_POST["email"];   
    $password = $_POST["password"];
    $status = $_POST["status"];

    $sql = "INSERT INTO `users`(`id`, `number`, `lastname`, `firstname`, `email`, `password`, `status`) 
    VALUES (NULL,'$number','$lastname','$firstname','$email','$password','$status')";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: index.php?msg=New record created successfully");
    }
    else{
        echo "Failed: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!--Bootstrap-->
    
    <!--Font Awesome-->
    <script src="https://kit.fontawesome.com/48c28ee6d7.js" crossorigin="anonymous"></script>
    <!--Font Awesome-->
    <title>Users</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">

    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New User</h3>
        </div>    

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">

                    <div class="col">
                        <label class="form-label">Employee/Student Number:</label>
                        <input type="text" class="form-control" name="number" placeholder="2020-12345">
                    </div>

                    <div class="col">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="lastname" placeholder="e.g. Cruz">
                    </div>

                    <div class="col">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="firstname" placeholder="e.g. Juan">
                    </div>
                </div>

                <div class="row mb-3"> 
                    <div class="col mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="e.g. example@ceu.edu.ph">
                    </div>

                    <div class="col mb-3">
                        <label class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>

                <div class="row mb-3"> 
                    <div class="form-group mb-3">
                        <label>Status:</label>&nbsp;
                        <input type="radio" class="form-check-input" name="status" id="admin" value="Admin">
                        <label for="admin" class="form-input-label">Admin</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="status" id="guest" value="Guest">
                        <label for="guest" class="form-input-label">Guest</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-success" name="submit">Submit</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--Bootstrap-->
</body>

</html>