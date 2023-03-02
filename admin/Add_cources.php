<?php
session_start();
if( $_SESSION['roleId']!=1){
  header("Location: http://localhost/classes/logout.php");
}
else{
?>
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
<title> cources</title>
</head>
<body>
<div style=" background-color: gray; padding-bottom:10px; padding-top: 10px;padding-left: 10px;" >
<button bgcolor="#FFFFFF" colspan="2" align="center">
   <a href="Add_cources1.php?action=add&id=">[Add Courses]</a></button>
   <button bgcolor="#FFFFFF" colspan="2" align="center">
   <a href="admin.php">[Back]</a></button>
</div>
   <br>
   <br>
<?php
$moviesql = "SELECT * FROM  cources";
$result = mysqli_query($conn,$moviesql)
or die("Invalid query: " . mysqli_error($conn));
    

while ($row = mysqli_fetch_array($result)) {
     
?>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
  margin-bottom: 20px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
  height: 200px;
}
.delete{
  width:320px; 
}
</style>
<div class="column">
    <div class="card">
      <h3><?php   echo $row['name'];?></h3>
      <p><?php   echo $row['discription'];?></p>
      <p style="font-weight:bold;"> Fees :<?php   echo $row['price'];?></p>
    </div>
<button class="delete" bgcolor="#FFFFFF">
<a href="Add_cources.php?id=<?php
echo $row['id']?>">[DELETE]</a>
</button>
  </div>
<?php
}
if(isset($_GET['id'])){
    $id=  $_GET['id'];
  $query="DELETE FROM cources WHERE id=".$id.";";
  $queryr=mysqli_query($conn,$query);
  if($queryr){
    echo "record deleted";
  }else{
    echo "error record not deleted";
  }
    
 }
?>




</body>
</html>
<?php
}
?>