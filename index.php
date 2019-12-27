<?php session_start(); 



?>

<!DOCTYPE html>
<html lang="en">
<head> 

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
    <title>ДарсХона</title>
</head>
<body>
<?php
include('class_data.php');
$data = new All();
$conn = $data->mysql_connect('test');
$notSession = '';
if(isset($_POST['btn'])){
    $comment = htmlspecialchars($_POST['comment']);
    if(isset($_SESSION['name']) and isset($_SESSION['pas'])){
        if(!empty($comment)){
            $name = $_SESSION['name'];
            $pas = $_SESSION['pas'];
            $selec = "SELECT *FROM registor WHERE name='$name' AND pas='$pas'";
            $res = mysqli_query($conn, $selec);
            $res = mysqli_fetch_assoc($res);
            $id = $res['id'];
            $sql = "INSERT INTO comment (idComment, comment) VALUES('$id' ,  '$comment' )";
            if(mysqli_query($conn, $sql)){
                header('Location: index.php'); 
            }
            }
            else{
               
              $notSession = "Шумо ягон чиз нанавистаед!";
         }
        }  
        else{
        $notSession = "Барои фикр гузори шумо бояд ба сайт обуна шавед";
    }
    }
    
  
 $edit = '';
  if(isset($_GET['edit'])){
     $ed = $_GET['edit'];
     $sel = "SELECT *FROM comment WHERE id='$ed'";
     $res = mysqli_query($conn, $sel);
     $a = mysqli_fetch_assoc($res);
     $edit =  $a['comment'];
    if(isset($_POST['btn2'])){
        $com = $_POST['comment'];
        if(!empty($com)){
             $update = "UPDATE comment  SET comment='$com'  WHERE id='$ed'  ";
             mysqli_query($conn, $update);
             header('Location: index.php');
        }
    }
 
}
elseif(isset($_GET['delete'])){
    $del = $_GET['delete'];
    $delete = "DELETE FROM comment WHERE id='$del'";
    if(mysqli_query($conn, $delete)){
        header("Location: index.php");
    }
}



?>

    <header>
        <?php if(isset($_SESSION['name'])): ?> 
        <a href="#" class='safar'><?php echo $_SESSION['name']; endif; ?> </a>
        <?php if(!isset($_SESSION['name'])){ ?> 
        <a href="#" class='safar'>Safarbek</a>
        <?php } ?>
        <div class='manu-tog'></div>
        <nav>
            <ul>
               
                <li><a href="" class='activ' >Сахифаи асли</a> </li>
                <li><a href="../servis/lesson.php">Дарсхо</a> </li>
                <li><a href="#"> Дар бораи ман</a> </li>
                <li> <a href="#">Таммос</a> </li>

                <?php if (!isset($_SESSION['name'])): ?>
                    <li> <a href="sing.php" class='sing' name='sing'> Регистрация</a> </li>
                   <li> <a href="vurud.php"> Даромад</a> </li>
                  <?php endif; ?>
                


                 <?php if (isset($_SESSION['name'])){ ?>
                 <li> <a href="vurud.php?vichod=asds" class='sing'> Баромад</a> </li>
                 <?php  }  ?>
                 
                 
                 
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

<!-- About page -->


<div class='about'>


