<?php

//fetch.php

include('database_connection.php');

if(isset($_POST["batch_grad"]))
{
 $query = "
 SELECT * FROM alumni 
 WHERE batch_grad = '".$_POST["batch_grad"]."' 
 ORDER BY id ASC
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'course'   => $row["course"],
   'batch_grad'  => intval($row["batch_grad"])
  );
 }
 echo json_encode($output);
}

?>