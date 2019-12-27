<?php

const  br = "<br>";
// Баоpи бо даст ворид кардани сахифа натавонанд
if(!isset($_POST['btn']) and !isset($_POST['btn2'])){
    header("Location: sing.php");
    exit();
}
//Тафтиши form  бо дурусти
include('class_data.php');
$name =   $lname = $pas = $email ='';
if(isset($_POST['btn'])){
    $name = trim($_POST['name']);
    $lname = trim($_POST['lname']);
    $email= trim($_POST['email']);
    $pas = trim($_POST['pas']);

// CHECK FOR EMPTY POST
    if(empty($name) && empty($lname) && empty($email)  && empty($pas)){
        header('Location: sing.php?emptylogin= erfr');
        exit();  
    }
    elseif(empty($name)){
      header('Location: sing.php?empname=empty');
        exit();
    }
    elseif(empty($lname)){
        header('Location: sing.php?emplname=empty');
        exit();
    }
    elseif(empty($email)){
        header('Location: sing.php?empemail=emptyemail'); 
        exit();
    }
    elseif(empty($pas)){
        header('Location: sing.php?emppas=emptypassword'); 
        exit();
    }

    // CHECK FOR INVALIDE  POST
    else{
        if(!(preg_match( '/[\p{Cyrillic}]/u',$name) or preg_match( '/^[a-zA-Z-0-9]*$/',$name) and strlen($name) > 4 )){
            header("Location: sing.php?errname=errorname");
        }
        elseif(!(preg_match('/[\p{Cyrillic}]/u',$lname) or preg_match( '/^[a-zA-Z-0-9]*$/', $lname) and strlen($lname)>=4)){
        header("Location: sing.php?errlname=errorlastname");
        exit();
    }
        elseif(!(filter_var($email, FILTER_VALIDATE_EMAIL) == true)){
            header("Location: sing.php?erremail=erroremail");
        }
        elseif(!(strlen($pas) > 4)){
            header("Location: sing.php?errpas=errorpas");
        }
    // SESSION START AND INSERT INTO DATABASE OUR REGISTER

    else{
        $db = new All();
        $conn = $db->mysql_connect('test');
        if($email){
            $exis = "SELECT *FROM registor WHERE email='$email'";
            $result =  mysqli_query($conn, $exis);
            $exist = mysqli_num_rows($result);
            if($exist == 1){
               header('Location: sing.php?emailExist=dontlogin');
               exit();
            }
            elseif($pas){
                $exis = "SELECT *FROM registor WHERE pas='$pas'";
            $result =  mysqli_query($conn, $exis);
            $exist = mysqli_num_rows($result);
            if($exist == 1){
               header('Location: sing.php?passwordExist=dontlogin');
               exit();
            }
            }
            
           
        }

        session_start();
        $_SESSION['name'] = $name;
        $_SESSION['lname'] = $lname;
        $_SESSION['email'] = $email;
        $_SESSION['pas'] = $pas; 
        
        // SET COOKIE
        $cook_name = $name;
        $cook_pas = $pas;
        setcookie($cook_name, $cook_pas, time() + (86400 * 30), "/");

        
        $sql = "INSERT INTO registor(name, lname, email, pas) VALUES ('$name', '$lname', '$email', '$pas')";
        $result = mysqli_query($conn, $sql);
        header('Location: index.php');
    }
 }
}


    //CHECK FOR LOGIN EXIST OR NOT
if(isset($_POST['btn2'])){
    $name = $_POST['name'];
    $pas = $_POST['pas'];
    if(empty($name) and empty($pas)){
        header('Location: vurud.php?emptyAll=emp');
        exit();
    }
    elseif(empty($name)){
        header('Location: vurud.php?emptyname=emp');
        exit();
    }
    elseif(empty($pas)){
        header('Location: vurud.php?emptypas=emp');
        exit();
    }

    else{

        $db = new All();
        $conn = $db->mysql_connect('test');
        $check = "SELECT *FROM registor WHERE (name='$name' OR email='$name') AND pas='$pas'";
       $check =  mysqli_query($conn, $check);
       $see = mysqli_num_rows($check);
        if($see == 1){
            while($row = mysqli_fetch_assoc($check)){
                session_start();
                $_SESSION['name'] = $row['name'];
                $_SESSION['lname'] =$row['lname'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['pas'] = $row['pas'];
                header('location: index.php');
            }
            echo  $_SESSION['name'] .  $_SESSION['lname'] .  $_SESSION['email'] .$_SESSION['pas'];
        }
        else{
            header("Location: vurud.php?notvalidate=namepas");
            
        }
      

    }
}
     

?>