<?php if(!isset($_GET['php'])){ ?>
<div class='about2'><h1>Хуш омадед ба сайти ДарсХона </h1> 
    <p>Ин сайт сайти мухофизат шуда мебошад  дар ин сайт шумо метвонед бисёр дарсхои чолибро биомузед аз чумла <a href="#">Mатематика</a> <a href="#">забони Англиси</a> ва <a href="#">забони Русси</a>
        ва гайрахо.   </p>
        <p>Ва хаминтавр мо барои шумо <a href="#">Тестхо онлайни</a> худ санчро сохтаем ки метавонед дониши  худро бисанчед ва чавобхои дуруст ё нодуруст буданашро бифахмед. Ин сайт
        хело хуб таррохи шудааст барои касонеки мехоханд дар дунёи илму дониш зиндаги кунанд бо мо хамрох бошед то харруз аз 
        дарсхои нав ва чолиби мо бо хабар бимонед. </p>
        <p>Дар ин сайт барои истифода бурдани баъзе дарсхо шумо бояд ба сайти мо <a href="#">обуна шавед</a> ва хаминтавр барои шумо муфид мебошад ва барои мо.</p>
        
</div>

<div ><h1>Аз мо дарёб</h1></div>
<div class='darmo'>
         <div class='dar'>
            <div class='kub' style=' margin-top: 0;'><a href='../servis/lesson.php'><h4>Дарсохо</h4>Дарсхои моро зиёдтар одамоне , ки хохиши дохил шудан донишгохо доранд истифода мекунан.....</a></div>
            <div class='kub'style=' margin-top: 0;'><a href='../'><h4>Таммос бо ман</h4>Таммос бо ман шумо метавонед тахо бо WhatsaApp Viber ва дигар шабакахо тамосс гиред.....</a></div>
            <div class='kub 'style=' margin-top: 0;'><a href='../servis/math/math.php'><h4>Математика онлайн</h4>Дар ин сахифа мо математика онлайн сохтаем базе маисолхои мушкилро бо тарзи кораш ба шумо.....</a></div>
            <div class='kub'style=' margin-top: 0;'><a href='../'><h4>Дар бораи ман</h4> Ман Умаров Сафарбек рохбари сайти ДарсХона Истикомат кунандаи нохияи ......</a></div>
            <div class='kub'style=' margin-top: 0;'><a href='../servis/test-online.php'><h4>Тестхои онлайн</h4>Тестхои омода кардаи мо барои пешравии шумо ....</a></div>
            <div class='kub 'style=' margin-top: 0;'><a href='../'><h4>Обуна шудан</h4>Обуна шудан дар сайти мо барои харух бо  хабар будани аз навигарихои мо</a></div>
       </div>                   
           
</div> 
<div class='comm'>
<!-- Барои коментария---------------  ------------------------------------------------------------------- -->




<span style='margin: 10px 20px;'>Фикратро дар бораи  сайт гузоp!</span>
<form action="" method='post'>
<input class='input' type="text" name='comment' placeholder='Фикри худатонро нависед барои мо' value="<?php echo  $edit ?>" >
<?php if(!isset($_GET['edit'])){ ?>
<input class = 'btn'type="submit" name ='btn' value="Отправить">
<?php } 
else{  ?>
<input class = 'btn' type="submit" name ='btn2' value="Тагири комент">
<?php }  ?>
</form>
<span style='margin: 10px 20px; color: red;'> <?php echo $notSession; ?></span>

 <div class='coment' >
 
 <?php 
 
 
 $sel = "SELECT m.id,  m.idComment, c.name, c.lname, m.comment  FROM registor c 
 INNER JOIN comment m WHERE c.id = m.idComment ORDER BY m.id DESC";
 $res = mysqli_query($conn, $sel);
 if(mysqli_num_rows($res) > 0){
    $id = '';
     if(isset($_SESSION['name']) and isset($_SESSION['pas'])){
         $pas = $_SESSION['pas'];
         $name = $_SESSION['name'];
         $query = "SELECT *FROM registor WHERE pas='$pas' AND  name='$name'";
         $res1 = mysqli_query($conn, $query);
         $a = mysqli_fetch_assoc($res1);
         $id=$a['id'];
 }

     while($row = mysqli_fetch_array($res) ){
         if($id == $row['idComment']){
      echo "<div class='com'>
      <div class='fam' style='padding: 5px 10px'><p><img src='img/avatar.jpg'>".$row['name'].' '.$row['lname'].
      '</p>'.$row['comment'].
      "</div>
      <div class='fora'>
      <a class='del' href='index.php?delete=".$row['id']."'>Удалить</a> <br><br>
      <a class='edit' href='index.php?edit=".$row['id']."'>Тағир</a>
      </div>
      </div>";
         }
         elseif(isset($_SESSION['name']) and $_SESSION['name'] == 'Admin' and $_SESSION['pas']=='adminsafar'){
              
            echo "<div class='com'>
            <div class='fam' style='padding: 5px 10px'><p><img src='../home/img/avatar.jpg'>".$row['name'].' '.$row['lname'].
            '</p>'.$row['comment'].
            "</div>
            <div class='fora'>
            <a class='del' href='index.php?delete=".$row['id']."'>Удалить</a> <br><br>
            <a class='edit' href='index.php?edit=".$row['id']."'>Тағир</a>
            </div>
            </div>";
        
    }
         else{
            echo "<div class='comwith'><p><img src='img/avatar.jpg'>".$row['name'].' '.$row['lname'].
            '</p> <div>'.$row['comment'].'</div></div>';
         }
            
        }
      }
?>

<?php }
else{
    echo '<h1>Сахифа ёфта нашуд!</h1>';
} ?>
</div>
 </div >

