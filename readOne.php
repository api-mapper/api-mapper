<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
/*header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');*/

include_once '../config/Database.php';
include_once '../models/Schools.php';

//set up database
$database = new Database();
$db = $database->connect();


//set up school object
$school = new Schools($db);


//get query param
if ($school->digitalAddress = isset($_GET['digitalAddress']) ? $_GET['digitalAddress'] : die()){
	//call on readOne method
	$school->readOne();

//response
	$school_arr = array(
		'schoolName' => $school->schoolName,
		'lat' => $school->lat,
		'lng' => $school->lng
	);

//json
	print_r(json_encode($school_arr));
}else {
	$http_response_header(400);
	echo json_encode(
		array(
			'Status' => 'Not Found',
			'Message' => 'No such school'
		));
}
