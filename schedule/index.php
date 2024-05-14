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
    <div class="container">
        <nav class="navbar navbar-light justify-content-left fs-3 mt-5 mb-4" style="background-color: #f8d7da;">
            <span class="px-3"><b>Schedule of Preventative Maintenance</b></span>
        </nav>
    </div>


    <div class="container">
        <?php
        if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        ' . $msg . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>
        <a href="add_new.php" class="btn btn-primary mb-4">Add New Schedule</a>
        <a href="../users/index.php" class="btn btn-success mb-4">Go to Users</a>
        <a href="../inventory/index.php" class="btn btn-success mb-4">Go to Inventory</a>
        
        <table class="table table-hover text-center table-bordered">
        <thead class="table-secondary">
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Date</th>
            <th scope="col">Assigned by</th>
            <th scope="col">Department</th>
            <th scope="col">Remarks</th>
            <th scope="col">No. of PCs</th>
            <th scope="col">No. of Monitors</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "db_conn.php";
            
                $sql = "SELECT * FROM schedule";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['id'] ?></td>
                    <td><?php echo $row['date'] ?></td>
                    <td><?php echo $row['assigned_by'] ?></td>
                    <td><?php echo $row['department'] ?></td>
                    <td><?php echo $row['remarks'] ?></td>
                    <td><?php echo $row['pc_quantity'] ?></td>
                    <td><?php echo $row['monitor_quantity'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                        <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                    </td>
                </tr>               
                <?php
                }
            ?>
        </tbody>
        </table>
    </div>

    <!--Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!--Bootstrap-->
</body>

</html>