<div class='clear' ></div>
</div>
</body>
</html>


<style>
/* Первая страница */ 
.coment{
    margin: 0px 20px 20px 0;
    max-width: 600px;
    color: black;
    text-align: left;
    padding: 10px;
    
}
.coment img{
   width: 30px;
   height: 30px;
   margin-bottom: -8px;
   margin-right: 5px;
   
}
.coment p{
 text-align: left;
  margin: 0;
  padding: 0;
  padding: 5px 10px;
  color: rgb(13, 244, 252);
}
.coment .com {
 display: flex;
 background: black;
 margin: 10px;
 padding: 10px;
 border-radius: 7px;
 color: white;
}
.coment .com .fam {
   min-width: 430px;
}
.coment .com a {
 text-decoration: none;
 border-radius:  4px;
   color: white;
    background: rgba(0, 0, 0, 0.719);
   border: #fff solid 1px;
}
.coment .com a:hover {
    background: rgba(31, 29, 36, 0.603);;
    color: red;
    transition: 0.6s;
    border: red solid 1px;
}
.coment .com .fora{
    margin-top: 10px;
    margin-left: 10px;
   
}
.coment .com .fora .edit {
 text-decoration: none;
padding: 5px 20px
}
.coment .com .fora .del {
 text-decoration: none;
padding: 5px 9px;

}
.coment .comwith{
 background: black;
margin: 10px;
border-radius: 7px;
color: white;


padding: 0 0 10px 10px;
}

.coment .comwith div{
padding: 5px 10px;

}
@media (max-width: 630px){
    .coment .com .fam {
   min-width: auto;
} 
}

body{
    
    font-family: 'Poppins', sans-serif;
    background: 	#F8F8FF;        
    background-repeat: no-repeat;
    -moz-background-size: 100%; /* Firefox 3.6+ */
    -webkit-background-size: 100%; /* Safari 3.1+ и Chrome 4.0+ */
    -o-background-size: 100%; /* Opera 9.6+ */
    background-size: cover;
}
header{
    position: sticky ;
    max-width: 1200px;
    margin: 20px auto;
    padding: 10px;
    background: linear-gradient(to right, rgba(180, 134, 241, 0.733)      ,rgb(214, 204, 204));
    box-sizing: border-box;
    border-radius: 5px;
    box-shadow: 0px 2px 5px blue;
}

.safar{
    color: black;
    height: 60px;
    font-size:  40px;
    line-height: 60px;
    padding: 0 20px;
    text-align: center;
    box-sizing: border-box;
    float: left;
    font-weight: 600;
    text-decoration: none;

}
nav{
    float: right;
}

.clear{
    clear: both;
}
nav ul{
    margin: 0;
    padding: 0;
    display: flex;

}
nav ul li{
    list-style: none;
}

.sing{
    margin-left:  45px;
    display: block;
}

nav ul li a{
    text-decoration: none ;
    display: block;
    margin: 10px 0;
    padding:  10px 15px;
    color: #262626;
}



nav ul li a:hover,
nav ul li a.activ{
    background: #069370;
    color: #fff;
    transition: 0.5s;

}

@media (max-width: 1200px){
    header{
        margin: 20px;
    }
}


