<?php \
session_start();
include('class_data.php');
$data = new All();
$conn = $data->mysql_connect('test');



$notSession = '';
if(isset($_POST['btn'])){
    $comment = htmlspecialchars($_POST['comment']);
    if(isset($_SESSION['name']) and isset($_SESSION['pas'])){
        if(!empty($comment)){
            $pas = $_SESSION['pas'];
            $name = $_SESSION['name'];
            $query = "SELECT *FROM registor WHERE pas='$pas' AND  name='$name'";
            $res = mysqli_query($conn, $query);
            $a = mysqli_fetch_assoc($res);
            $id=$a['id'];
            $inser = "INSERT INTO comment(idComment, comment) VALUES('$id', '$comment')";
           if(!mysqli_query($conn, $inser)){
               echo mysqli_error($conn);
           }
           else{
               header("Location: testcoment.php");
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
    

?>

<span style='margin: 10px 20px;'>Фикратро дар бораи  сайт гузоp!</span>
<form action="#" method='post'>
<input class='input' type="text" name='comment' placeholder='Фикри худатонро нависед барои мо'>
<input class = 'btn'type="submit" name ='btn' value="Отправить">
</form>
<span style='margin: 10px 20px; color: red;'> <?php echo $notSession.'<br>'; ?></span>


<?php 


$sel = "SELECT m.idComment, c.name, c.lname, m.comment  FROM registor c 
INNER JOIN comment m WHERE c.id = m.idComment";
$res = mysqli_query($conn, $sel);
if(mysqli_num_rows($res) > 0){
   
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
     echo $row['name'].' '.$row['lname'].'<br>'.$row['comment']."<a href=''>Delete</a><br>";
        }
        else{
            echo $row['name'].' '.$row['lname'].'<br>'.$row['comment']."<br>"   ;
        }
           
       }
     }




?>


<style>

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
.coment{
    margin: 20px;
    max-width: 500px;
    color: black;
    text-align: left;
    padding: 10px;
}
.coment .test{
    padding: 15px;
    border: 0.4px black  solid;
    margin: 10px;
    background: rgba(217, 234, 245, 0.795);
    text-align: left;
    border-radius: 15px;
}
.coment .test .span{
    margin-bottom: 20px;
    margin-top: 20px;
    color: rgb(82, 14, 9); 
    font-size: 20px;
}
.coment .test  img{
    padding-right: 7px;
    width: 30px;
    height: 30px;
}
</style>