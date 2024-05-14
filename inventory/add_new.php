<?php 
include "db_conn.php";

if(isset($_POST["submit"])){
    $equip_no = $_POST["equip_no"];
    $equip_type = $_POST["equip_type"];
    $brand = $_POST["brand"];
    $serial_no = strlen($_POST["serial_no"]) > 0 ? "'$_POST[serial_no]'" : "NULL";
    $comp_name = $_POST["comp_name"];
    $location = $_POST["location"];
    $date_acquire = $_POST["date_acquire"];
    $unit_cost = $_POST["unit_cost"];
    $date_report = $_POST["date_report"];
    $remarks = $_POST["remarks"];
    $prevent_maintain = $_POST["prevent_maintain"];
    $repair_cost = $_POST["repair_cost"];
    $serviced_by = $_POST["serviced_by"];
    

    $sql = "INSERT INTO `inventory`(`id`, `equip_no`, `equip_type`, `brand`, `serial_no`, `comp_name`, `location`, `date_acquire`, `unit_cost`, `date_report`, `remarks`, `prevent_maintain`, `repair_cost`, `serviced_by`) 
    VALUES (NULL, '$equip_no', '$equip_type', '$brand', $serial_no, '$comp_name', '$location', '$date_acquire', '$unit_cost', '$date_report', '$remarks', '$prevent_maintain', '$repair_cost', '$serviced_by')";

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
    <title>Inventory</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">

    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New Inventory Report</h3>
        </div>    

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-4">

                    <div class="col">
                        <label class="form-label">Equipment Number:</label>
                        <input type="number" class="form-control" name="equip_no">
                    </div>

                    <div class="col">
                        <label class="form-label">Brand Model:</label>
                        <input type="text" class="form-control" name="brand" placeholder="e.g. Juan">
                    </div>
                </div>
                
                <div class="row mb-4">

                    <div class="col">
                        <label class="form-label">Equipment Type:</label>
                        <input type="radio" class="form-check-input" name="equip_type" id="cpu" value="CPU">
                        <label for="cpu" class="form-input-label">CPU</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="equip_type" id="monitor" value="Monitor">
                        <label for="monitor" class="form-input-label">Monitor</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="equip_type" id="printer" value="Printer">
                        <label for="printer" class="form-input-label">Printer</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="equip_type" id="etc" value="Etc.">
                        <label for="etc" class="form-input-label">Etc.</label>
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col">
                        <label class="form-label">Serial Number:</label>
                        <input type="text" class="form-control" name="serial_no" placeholder="e.g. 1234567890">
                    </div>

                    <div class="col">
                        <label class="form-label">Computer Name:</label>
                        <input type="text" class="form-control" name="comp_name" placeholder="e.g. CEU">
                    </div>

                    <div class="col">
                        <label class="form-label">Location:</label>
                        <input type="text" class="form-control" name="location" placeholder="e.g. ICT Department">
                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col">
                        <label class="form-label">Date Acquired:</label>
                        <input type="date" class="form-control" name="date_acquire">
                    </div>

                    <div class="col">
                        <label class="form-label">Unit Cost:</label>
                        <input type="number" class="form-control" name="unit_cost">
                    </div>

                    <div class="col">
                        <label class="form-label">Report Date:</label>
                        <input type="date" class="form-control" name="date_report">
                    </div>

                </div>                

                <div class="row mb-4">

                    <div class="col">
                        <label class="form-label">Remark(s):</label>
                        <input type="text" class="form-control" name="remarks" placeholder="Lorem ipsum...">
                    </div>

                </div>

                <div class="row mb-4"> 
                    <div class="form-group mb-3">
                        <label>Preventative Maintenance:</label>&nbsp;
                        <input type="radio" class="form-check-input" name="prevent_maintain" id="yes" value="Yes">
                        <label for="yes" class="form-input-label">Yes</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="prevent_maintain" id="no" value="No">
                        <label for="no" class="form-input-label">No</label>
                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col">
                        <label class="form-label">Repair Cost:</label>
                        <input type="number" class="form-control" name="repair_cost">
                    </div>

                    <div class="col">
                        <label class="form-label">Serviced by:</label>
                        <input type="text" class="form-control" name="serviced_by">
                    </div>


                </div>  

                <button type="submit" class="btn btn-success" name="submit">Submit</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>&nbsp;
            </form>&nbsp;
        </div>&nbsp;
    </div>&nbsp;

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--Bootstrap-->
</body>

</html>