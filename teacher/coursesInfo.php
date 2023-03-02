
 
<?php
session_start();
if( $_SESSION['roleId']!=2){
  header("Location: http://localhost/classes/logout.php");
}
else{
  ?>
  <button> <a href="admin.php">[Back]</a></button>
  <?php
$servername = "localhost";
$username = "root";
$password ="";
$conn=new mysqli($servername,$username,$password);
if($conn->connect_error){
   die("connection error :" .$conn->connect_error);
} 
mysqli_select_db($conn,'login');


$query="SELECT cources.name,cources.discription,cources.price, student_courses.cources_id FROM cources INNER JOIN student_courses ON student_courses.cources_id = cources.id AND student_courses.logintable_id='" . $_GET['id'] . "';";
$result = mysqli_query($conn,$query)
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
     height:200px;
   }
   </style>
   <div class="column">
       <div class="card">
         <h3><?php   echo $row['name'];?></h3>
         <p><?php   echo $row['discription'];?></p>
         <p><?php   echo $row['price'];?></p>
       </div>
   </div>
       <?php
}
   }   ?>



