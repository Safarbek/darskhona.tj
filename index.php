<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <link rel="stylesheet" type='text/css' href="styl.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <title>WebMaster</title>
</head>
<body>
    <header>
        <?php if(isset($_SESSION['name'])): ?> 
        <a href="#" class='safar'><?php echo $_SESSION['name']; endif; ?> </a>
        <?php if(!isset($_SESSION['name'])){ ?> 
        <a href="#" class='safar'>Safarbek</a>
        <?php } ?>
        <div class='manu-tog'></div>
        <nav>
            <ul>
               
                <li><a href="#" class='activ' >Home</a> </li>
                <li><a href="#"> Services</a> </li>
                <li><a href="#"> About</a> </li>
                <li> <a href="#"> Contact</a> </li>
                <li> <a href="sing.php" class='sing' name='sing'> Регистрация</a> </li>
                 <li> <a href="#"> Вуруд</a> </li>


                 <?php if (isset($_SESSION['name'])): ?>
                 <li> <a href="index.php?vichod=asds"> Баромад</a> </li>
                 <?php endif;
                 if(isset($_GET['vichod'])){
                    session_destroy();
                 }
                 
                 
                 ?>
            </ul>
        </nav>
          <div class='clear'></div>
    </header>



    <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous"></script>
<script type='text/javascript'>

//Навигатор бар барои приложения
$(document).ready(function(){
    $('.manu-tog').click(function(){
        $('.manu-tog').toggleClass('activ')
        $('nav').toggleClass('activ')

    })

})

</script>

<?php

// echo $_SESSION['name'] ;
// echo $_SESSION['lname'];
// echo $_SESSION['email'];
// echo $_SESSION['pas'];

?>


</body>
</html>











<style>




</style>