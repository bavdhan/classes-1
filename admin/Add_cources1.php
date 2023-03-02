<?php
session_start();
if( $_SESSION['roleId']!=1){
  header("Location: http://localhost/classes/logout.php");
}
else{
?>
<!doctype html>
<head>
   
</head>
<body>
<button> <a href="Add_cources.php">[Back]</a></button>
<!-- Register -->

<main class="login-body" >
    <!-- Login Admin -->
    <style>
        .login-form{
           margin-left: 25%;
           margin-top: 30px; 
        }
        .form-default{
            background-color: #5DADE2;
            border:3px;
           margin-left: 30%;
           margin-right: 30%;
           padding-bottom: 2%;
           box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

        }
        </style>
    <form class="form-default" action="" method="POST">
        
        <div class="login-form">
            <!-- logo-login -->
            <div class="logo-login">
                <a href="index.php"><img src="assets/img/logo/loder.png" alt=""></a>
            </div>
            <h2> Add Cources here:</h2>

            <div class="form-input">
                <label for="name">Course name :</label>
                <input  type="text" name="name" placeholder="course name">
            </div>
            <br>
            <div class="form-input">
                <label for="name">Discription :</label>
                <input type="text" name="discription" placeholder="courses Discription">
            </div>
            <br>
            <div class="form-input">
                <label for="name">Course Fees :</label>
                <input type="number" name="price" placeholder="courses Fees">
            </div>
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

            if (isset($_POST['submit'])) {
    $query = "SELECT * FROM cources WHERE name = '" . $_POST['name'] . "';";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($run);
    if ($data !== NULL && count($data) > 0) {
        echo "<p> <font color=green>this cource id already added</font> </p>";
       
    } else {
        $studInsert = "INSERT INTO cources (name, price,discription) VALUES";
        $studInsert .= "('" . $_POST['name'] . "', '" . $_POST['price'] . "','" . $_POST['discription'] . "');";
        mysqli_query($conn,$studInsert);
        echo "<p> <font color=green>added</font> </p>";
    }
}
?>
            <div class="form-input pt-0">
                <input type="submit" name="submit" value="Add Cource">
            </div>
            <!-- Forget Password -->
        </div>
    </form>
    <!-- /end login form -->
</main>
  </body>
</html>
<?php
$conn->close();
}
?>