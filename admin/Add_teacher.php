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
   
   <button> <a href="admin.php">[Back]</a></button>

<!-- Register -->

<main class="login-body">
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
            <h2> Teacher Registration Here :</h2>

            <div class="form-input">
                <label for="name">Full name :</label>
                <input  type="text" name="name" placeholder="Full name">
            </div>
            <br>
            <div class="form-input">
                <label for="name">Email Address :</label>
                <input type="email" name="email" placeholder="Email Address">
            </div>
            <br>
            <div class="form-input">
                <label for="name">Password :</label>
                <input type="password" name="password" placeholder="Password">
            </div>
            <br>
            <div class="form-input">
                <label for="name">Confirm Password :</label>
                <input type="password" name="confirm-password" placeholder="Confirm Password">
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
    $query = "SELECT * FROM logintable WHERE emailId = '" . $_POST['email'] . "';";
    $run = mysqli_query($conn, $query);
    $data = mysqli_fetch_array($run);
    if ($data !== NULL && count($data) > 0) {
        echo "<p> <font color=green>email id already registerd</font> </p>";
        
    } else {
        $studInsert = "INSERT INTO logintable (name, emailId, password,roleId) VALUES";
        $studInsert .= "('" . $_POST['name'] . "', '" . $_POST['email'] . "', '" . $_POST['password'] . "',2);";
        mysqli_query($conn, $studInsert);
        echo "<p> <font color=green>registered</font> </p>";
    }
}
?>
            <div class="form-input pt-0">
                <input type="submit" name="submit" value="Add Teacher">
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