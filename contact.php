<?php
         if(! isset($_COOKIE["username"]))
           header("location:login-user.php");
session_start();

    if(isset($_POST["submit"])){
        // MySQL database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "milk";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name =$_POST["name"];
$email = $_POST["email"];
$msg = $_POST["msg"];

$sql = "INSERT INTO contact (name, email, msg) VALUES ('$name', '$email', '$msg')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Query Submited successfully');</script>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    }

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>
DairyDiary
</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="design.css">
  <link rel="shortcut icon" type="image/x-icon" href="logo.ico" />
</head>
<body>

<nav class="navbar navbar-custom navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="milk.php" data-toggle="tooltip" title="a.DairyDiary.com"><img src="logo2.png" alt="logo" height="50px" width="200px"></a>
    </div>

<form class="navbar-form navbar-left" action="">
  <div class="input-group input-custom" data-toggle="tooltip" title="Search for record">
    <input type="text" class="form-control" placeholder="Search ..." id="myInput">  
  </div>
</form>

   <ul class="nav navbar-nav navbar-right">  

<div class="dropdown">

<li class="dropdown-toggle"  data-toggle="dropdown" data-toggle="tooltip" title="Profile"><img src="logo.ico" alt="Avtar" class="avtar"></li>
  <ul class="dropdown-menu">
    <li><a href="profile.php">Profile</a></li>
    <li class="divider"></li>
     <li><a href="logout.php"  style="color:Tomato;" data-toggle="tooltip" title="Log Out"> Log Out</a></li> 
  </ul>
   
</div>
  </div>
<hr>
 
<ul class="nav nav-tabs  nav-justified">
  <li  data-toggle="tooltip" title="Milk records"><a href="milk.php" style="color:black;">Milk</a></li>
  <li  data-toggle="tooltip" title="Feed records"><a href="feed.php" style="color:black;">Feed</a></li>
 <li  data-toggle="tooltip" title="Notes"><a href="note.php" style="color:black;">Notes</a></li>
 <li data-toggle="tooltip" title="Payment receipts"><a href="Bill.php" style="color:black;"><span class="glyphicon glyphicon-usd"></span> Bill</a></li>
 <li class="active" data-toggle="tooltip" title="Payment receipts"><a href="contact.php" style="color:black;">Querys</a></li>
</ul>

</nav>

<form method='post' action=''>
<div class="container" style="margin-top:150px">
<form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Name</label>
    <input type="email" name="name" class="form-control" id="exampleFormControlInput1" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>
 
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Messsage</label>
    <textarea class="form-control" name="msg" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <input type="submit" name="submit" value="Submit" class="btn btn-success"/>
</form>
</div>



</tbody>
</table>
</div>



<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>





</body>
</html>