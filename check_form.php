<?php
const  br = "<br>";
// Баоои бо даст ворид кардани сахифа натавонанд
if(!isset($_POST['btn'])){
    header('Location: sing.php');
    exit();
}

//Тафтиши form  бо дурусти

$name =   $lname = $pas = $email ='';
if(isset($_POST['btn'])){
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $email= $_POST['email'];
    $pas = $_POST['pas'];
    // Sangidani hamahi strokho choli boshad
if(empty($name) && empty($lname) && empty($email) && empty($pas)){
    header('Location: sing.php?emptylogin= erfr');
    exit();

}
//Yaktai sangidan ba chotiri chatoro guftan
    else{
        //Name chack
        if(empty($name)){
            header('Location: sing.php?empname=empty');
            exit();
        }
        else{
            if(preg_match("/^[a-zA-Z]*$/",$name) and strlen($name) >=4 ){

            }
            else{
                header("Location: sing.php?errname=errorname");
                exit();
            }

        }

        //Check Last name
       if(empty($lname)){
            header('Location: sing.php?emplname=empty');
            exit();
        }
        else{
            if(preg_match("/^[a-zA-Z]*$/",$lname) and strlen($lname)>=4){

            }
            else{
                header("Location: sing.php?errlname=errorlastname");
                exit();
            }

        }

        //Check the email
        if(empty($email)){
            header('Location: sing.php?empemail=emptyemail'); 
            exit();
        }
        else{
            if(filter_var($email, FILTER_VALIDATE_EMAIL) == true){

            }
            else{
                header("Location: sing.php?erremail=erroremail");

            }

        }

        if(empty($pas)){
            header('Location: sing.php?emppas=emptypassword'); 
            exit();
        }
        else{
            
        }

        if(!(empty($name) && empty($lname) && empty($email) && empty($pas))){
        
            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['lname'] = $lname;
            $_SESSION['email'] = $email;
            $_SESSION['pas'] = $pas;

            $cook_name = $name;
            $cook_pas = $pas;
            setcookie($cook_name, $cook_pas, time() + (86400 * 30), "/");

            header("Location: index.php");
        }
        


    }

}

echo $name.br;
echo $lname.br;
echo $email.br;
echo $pas.br;
?>