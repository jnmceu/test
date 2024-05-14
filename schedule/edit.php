<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
    $date = $_POST["date"];
    $assigned_by = $_POST["assigned_by"];
    $department = $_POST["department"];
    $remarks = $_POST["remarks"];
    $pc_quantity = $_POST["pc_quantity"];
    $monitor_quantity = $_POST["monitor_quantity"];

    $sql = "UPDATE `schedule` SET `date`= '$date',`assigned_by`='$assigned_by',`department`='$department',`remarks`='$remarks',`pc_quantity`='$pc_quantity',`monitor_quantity`='$monitor_quantity' WHERE id = $id";
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
            <h3>Edit User Information</h3>
            <p class="text-muted">Click update after changing any information</p>
        </div>

        <?php
        $sql = "SELECT * FROM `schedule` WHERE id = $id LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
                <div class="row mb-3">

                    <div class="col">
                        <label class="form-label">Date:</label>
                        <input type="date" class="form-control" name="date" value="<?php echo $row['date'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Assigned by:</label>
                        <input type="text" class="form-control" name="assigned_by" value="<?php echo $row['assigned_by'] ?>">
                    </div>

                    <div class="col">
                        <label class="form-label">Department:</label>
                        <input type="text" class="form-control" name="department"
                            value="<?php echo $row['department'] ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col mb-3">
                        <label class="form-label">Remarks:</label>
                        <input type="text" class="form-control" name="remarks" value="<?php echo $row['remarks'] ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="form-group mb-3">
                    <div class="col mb-3">
                        <label class="form-label">No. of PC:</label>
                        <input type="number" class="form-control" name="pc_quantity"
                            value="<?php echo $row['pc_quantity'] ?>">
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">No. of Monitor:</label>
                        <input type="number" class="form-control" name="monitor_quantity"
                            value="<?php echo $row['monitor_quantity'] ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-success" name="submit">Update</button>
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