
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <?php
  if(!isset($_SESSION['unique_id'])){
   
  }
?>
      
     <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <!--<li><a href="sell2.php" >SELL</a></li> -->
            <?php
          
              $sql_get = mysqli_query($connection, "SELECT * FROM messages WHERE status=0 AND incoming_msg_id = '".$_SESSION['unique_id']."'");
              $count = mysqli_num_rows($sql_get);
            ?>
          


            <!-- Menu toggle button -->
          <!-- Messages: style can be found in dropdown.less-->
         
            <li class="dropdown messages-menu">
                    <a href="chat.php" class="dropdown-toggle" data-toggle="dropdown" id="notify-comet">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge badge-light" id="count" onchange="getData(this.value, 'displaydata')"><?php echo $count; ?></span>
                        <script type="text/javascript">
                          function getData(count){
                $.ajax({
                    url: 'loademployeedata.php?count='+count, 
                    success: function(html) {
                        var ajaxDisplay = document.getElementById(count);
                        ajaxDisplay.innerHTML = html;
                    }
                });
            }
                        </script>
                        <!-- <span class="label label-success" id="not-count">
                            
                        </span> -->
                    </a>

                    <ul class="dropdown-menu">
                         <?php
                          $sql_get1 = mysqli_query($connection, "SELECT * FROM messages WHERE status=0 AND incoming_msg_id = '".$_SESSION['unique_id']."'");
                          if (mysqli_num_rows($sql_get1)>0) {
                            while ($result=mysqli_fetch_assoc($sql_get1)) {
                              echo '<a class="dropdown-item text-primary" href="chat.php?user_id='.$result['outgoing_msg_id'].'&&msg_id='.$result['msg_id'].'">'.$result['receiver_name'].'</br>'.$result['msg'].'</a>';
                              // echo '<a class="dropdown-item text-primary href="chat.php?id='.$result.'">'.$result['msg'].'</a>';
                              echo '<div class="dropdown-divider"></div>';
                            }
                            
                          } else{
                              echo '<a class="dropdown-item text-danger font-weight-bold" href="#">Sorry! No messages</a>';
                          }
                        ?>
                        <a class="dropdown-item" href="#"></a>
                        <div class="dropdown-divider"></div>
                       <!--  <li class="header">You have echo "$incoming_msg_id" ?> messages</li> -->
                        
                            <div class="delay-notification">
                            <ul class="menu">
                                
                            </ul>
                            </div>
                            <?php
                          $sql_get3 = mysqli_query($connection, "SELECT * FROM register_user WHERE unique_id = '".$_SESSION['unique_id']."'");
                          if (mysqli_num_rows($sql_get3)>0) {
                            while ($resulttt=mysqli_fetch_assoc($sql_get3)) {
                              echo '<li class="footer"><a href="chat.php?user_id='.$resulttt['unique_id'].'">See All Messages</a></li>';
                            }
                            
                          } else{
                             
                          }
                        ?>

                       
                    </ul>
                </li>