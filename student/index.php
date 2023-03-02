<?php

session_start();
if( $_SESSION['roleId']!=3){
  header("Location: http://localhost/classes/logout.php");
}
else{
//SELECT logintable.name,logintable.emailId,roles.name FROM logintable INNER JOIN roles ON logintable.roleId=roles.id;
$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("connection error :" . $conn->connect_error);
}

mysqli_select_db($conn, 'login');

//$_SESSION['email']=$user;

//  if($user === true){

//  }
//  else{
//     header("Location: login.php");
//  }

echo "Welcome " . $_SESSION['emailId'];


// $conn->close();
?>
<br>
<br>
<div style=" background-color: gray; padding-bottom:10px; padding-top: 10px;padding-left: 10px;">
<button><a href="http://localhost/classes/logout.php">LOGOUT</a></button>
<button><a href="my_courses.php">My Courses</a></button>
</div>
<br>
<br>
<br>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
  die("connection error :" . $conn->connect_error);
}
mysqli_select_db($conn, 'login');
?>
<html>

<head>
  <title> cources</title>
</head>

<body>
  <?php
  $moviesql = "SELECT * FROM  cources";
  $result = mysqli_query($conn, $moviesql)
    or die("Invalid query: " . mysqli_error($conn));
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

    .row {
      margin: 0 -5px;
    }

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
    .fees-row{
      font-weight:bold;
    }
    .submit{
      width:320px;
    }
  </style>
  <!-- <form action="" method="POST"> -->
    <?php
    while ($row = mysqli_fetch_array($result)) {
      ?>
      <div class="column">
        <div class="card">
          <h3>
            <?php echo $row['name']; ?>
          </h3>
          <p>
            <?php echo $row['discription']; ?>
          </p>
          <p class="fees-row">
           Fees : <?php echo $row['price']; ?>
          </p>
        </div>
        <div class="form-input pt-0">
          <a  href="?id=<?php echo $row['id'];?>">
          <input class="submit" type="button" name="purches" value="purchase courses">
          </a>
        </div>
      </div>
    <?php } ?>
  <!-- </form> -->
  <?php

  if (isset($_GET['id'])) {
    $query = "INSERT INTO student_courses (logintable_id, cources_id) VALUES ('" . $_SESSION['id'] . "', '" . $_GET['id'] . "');";
    
    if ($result = mysqli_query($conn, $query)) {
      echo "Purches successful";
    } else {
      echo ("connection error :" . mysqli_error($conn));
    }
  }

  ?>
 <style>
  .second{
    clear:both;
    text-align:center;
    font-weight:bold;
}
 </style>
<div class="second ">
  <br>
  <div style="background-color: #92a8d1;">
  <br>
    <h1>Get Free Career Counselling & Industry Knowledge:</h1>
    <p>We take great pride in providing this service and are elated with our students performing wonders for their respective companies and organizations. For Free Career Counselling and Industry Knowledge: Call Now – +91-9579299359</p>
    <br><br>
  </div>

</body>

</html>
<?php
}
?>