<?php
require 'connection.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection with sql(CRUD)</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
    <h1>Student Details</h1>
        <!-- CONNECTING WITH MYSQL -->
        <div class="row">
            <div class="col-md-6">
                <!-- POST METHOD -->
                <form method="post">
                 
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Your Name" name="stdname">
                    </div>
                  
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Enter Your age" name="stdage">
                    </div>
                    <button type="submit" class="btn btn-primary" >Done</button>
                </form>
                <?php 
              
                if($_SERVER["REQUEST_METHOD"] == "POST"){
              
                    $stdname = $_POST['stdname'];
                    $stdage = $_POST['stdage'];

                    $query = "INSERT INTO student_details (s_name, s_phone) VALUES (?,?)";
                    $param = array($stdage,$stdage);
                    $result = sqlsrv_query($conn,$query,$param);
                    // if($result){
                    //     echo "<h1>Data Inserted</h1>";
                    // }else{
                    //     echo "<h1>Data Not Inserted</h1>";
                    // }
                    if ($result === false) {
                        die(print_r(sqlsrv_errors(), true));
                    } else {
                        echo "Record added successfully.";
                    }
                }
                ?>         
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies (jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
