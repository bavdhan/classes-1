<?php
//SELECT logintable.name,logintable.emailId,roles.name FROM logintable INNER JOIN roles ON logintable.roleId=roles.id;
 $servername = "localhost";
 $username = "root";
 $password ="";

 $conn=new mysqli($servername,$username,$password);
 if($conn->connect_error){
    die("connection error :" .$conn->connect_error);
 }
 
 mysqli_select_db($conn,'login');
 
?>