@media (max-width: 868px){
    body{
        
    }
    header{
        margin: 0;
    }
    .manu-tog{
      display: block;
      width: 40px;
      height: 40px;
      margin: 10px;
      background: lightblue;
      float: right;
      cursor: pointer;
      text-align: center;
      font-size: 30px;
      color: #000

    }
    .manu-tog:before{
       content: '\f0c9';
       font-family: fontAwesome;
       line-height: 40px;
    }
    .manu-tog.activ:before{
        content: '\f00d';
        
     }
    nav{
        display: none;
    }
    nav.activ{
        display: block;
        width: 100%;
    }
    nav.activ ul{
        display: block;
    }
    nav.activ ul{
        display: block;
    }
    .sing{
        
        margin: 0;
    }

 

    }

/* Дар бораи сайт*/
.about{
   margin: 30px auto;
   max-width: 1200px;
   max-height: auto;
   background: white;
   padding: 50px 0;
   border-radius: 5px;
   font-family:  -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
   font-size: 20px;
   box-shadow: 0px 2px 3px 2px black; 
   color: black;
   text-align: center;
}
.about2{
    padding: 0 40px;
}
p{
    text-align:center;
   font-size: 22px;
   letter-spacing: 2px; 
   padding: 8px 30px;
   color: rgb(40, 58, 78);
   line-height: 1.7;

}
p a{
    text-decoration: none;
    color: blue;
}
p a:hover{
    color: red;
    transition: 0.5s;
    
}
h1{
    color: rgba(31, 1, 23, 0.89);
    text-align: center;
}
.darmo{
    text-align: center; 
   display: flex;
   float: left;
    
}
.dar{
    
    text-align: center; 
    float: left;
    margin: 20px 20px;
}
.kub{
    margin-left: 100px;
    margin-top: 30px;
    margin-bottom: 40px;
    padding: 30px;
    float: left;
    border: solid 1px black;
    border-radius: 5px;
    font-size: 19px; 
    max-width: 200px;
    background: #fff;
    box-shadow: black 2px 1px 2px 0px;
}
.dar .kub a{
    text-decoration: none;
    color: black; 
}
.dar .kub a h4{
    color: rgb(94, 15, 80);;
}

.kub:hover{
    padding: 35px;
    transition: 0.7s;
    background: lightblue;
}
.comm{
    text-align: left;
}

@media (max-width: 900px){
    .about{
      margin: 0;
      box-shadow: none;
      
    }
    .about2{
        font-size: 20px;
    }

    p{
        font-size: 20px;
    }
    h1{
       font-size: 25px; 
    }
    .darmo{
        display: grid;
        text-align: center;
    }
    .dar{}

    .kub{
        margin-left: 20px;
    }
    .kub:hover{
    padding: 35px;
    transition: 0.7s;
    background: lightblue;
}
}

.input{
   width: 500px;
    padding: 10px;
    margin: 20px;
    margin-left: 15px;
    margin-right: 5px;
    border: 1.5px solid rgba(162, 162, 170, 0.795);;
    border-radius: 30px;
    outline: none;
    font-size: 20px;
 
}
.btn{
    padding:10px;
    border: 1.5px solid black;
    background: rgba(0, 0, 0, 0.774);
    color: white;
    border-radius: 30px;
    font-size: 20px;
}
.btn:hover{
    background: black;
    color: red;
    transition: 0.5s;
}


.input:hover{
    background: black;
    border: 1.5px solid red;
    color: white;
    transition: 0.5s;
}


@media (max-width: 900px){
    .input{
     width: 200px;
    color: black;
    padding: 5px;
    margin: 10px;
    margin-left: 15px;
    margin-right: 5px;
    border: 1.5px solid black;
    border-radius: 30px;
    outline: none;
    font-size: 20px;
    background: rgba(213, 213, 216, 0.616);
}
.btn{
    padding: 5px 0;
    border: 1.5px solid black;
    background: rgba(0, 0, 0, 0.774);
    color: white;
    border-radius: 30px;
    font-size: 18px;
}

span{
    font-size: 18px;
}
.coment .test span{
    font-size: 18px;
}

}

</style>









