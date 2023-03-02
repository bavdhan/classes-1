<?php
require('conn.php');
session_start();
?>
<!doctype html>
<head>
</head>

<body>
    <button> <a href="home.php">[Back]</a></button>

    <style>
        .login-form{
           margin-left: 40%;
           margin-top: 30px; 
        }
        .form{
            background-color: #5DADE2;
            border:3px;
           margin-left: 30%;
           margin-right: 30%;
           padding-right: 8%;
           padding-bottom: 2%;
           box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

        }
        </style>
    <main class="main">
        <!-- Login Admin -->
        <form class="form" action="" method="POST">
             
            <div class="login-form">
                <!-- logo-login -->
                <div class="logo-login">
                    <a href="index.php"><img src="assets/img/logo/loder.png" alt=""></a>
                </div>
                <h2>Login Here :</h2>
                <div class="form-input">
                    <label for="name">Email :</label>
                    <input  type="email" name="emailId" placeholder="Email">
                </div>
                <br>
                <div class="form-input">
                    <label for="name">Password :</label>
                    <input type="password" name="password" placeholder="Password">
                </div>
                <br>
                <div class="form-input pt-30">
                    <input type="submit" name="submit" value="login">
                </div>
                
                
                <br>
                <button><a href="regestration.php" class="registration">Registration</a></button>
            </div>
        </form>
        <!-- /end login form -->
    </main>
    <?php

if(isset($_POST['submit'])){
    $email=$_POST['emailId'];
    $psd=$_POST['password'];
   //x $query1="SELECT logintable.name,logintable.emailId,roles.name FROM logintable INNER JOIN roles ON logintable.roleId=roles.id;";

     $query="SELECT * FROM logintable WHERE emailId ='".$email."' AND password='".$psd."';";
     $data = mysqli_query($conn,$query);
     $data1 = mysqli_fetch_assoc($data);
     $total = mysqli_num_rows($data);
     if($total == 1){
        $_SESSION['emailId']=$data1['name'];
        $_SESSION['id']=$data1['id'];
       

        $roleId = $data1['roleId'];
        $_SESSION['roleId']=$roleId;
         if($roleId==1){
            header("Location: admin/admin.php");
         }
         elseif($roleId==2){
             header("Location: teacher/teacher.php");
         }
         else{
            header("Location: student/index.php");
         }
     } else{
        echo"login failed";
     }  
}
?>


   
    
    </body>
</html>
