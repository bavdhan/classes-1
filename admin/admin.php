
<?php
session_start();
if( $_SESSION['roleId']!=1){
  header("Location: http://localhost/classes/logout.php");
}
else{
  echo "Welcome ".$_SESSION['emailId']."";
?>
<!DOCTYPE html>
<head></head>
<body>
  <div style=" background-color: gray; padding-bottom:10px; padding-top: 10px;padding-left: 10px;" >
<button><a href="Add_teacher.php" target="_blank">Add teacher</a></button>
<button><a href="Add_cources.php" target="_blank">Add cources</a></button>
<button><a href="http://localhost/classes/logout.php" target="_blank">Logout</a></button>
</div>
</div>
</body>
</html>
<br>
<br>
<?php
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
  <div>
<table border="0" width="600" cellspacing="1" cellpadding="3"
bgcolor="#353535" align="center"  style="font-weight:bold;" >
<tr>
<tr>
<td bgcolor=" #92a8d1" width="40%">
 Teacher Name
</td>
<td bgcolor=" #92a8d1" width="40%">
Teacher EmailId
</td>
<td bgcolor=" #92a8d1" width="20%" >
</td>
</tr>
</td>
</tr>
<?php
$moviesql = "SELECT * FROM  logintable WHERE roleId=2";
$result = mysqli_query($conn,$moviesql)
or die("Invalid query: " . mysqli_error($conn));
    

while ($row = mysqli_fetch_array($result)) {
     
?>
<tr>
<td bgcolor="#FFFFFF" width="25%">
<?php   echo $row['name']; ?>
</td>

<td bgcolor="#FFFFFF" width="25%">
<?php   echo $row['emailId']; ?>
</td>
<td bgcolor="#FFFFFF" width="50%" >
<a  href="admin.php?id=<?php
echo $row['id']?>">[DELETE]</a>
</td>
</tr>
<?php
}
if(isset($_GET['id'])){
    $id=  $_GET['id'];
  $query="DELETE FROM logintable WHERE id=".$id.";";
  $queryr=mysqli_query($conn,$query);
  if($queryr){
    echo "record deleted";
  }else{
    echo "error record not deleted";
  }
    
 }
?>

</table>
</div>
</body>
</html>
<?php 
}
?>