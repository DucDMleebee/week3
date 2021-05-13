<!DOCTYPE HTML>  
<html>
<head>
<title>Teacher Registration</title>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$usernameErr = $passwordErr = $confirmErr = "";
$username = $password = $confirm = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
    //
    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
      $usernameErr = "Only letters and numbers allowed";
    }
  }

  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    //
  }
  if (empty($_POST["confirm"])) {
    $confirmErr = "Please confirm your password";
  } else {
    $password = test_input($_POST["password"]);
    //
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
		require_once("connection.php");
		if (isset($_POST["submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$username = $_POST["username"];
  			$password = $_POST["password"];
 			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($username == "" || $password == "") {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
  			}
			  else if ($password !== $confirm) {
				   echo "Password not matched";
			}
			  else{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from teacher where Username='$username'";
					$kt=mysqli_query($conn, $sql);

					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO teacher(
	    					Username,
	    					password,
	    					) VALUES (
	    					'$username',
	    					'$password',
						)";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);
				   		echo "Chúc mừng bạn đã đăng ký thành công";
					}
									    
					
			  }
	}
	?>
<h2>Dang ky tai khoan giao vien</h2>
<p><span class="error">* khong duoc de trong</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="username" value="">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="password" name="password" value="">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  Confirm Password: <input type="password" name="confirm" value="">
  <span class="error">* <?php echo $confirmErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
<input type="button" onclick="location.href='index.php';" value="Trang chu" />
</form>
</body>
</html>
