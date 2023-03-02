
<?php
  $servername = "localhost";
  $username = "root";
  $password ="";
 
  $conn=new mysqli($servername,$username,$password);
  if($conn->connect_error){
     die("connection error :" .$conn->connect_error);
  }
  
  mysqli_select_db($conn,'login');
if(isset($_GET['id'])){
    $id=  $_GET['id'];
  $query="DELETE FROM logintable WHERE id=".$_GET['id'].";";
  if(mysqli_query($conn,$query)){
    echo "record deleted";
  }else{
    echo "error record not deleted";
  }   
 }

 header("Location: http://localhost/classes/teacher/teacher.php");
?>