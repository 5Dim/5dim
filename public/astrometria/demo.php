<?php
// $myArr = array("John", "Mary", "Peter", "Sally");

// $myJSON = json_encode($myArr);

// echo $myJSON;

// Read JSON file
$json = file_get_contents('data/astrometriaa1.json');
$jsondata = array();
//Decode JSON
$json_data = json_encode($json, JSON_FORCE_OBJECT);

//Print data
echo $json_data;
?>