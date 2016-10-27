<?php

//including the file dboperation
require_once '../includes/DbOperation.php';

//creating a response array to store data
$response = array();

//creating a key in the response array to insert values
//this key will store an array iteself
$response['teams'] = array();

//creating object of class DbOperation
$db = new DbOperation();

//getting the teams using the function we created
$teams = $db->getAllData();

//looping through all the teams.
while($team = $teams->fetch_assoc()){
    //creating a temporary array
    $temp = array();

    //inserting the team in the temporary array
    $temp['id'] = $team['ID'];
    $temp['Name']=$team['Name'];
    //$temp['member']=$team['member'];

    //inserting the temporary array inside response
    array_push($response['teams'],$temp);
}

//displaying the array in json format
echo json_encode($response);
?>