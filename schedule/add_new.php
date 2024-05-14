<?php 
include "db_conn.php";

if(isset($_POST["submit"])){
    $date = $_POST["date"];
    $assigned_by = $_POST["assigned_by"];
    $department = $_POST["department"];
    $remarks = $_POST["remarks"];   
    $pc_quantity = $_POST["pc_quantity"];
    $monitor_quantity = $_POST["monitor_quantity"];

    $sql = "INSERT INTO `schedule`(`id`, `date`, `assigned_by`, `department`, `remarks`, `pc_quantity`, `monitor_quantity`) 
    VALUES (NULL,'$date','$assigned_by','$department','$remarks','$pc_quantity','$monitor_quantity')";

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
    <title>Schedule</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">

    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New Schedule</h3>
        </div>    

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">

                    <div class="col">
                        <label class="form-label">Date:</label>
                        <input type="date" class="form-control" name="date">
                    </div>

                    <div class="col">
                        <label class="form-label">Assigned by:</label>
                        <input type="text" class="form-control" name="assigned_by" placeholder="e.g. Juan Cruz">
                    </div>

                    <div class="col">
                        <label class="form-label">Department:</label>
                        <input type="text" class="form-control" name="department">
                    </div>
                </div>

                <div class="row mb-3"> 
                    <div class="col mb-3">
                        <label class="form-label">Remarks:</label>
                        <input type="text" class="form-control" name="remarks" placeholder="e.g. Lorem ipsum...">
                    </div>
                </div>

                <div class="row mb-3"> 
                    <div class="col">
                        <label class="form-label">No. of PC:</label>
                        <input type="number" class="form-control" name="pc_quantity">
                    </div>
                    <div class="col">
                        <label class="form-label">No. of Monitor:</label>
                        <input type="number" class="form-control" name="monitor_quantity">
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