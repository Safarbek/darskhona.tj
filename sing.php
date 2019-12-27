<?php




$loginempty = $empname = $emplname = $empemail = $emppas = '';
if(isset($_GET['emptylogin'])){
    $loginempty = " Серокы пустие";
}
elseif (isset($_GET['empname'])) {
    $empname = "Имя пустая";
}
elseif (isset($_GET['emplname'])) {
    $emplname = "Фамиля  пустая";
}
elseif (isset($_GET['empemail'])) {
    $empemail = "Email пустая";
}
elseif (isset($_GET['emppas'])) {
    $emppas= "Пароль пустая";
}



// Check for warning charckter
if(isset($_GET['errname'])){
    $empname = "Имя должен быть больше 3 бук и без сифр ";
}
elseif(isset($_GET['errlname'])){
    $emplname = "Фамиля должен быть больше 3 бук и без сифр";
}
elseif(isset($_GET['erremail'])){
    $empemail= "Emai  неправилний";
}
elseif(isset($_GET['errpas'])){
    $emppas = "Пароль хато мебошад";
}
elseif(isset($_GET['emailExist'])){
    $empemail= "Шумо обуна наметавонед бо ин E-mail ";
}
elseif(isset($_GET['passwordExist'])){
    $emppas= "Пароль интихоб шудааст ";
}





?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Регистрация</title>
</head>
<body>
    <div class='back'>
        <div class='login-box'>
    <h1>Регистрация</h1>
    <div class='logcheck'> <?php echo $loginempty; ?>  </div>
<form action="check_form.php" method="post">
<div class='textbox'>Ном:              <input type="text" name='name' placeholder="Enter name" value="<?php   ?>"></div><span><?php echo $empname; ?> </span>
<div class='textbox'>Фамиля:         <input type="text" name='lname' placeholder='Enter lname'></div><span><?php echo $emplname; ?> </span>
<div class='textbox'>Email:          <input type="email" name='email' placeholder="Enter email"></div><span><?php echo $empemail; ?> </span>
<div class='textbox'>Проль:<input type="password" name='pas' placeholder="Enter password"></div><span><?php echo $emppas; ?> </span>
<?php if(!isset($_GET['test'])) { ?>
<input type="submit" name="btn" class='btn' value='LOGIN'>
<?php } ?>
</form>
</div>
</div>
</body>
</html>


<style>

body{
  
    background: linear-gradient(to right, #000, #000);
    /* background: url('https://www.elsetge.cat/myimg/f/37-370605_ten-advantages-of-wallpaper-soothing-for-eyes-and.jpg');
    background-repeat: no-repeat;
    background-size: cover; */

    font-family: sans-serif;
}


.back{
    width: 500px;
    background: blue;
}

.login-box{
    width: 280px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: rgb(255, 255, 255);
   
}

h1{
    color: rgb(16, 201, 170);
    text-shadow: white 2px  2px 2px;
}
.login-box h1{
    float: left;
    font-size: 40px;
    border-bottom: solid rgba(7, 255, 69, 0.966) 5px;
    margin-bottom: 10px;
    padding: 7px 0;
}

.textbox{
    width: 90%;
    overflow: hidden;
    font-size: 20px;
    margin: 5px 0px;
    padding: 5px 0;
    border-bottom: 2px solid #4ce651;
    
}

input[type="search"] {
    color: red;
}

.textbox input{
outline: none;
border: 0 solid;
background: none;
width:100%;
padding: 5px;
outline: none;
font-size: 18px;
color:  rgb(255, 255, 255);;
font-weight: bold;
}
input:hover{
    color: white;
}
.btn{
    width: 90%;
    background: black;
    padding: 5px;
    margin-top: 15px;
    color: white;
    font-size: 20px;
    border: solid 2px rgb(29, 236, 91);
    cursor: pointer;
}
.btn:hover{
    background: rgb(14, 15, 14);
    color: white;
}








/* Кор БО СТАЙЛИ PHP */

.logcheck{
    width: 90%;
    overflow: hidden;
    font-size: 20px;
    margin: 5px 0px;
    color: red;
    
}

span{
    color: red;
    background: rgba(196, 207, 255, 0.432);
   
    
}
</style>