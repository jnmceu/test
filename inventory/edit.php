<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
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

    $sql = "UPDATE `inventory` SET `equip_no` = '$equip_no',`equip_type` = '$equip_type',`brand`='$brand',`serial_no`= $serial_no,`comp_name`='$comp_name',`location`='$location',`date_acquire`='$date_acquire',`unit_cost`='$unit_cost',`date_report`='$date_report',`remarks`='$remarks',`prevent_maintain`='$prevent_maintain',`repair_cost`='$repair_cost',`serviced_by`='$serviced_by' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php?msg=Data updated successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD Application</title>
</head>

<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5">
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Edit Inventory Report</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <?php
        $sql = "SELECT * FROM `inventory` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-4">

                    <div class="col">
                        <label class="form-label">Equipment Number:</label>
                        <input type="number" class="form-control" name="equip_no"
                            value="<?php echo $row['equip_no']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Brand Model:</label>
                        <input type="text" class="form-control" name="brand" value="<?php echo $row['brand']; ?>">
                    </div>
                </div>

                <div class="row mb-4">

                    <div class="col">
                        <label class="form-label">Equipment Type:</label>
                        <input type="radio" class="form-check-input" name="equip_type" id="cpu" value="CPU" <?php echo ($row["equip_type"] == 'CPU') ? "checked" : ""; ?>>
                        <label for="cpu" class="form-input-label">CPU</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="equip_type" id="monitor" value="Monitor"
                            <?php echo ($row["equip_type"] == 'Monitor') ? "checked" : ""; ?>>
                        <label for="monitor" class="form-input-label">Monitor</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="equip_type" id="printer" value="Printer"
                            <?php echo ($row["equip_type"] == 'Printer') ? "checked" : ""; ?>>
                        <label for="printer" class="form-input-label">Printer</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="equip_type" id="etc" value="Etc." <?php echo ($row["equip_type"] == 'Etc.') ? "checked" : ""; ?>>
                        <label for="etc" class="form-input-label">Etc.</label>
                    </div>

                </div>

                <div class="row mb-3">

                    <div class="col">
                        <label class="form-label">Serial Number:</label>
                        <input type="text" class="form-control" name="serial_no"
                            value="<?php echo $row['serial_no']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Computer Name:</label>
                        <input type="text" class="form-control" name="comp_name"
                            value="<?php echo $row['comp_name']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Location:</label>
                        <input type="text" class="form-control" name="location" value="<?php echo $row['location']; ?>">
                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col">
                        <label class="form-label">Date Acquired:</label>
                        <input type="date" class="form-control" name="date_acquire"
                            value="<?php echo $row['date_acquire']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Unit Cost:</label>
                        <input type="number" class="form-control" name="unit_cost"
                            value="<?php echo $row['unit_cost']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Report Date:</label>
                        <input type="date" class="form-control" name="date_report"
                            value="<?php echo $row['date_report']; ?>">
                    </div>

                </div>

                <div class="row mb-4">

                    <div class="col">
                        <label class="form-label">Remarks:</label>
                        <input type="text" class="form-control" name="remarks" value="<?php echo $row['remarks']; ?>">
                    </div>

                </div>

                <div class="row mb-4">
                    <div class="form-group mb-3">
                        <label>Preventative Maintenance:</label>&nbsp;
                        <input type="radio" class="form-check-input" name="prevent_maintain" id="yes" value="Yes" <?php echo ($row["prevent_maintain"] == 'Yes') ? "checked" : ""; ?>>
                        <label for="yes" class="form-input-label">Yes</label>
                        &nbsp;
                        <input type="radio" class="form-check-input" name="prevent_maintain" id="no" value="No" <?php echo ($row["prevent_maintain"] == 'No') ? "checked" : ""; ?>>
                        <label for="no" class="form-input-label">No</label>
                    </div>
                </div>

                <div class="row mb-3">

                    <div class="col">
                        <label class="form-label">Repair Cost:</label>
                        <input type="number" class="form-control" name="repair_cost"
                            value="<?php echo $row['repair_cost']; ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Serviced by:</label>
                        <input type="text" class="form-control" name="serviced_by"
                            value="<?php echo $row['serviced_by']; ?>">
                    </div>


                </div>

                <button type="submit" class="btn btn-success" name="submit">Submit</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </form>
        </div>
    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

</body>

</html>