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
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

.navbar {
  width: 100%;
  background-color: #555;
  overflow: auto;
}

.navbar a {
  float: left;
  padding: 12px;
  color: white;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background-color: #000;
}

.active {
  background-color: #04AA6D;
}

@media screen and (max-width: 500px) {
  .navbar a {
    float: none;
    display: block;
  }
}

.second{
    clear:both;
    text-align:center;
    font-weight:bold;
}
.enroll{
      width:315px;
    }
</style>
<body>

<div class="navbar">
  <a class="active" href="#"><i class="fa fa-fw fa-home"></i> Home</a> 
  <a href="contact.php"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
  <a href="login.php"><i class="fa fa-fw fa-user"></i> Login</a>
</div>
 <h1 style="text-align:center" >EXPLORE OUR COURSES</h1>
 <div>
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
.row {margin: 0 -5px;}
.row:after {
  content: "";
  display: table;
  clear: both;
}
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
  height:200px;
}

</style>
<div class="form">
<form action="" method="POST">
<div class="column">
    <div class="card" style="background-image: url('img.jpg.jpg');">
      <h3><?php echo $row['name'];?></h3>
      <p><?php echo $row['discription'];?></p>
      <p style="font-weight:bold;"> Fees :<?php echo $row['price'];?></p>
    </div> 
    <div class="form-input pt-0">
             <button class="enroll"> <a href="login.php">Enrollment Now</a></button>
            </div>
  </div>
  
</form>
</div>
<?php
}
?>
</div>

<div class="second ">
  <br>
  <div style="background-color: #92a8d1;">
  <br>
    <h1>Get Free Career Counselling & Industry Knowledge:</h1>
    <p>We take great pride in providing this service and are elated with our students performing wonders for their respective companies and organizations. For Free Career Counselling and Industry Knowledge: Call Now – +91-9579299359</p>
    <br><br>
  </div>

</div>
</body>
</html> 
