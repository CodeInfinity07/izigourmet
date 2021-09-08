<?php 
require 'db.php';
header('Content-type: text/json');
$data = json_decode(file_get_contents('php://input'), true);
$sel = $conn->query("SELECT * FROM setting" );
$myarray = array();
$row = $sel->fetch_assoc();

    $result['facebook'] = $row['facebook'];
    $result['instagram'] =$row['instagram'] ;
    $result['youtube'] = $row['youtube'];
	$result['whatsapp'] = $row['whatsapp'];
  
    $myarray[] = $result;

$returnArr = array("data"=>$myarray,"ResponseCode"=>"200","Result"=>"true","ResponseMsg"=>"Sorry Something Went Wrong!");
echo json_encode($returnArr['data']);
?>