<?php 
session_start();

    include("connection.php");
    include("functions.php");
  include("db_connect.php");

    $admin_data = check_login($con);
?>

<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js"
></script>

<!DOCTYPE html>
<html>
<head>
    <title>PHINMA UPang Alumni Tracker | ADMIN</title>
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="images/alumni_logo.png">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" type="text/css" href="print.css" media="print">
  

<!-- DataTables CSS library -->
<!-- <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> -->

<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 -->
<!-- DataTables JS library -->
<!-- <script type="text/javascript" src="DataTables/datatables.min.js"></script> -->


<!-- <script type="text/javascript">
    $(document).ready(function(){
        $('#alumniList').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "getData.php"
        });

    });
</script> -->


</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center" style="margin-top: 100px;">Alumni</h2>
                <br>
                <br>
                <br>
                <table class="table table-borderless">
                    <thead>
                        <tr>
                            <th>Student Number</th>
                            <th>Student Name</th>
                            <th>Batch</th>
                            <th>Course Graduated</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM alumni ORDER BY batch_grad DESC";
                        $res = mysqli_query($openconnection, $query);
                        while ($row = mysqli_fetch_assoc($res)) 
                        {
                        ?>
                        <tr>
                            <td><?php echo $row['studnum'];?></td>
                            <td><?php echo $row['lastname'],", ",$row['firstname']," ",$row['middlename'];?></td>
                            <td><?php echo $row['batch_grad'];?></td>
                            <td><?php echo $row['course'];?></td>
                            <td><?php echo $row['status'];?></td>
                        <?php }?>
                        </tr>
                    </tbody>
                </table>
                <div class="text-center">
                    <input type="button" value="Print" onclick="window.print();" class="btn btn-primary" id="print-btn">
                    
                </div>

                <center>
                    <?php $referer = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);
    
    if (!empty($referer)) {
        
        echo '<button id="backbutt"><a href="'. $referer .'" title="Return to the previous page">Go back</a></button>';
        
    } else {
        
        echo '<button><a href="javascript:history.go(-1)" title="Return to the previous page">Go back</a></button>';
        
    }
?>
</center>
            </div>
        </div>
    </div>

</body>
</html>