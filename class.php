<?php 
class Sing{

   private $servername = "localhost";
   private $username = "root";
   private $password = "safarmal4ik";
   public $db_name = '';
   
   public function _construct(){

   }

   public function Mysql_connect($db_name){
     $this->servername;
     $this->username;
     $this->password;
     $this->db_name = $db_name;
     $sql = mysqli_connect($this->servername,$this->username, $this->password,$this->db_name = $db_name );
     if(!$sql){
         die("Error to ") . mysqli_error_connect();
     } 
     else{
         echo "Connected";
     }

   }


}






?>