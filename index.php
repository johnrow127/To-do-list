<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/index.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>PRIMEnote | The best way to take notes.</title>
</head>

<body>
<header>
<img src="img/logo.png" width="150px" class="logoicon"><div class="logo">PRIMEnote.</div>
<div class="content">
<div class="qoute">The best way to take note<br>your to do list.</div>
<br>
<div class="qoute1">Millions of people rely on PRIMEnote to get things done.</div>
<br>
<br>
<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="signupbtn " data-toggle="modal" data-target="#myModal">Click Here to Signup</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Log in!</h4>
        </div>
        <div class="modal-body">
        <form action='#' method='post'>
          Username:<input type='text' name='username' required><br>
          First Name:<input type='text' name='fname' required><br>
          Middle Name:<input type='text' name='minit' required><br>
          Last Name:<input type='text' name='lname' required><br>
          Password:<input type='password' name='password' required><br>
        <input type='submit' name='SignUp' value='Login'>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<br>
<div class="loginform">
<div class="loginlabel">Login to your note.</div>

<form action='#' method='post'>
<div class="usericon">&#128231;<input type="text" placeholder="| Username" name='user' required></div>
<br>
<div class="passicon">&#128272;<input type="password" placeholder="| Password" name='pass' required></div>
<br>
<input type='submit' class="loginbtn" name='Submit' value='Login'>
</form>
</div>
</div>
</header>

<?php
include 'connectDB.php';
if (isset($_POST["Submit"])) {
   $username=$_POST['user'];
   $password=$_POST['pass'];
  $query = "SELECT * FROM `Account` WHERE username='$username' and password='".$password."' ";
  $result = mysqli_query($con,$query);
  $rows =   mysqli_num_rows($result);
   if($rows==1){    
   session_start();
   
   $row1 = mysqli_fetch_assoc($result);
   $_SESSION['id']=$row1['Account_id'];
   $_SESSION['username'] = $username;
   $_SESSION['login'] = true;
   header("Location:main/Todolist.php");
    }else{
   echo "Invalid Username or Password";
   }
}

if (isset($_POST["SignUp"])) {
   $username=$_POST['username'];
   $password=$_POST['password'];
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $minit=$_POST['minit'];
mysqli_query($con,"INSERT INTO `account`(`Username`, `Password`, `Fname`, `Minit`, `Lname`) VALUES ('$username','$password','$fname','$lname','$minit')");
}
?>
</body>
</html>
