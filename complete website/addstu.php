<?php
   session_start();
   if(!isset($_SESSION['teacher']) || !$_SESSION['teacher']){
      header('Location: login.php');
   }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Welcome to Finance Portal</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assests/css/style.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>
   <div class="signup-form">
    <form action="addstu_a.php" method="post" enctype="multipart/form-data">
		<h2>Add a student</h2>
      <div class="form-group">
         <input type="text" class="form-control" name="username" placeholder="Username" required="required">
		</div>   
      <div class="form-group">
         <input type="text" class="form-control" name="fullname" placeholder="Full name" required="required">
		</div>      	
      <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
      </div>
      <div class="form-group">
         <input type="text" class="form-control" name="phonenum" placeholder="Phone Number" required="required">
		</div>
		<div class="form-group">
            <input type="password" class="form-control" name="pass" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="cpass" placeholder="Confirm Password" required="required">
        </div>
        <p style="color: red"> <?php if(isset($_GET[status]) && $_GET[status]=="false") echo "Wrong password confirmed!"; ?> </p>       
		<div class="form-group">
            <button type="submit" name="save" class="btn btn-success btn-lg btn-block">Add now</button>
        </div>
    </form>
	
</div>
</body>
</html>
</body>
