<?php
session_start();
if(isset($_GET['vichod'])){
    session_destroy();
    header('Location: index.php');
}


$errname = $errpas = $errAll = '';
if(isset($_GET['emptyAll'])){
    $errAll = 'Сатрхо холи мебошанд'; 
}
elseif(isset($_GET['emptyname'])){
    $errname = 'Номро холи мебошад';
}
elseif(isset($_GET['emptypas'])){
    $errpas = 'Пароль холи мебошад';
}
if(isset($_GET['notvalidate'])){
    $errAll = 'Ном ё рамз нодуруст мебошад'; 
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Даромад</title>
</head>
<body>
    <div class='back'>
        <div class='login-box'>
    <h1>Даромад</h1>
    <div class='logcheck'>  </div>
<form action="check_form.php" method="post">
<div class='logcheck'> <?php echo $errAll; ?>  </div>
<div class='textbox'>Ном ё E-mail: <input type="text" name='name' placeholder="Enter name" value=""></div><span><?php echo $errname; ?> </span>
<div class='textbox'>Пароль:<input type="password" name='pas' placeholder="Password"></div><span><?php echo  $errpas;  ?> </span>
<input type="submit" name="btn2" class='btn' value='LOGIN'>
</form>
</div>
</div>
</body>
</html>



<style>

body{
    background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
    font-family: sans-serif;
    /* background: url('https://www.elsetge.cat/myimg/f/37-370605_ten-advantages-of-wallpaper-soothing-for-eyes-and.jpg');
    background-repeat: no-repeat;
    background-size: cover; */
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
    background: black;
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