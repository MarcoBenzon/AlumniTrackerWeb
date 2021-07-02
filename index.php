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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 

  

<!-- DataTables CSS library -->
<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- DataTables JS library -->
<script type="text/javascript" src="DataTables/datatables.min.js"></script>


<script type="text/javascript">
    $(document).ready(function(){
        $('#alumniList').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "getData.php"
        });

    });
</script>


</head>
<body>
    
    <!-- Header Area Start -->
    <header>
        <div class="left_area">
            <h3>UPANG <span>ALUMNI TRACKER</span></h3>
        </div>
        <div class="rigth_area">
            <a href="logout.php" class="logout_btn">Logout</a>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Sidebar Area Start -->
    <div class="sidebar">
        <content>
            <center>
                <img src="images/logo.png" class="profile_image" alt="admin">
            </center>
        </content>
        <a href="index.php" class="active"><i class="fas fa-desktop"></i><span>Dashboard</span></a>
        <a href="alumni.php"><i class="fas fa-cogs"></i><span>Alumni</span></a>
        <a href="announcements.php"><i class="fas fa-table"></i><span>Announcements</span></a>
        <a href="events.php"><i class="fas fa-th"></i><span>Events</span></a>
        <a href="job.php"><i class="fas fa-circle"></i><span>Job Offers</span></a>
        <a href="editpages.php"><i class="fas fa-sliders-h"></i><span>Edit Pages</span></a>
    <a href="add_admin.php"><i class="fas fa-user-shield"></i><span>Admin</span></a>
    <a href="admin_profile.php"><i class="fas fa-user-alt"></i><span>Admin Profile</span></a>
    </div>
    <!-- Sidebar Area End -->

    <!-- Content Area Start -->
    <div class="content">
        <content>
            <div class="dashboard">
                
            </div>
            <div class="main1">
    <div class="containers">
      <div class="row justify-content-center" style="margin: 40px; margin-top: 15px; border-radius: 10px; padding: 10px;">
        <div class="col-12">


        <div class="main__cards">
            
            <div class="card">
            <i class="fas fa-users" style="font-size:48px;color: #5EB6FF"></i>
            <div class="card_inner">
              <p class="text-primary-p">Total Employed Graduates</p>

              <?php include 'db_connect.php';
                $query=mysqli_query($openconnection,"SELECT * FROM alumni WHERE status='Employed'");
                $num=mysqli_num_rows($query);
                echo "<span class='font-bold text-title'>",$num,"</span>";
          ?>
            </div>
            <a href="totalemployed.php">>>>Click Here to See List</a>
          </div>

            <div class="card">
              <i class="fas fa-users" style="font-size:48px;color: #61C589"></i>
              <div class="card_inner">
                <p class="text-primary-p">Total Unemployed Graduates</p>

                <?php include 'db_connect.php';
                $query=mysqli_query($openconnection,"SELECT * FROM alumni WHERE status='Unemployed'");
                $num=mysqli_num_rows($query);
                echo "<span >",$num,"</span>";
          ?>
              </div>
              <a href="totalunemployed.php">>>>Click Here to See List</a>
            </div>

          <div class="card">
            <i class="fas fa-users" style="font-size:48px; color: #ffcc7b"></i>
            <div class="card_inner">
              <p class="text-primary-p">Total Number of Graduates</p>
              <?php include 'db_connect.php';
                $query=mysqli_query($openconnection,"SELECT * FROM alumni");
                $num=mysqli_num_rows($query);
                echo "<span class='font-bold text-title'>",$num,"</span>";
          ?>
            </div>
            <a href="totalalumni.php">>>>Click Here to See List</a>
          </div>

     
        </div>

        <div class="container">
            <table id="alumniList" class="display" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Student Number</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Lastname</th>
                        <th>Batch</th>
                        <th>Course</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Student Number</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Lastname</th>
                        <th>Batch</th>
                        <th>Course</th>
                        <th>Status</th>
                    </tr>
                </tfoot>
            </table>
        </div>

        </content>
    </div>


</body>
</html>