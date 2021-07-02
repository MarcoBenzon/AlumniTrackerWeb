<?php

$dbDetails = array(
	'host' 		=>'localhost',
	'user' 		=>'root',
	'password' 	=> 'root',
	'db' 		=> 'alumnitracker'
);

$tables 	= 'alumni';
$primaryKey = 'id';

$columns = array(
	array('db' => 'studnum', 	'dt' => 0),
	array('db' => 'firstname', 	'dt' => 1),
	array('db' => 'lastname', 	'dt' => 2),
	array('db' => 'middlename', 'dt' => 3),
	array('db' => 'batch_grad', 'dt' => 4),
	array('db' => 'course', 	'dt' => 5),
	array(

		'db' => 'status', 	
		'dt' => 6, 'formatter' => function($d, $row) {
			return($d == 'Employed')?'Employed':'Unemployed';
		}

	)
);

require ('ssp.class.php');

echo json_encode(
	SSP::simple( $_GET, $dbDetails, $tables, $primaryKey, $columns )
);

?>