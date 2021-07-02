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
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/dashboard.css">
  <link rel="stylesheet" type="text/css" href="stylecv.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 

  

<!-- DataTables CSS library -->
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- DataTables JS library -->
<script type="text/javascript" src="DataTables/datatables.min.js"></script>


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
    
    <!-- Header Area Start -->
    <header>
        
    </header>
    <!-- Header Area End -->

    <!-- Content Area Start -->
    <div class="contents">
        <content>

        <div class="container">
            <h2 style="text-align: center; margin-top: 10%; font-family: sans-serif;"><b>UNEMPLOYED ALUMNI</b></h2>
            <table id="alumniList" class="display" style="width: 100%; margin-top: 100px">
                <thead>
                    <tr>
                        <th width="18%">Student Number</th>
                        <th width="30%">Student Name</th>
                        <th width="10%">Batch</th>
                        <th width="25%">Course Graduated</th>
                        <th width="10%">Status</th>
                    </tr>
                </thead>
                
            </table>
            <?php
                $view_query=mysqli_query($openconnection,"SELECT * FROM alumni WHERE status = 'Employed'  ORDER BY batch_grad DESC");
                    while ($row=mysqli_fetch_assoc($view_query)) {
                ?>
                <hr>
                <table>
                    <tr class="announce">
                        <td width="18%"><?php echo $row['studnum'];?></td>
                        <td width="30%" ><?php echo $row['lastname'],", ",$row['firstname']," ",$row['middlename'];?></td>
                        <td width="10%"><?php echo $row['batch_grad'];?></td>
                        <td width="25%"><?php echo $row['course'];?></td>
                        <td width="10%"><?php echo $row['status'];?></td>
                    </tr>
                </table>
                <?php }?>
        </div>

        </content>
    </div>

<div>
<!-- <button id="printbutt" onclick="printContent('print');" class="btn btn-info" style="border-radius: 0; outline: none;"><i class="fa fa-print" aria-hidden="true"></i> Print</button> -->

    <?php $referer = filter_var($_SERVER['HTTP_REFERER'], FILTER_VALIDATE_URL);
    
    if (!empty($referer)) {
        
        echo '<button id="backbutt"><a href="'. $referer .'" title="Return to the previous page">Go back</a></button>';
        
    } else {
        
        echo '<button><a href="javascript:history.go(-1)" title="Return to the previous page">Go back</a></button>';
        
    }
?>
</div>

<script>
    //Print button in profile
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;

  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>

</body>
</html>