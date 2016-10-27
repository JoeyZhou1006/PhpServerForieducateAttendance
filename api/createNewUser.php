<?php

//not it can add a new user to the user database, but the thing is the photo and database now is just a simple data
require_once '../includes/DbOperation.php';
//creating response array
$response = array();

if($_SERVER['REQUEST_METHOD']=='POST'){

    //getting values
    $Name = $_POST['name'];
    $Photo = $_POST['Photo'];
    $Db = $_POST['Databse'];

    //including the db operation file
    require_once '../includes/DbOperation.php';

    $db = new DbOperation();

    //inserting values 
    if($db->createNewUser($Name,$Photo,$Db)){
        $response['error']=false;
        $response['message']='Team added successfully';
    }else{

        $response['error']=true;
        $response['message']='Could not add team';
    }

}else{
    $response['error']=true;
    $response['message']='You are not authorized';
}
echo json_encode($response);