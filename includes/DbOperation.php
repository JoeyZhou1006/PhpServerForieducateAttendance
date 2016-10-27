<?php

class DbOperation
{
    private $conn;

    //Constructor
    function __construct()
    {
        require_once dirname(__FILE__) . '/Config.php';
        require_once dirname(__FILE__) . '/DbConnect.php';
        // opening db connection
        $db = new DbConnect();
        $this->conn = $db->connect();
    }

   // Function to create a new user
    public function createNewUser($name, $Photo, $Databse)
    {
        $stmt = $this->conn->prepare("INSERT INTO User(Name, Photo, Databse) values(?, ?, ?)");

        //because it is a new user, so the databse isn't created yet, should we create the new user
        //databse before the next line excute?
        $stmt->bind_param("sss", $name, $Photo, $Databse);
        $result = $stmt->execute();
        $stmt->close();
        if ($result) {
            echo "the inserting operation is completed";
            return true;
        } else {
            return false;
        }
    }

    //this method will return all the data from the user table
    public function getAllData(){
        $stmt = $this->conn->prepare("SELECT * FROM User");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    //this method will return all the data from the user table
    public function printUserData($result){
        $i=0;
        //$
        return $result;
    }


    // //this method will return the image by given name
    // public function getImageByName(){
    //     //define the sql syntax, and search the photo from sql database by a given username

    //     $person = "LiWang";
    //    // $stmt = $this->conn->prepare("SELECT Photo FROM " . $person );
    //      $stmt = $this->conn->prepare("SELECT Photo FROM User Where Name ==". $person . "");
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     return $result;


    //     // $stmt->execute();
    //     // $result = $stmt->get_result();
    //     // return $result;
    // }




}