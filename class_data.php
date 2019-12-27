<?php

class All{

    public $table;
    public  $servername = "localhost";
    private $username = "root";
    private $password = "safarmal4ik";
    private $dbname = "";


    public function Mysql($servername, $username, $password, $dbname){
      return $conn = mysqli_connect($this->$servername = $servername , $this->$username = $username, $this->$password=$password , $this->$dbname = $dbname); 
    }

    public function mysql_connect($db){
        return $this->Mysql("localhost", "root" ,"safarmal4ik", "$db");
    }

   
 
  }
  



?>
