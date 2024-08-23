<?php
         
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



   <ul class="nav navbar-nav navbar-right">  

<div class="dropdown">

<li class="dropdown-toggle"  data-toggle="dropdown" data-toggle="tooltip" title="Profile"><img src="logo.ico" alt="Avtar" class="avtar"></li>
  <ul class="dropdown-menu">
  
    <li class="divider"></li>
     <li><a href="logout.php"  style="color:Tomato;" data-toggle="tooltip" title="Log Out"> Log Out</a></li> 
  </ul>
   
</div>
  </div>
<hr>
 
<ul class="nav nav-tabs  nav-justified">
  <li data-toggle="tooltip" title="Milk records"><a href="admindashboard.php" style="color:black;">Admin Dashboard</a></li>
  <li class="active"  data-toggle="tooltip" title="Feed records"><a href="fetch-users.php" style="color:black;">Users</a></li>
 <li  data-toggle="tooltip" title="Notes"><a href="fetch-milk-data.php" style="color:black;">Milk Data</a></li>
 <li data-toggle="tooltip" title="Payment receipts"><a href="fetch-feed.php" style="color:black;">Feed Data</a></li>
</ul>

</nav>

<div class="container" style="margin-top:150px">
  


    


<div class="query">
    <h1>All Users</h1>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    
  <?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "milk";
  
  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
    $sql = "SELECT * FROM usertable";

    $result1 = mysqli_query($conn, $sql);
    
    if (!$result1) {
        die("Error: " . mysqli_error($conn));
    }
    if (mysqli_num_rows($result1) > 0) {
  
          
while($row = mysqli_fetch_assoc($result1)) {
?>
    <tr>
      <th scope="row"><?php echo  $row["id"]; ?></th>
      <td><?php echo  $row["fname"]; ?></td>
      <td><?php echo  $row["lname"]; ?></td>
      <td><?php echo  $row["email"]; ?></td>
    </tr>
    
<?php  
    }
} else {
echo "0 results";
}
?>
</div>
  </tbody>
</table>
    </div>
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

<style>
    *{
        margin:0;
        padding:0;
    }
    .main{
        width:100%;
        height:100%;
        display:flex;
         
    }
    .card{
        margin:10px;
        width:50%;
        border:1px solid black;
        text-align:center;
    }
    .query{
        width:100%;
    }
    .table{
        width:50%;
    }
</style>

</body>
</html>