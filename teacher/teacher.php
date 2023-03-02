<?php
session_start();
if( $_SESSION['roleId']!=2){
  header("Location: http://localhost/classes/logout.php");
}
else{
echo "Welcome ".$_SESSION['emailId']."";
 $servername = "localhost";
 $username = "root";
 $password ="";
 $conn=new mysqli($servername,$username,$password);
 if($conn->connect_error){
    die("connection error :" .$conn->connect_error);
 } 
 mysqli_select_db($conn,'login');
?>
<html>
<head> 
<title> database</title>
<style type="text/css">
TD{color:#353535;font-family:verdana}
TH{color:#FFFFFF;font-family:verdana;background-color:#336699}
</style>
</head>
<body>
  <br>
  <br>
<button><a href="http://localhost/classes/logout.php">LOGOUT</a></button>

<table border="0" width="600" cellspacing="1" cellpadding="3"
bgcolor="#353535" align="center" style="font-weight:bold;">
<tr>
<td bgcolor=" #92a8d1" width="30%">
 Student Name
</td>

<td bgcolor=" #92a8d1" width="30%">
EMAIL-ID
</td>
<td bgcolor=" #92a8d1" width="50%" >    
</td>
</tr>
<?php
$moviesql = "SELECT * FROM  logintable WHERE roleId=3";
$result = mysqli_query($conn,$moviesql)
or die("Invalid query: " . mysqli_error($conn));
    
while ($row = mysqli_fetch_array($result)) {
     
?>
<tr>
<td bgcolor="#FFFFFF" width="30%">
<?php   echo $row['name']; ?>
</td>

<td bgcolor="#FFFFFF" width="30%">
<?php   echo $row['emailId']; ?>
</td>
<td bgcolor="#FFFFFF" width="40%" >
<a  href="deleteStudent.php?id=<?php
echo $row['id']?>">[DELETE]</a>
<a  href="coursesInfo.php?id=<?php
echo $row['id']?>">[COURSES]</a>
</td>

</tr>
<?php
}
if(isset($_GET['id'])){
    $id=  $_GET['id'];
  $query="DELETE FROM logintable WHERE id=".$_GET['id'].";";
  if(mysqli_query($conn,$query)){
    echo "record deleted";
  }else{
    echo "error record not deleted";
  }   
 }
?>
</table>
</body>
</html>
<?php
}
?>