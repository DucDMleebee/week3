<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$usernameErr = $passwordErr = $nameErr = $emailErr = $numberErr = "";
$username = $password = $name = $email = $number = "";

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

  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["number"])) {
    $numberErr = "Phone number is required";
  } else {
    $number = test_input($_POST["number"]);
    //
    if (!preg_match("/^[0-9]*$/",$number)) {
      $numberErr = "Only numbers allowed";
    }
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
 			$name = $_POST["name"];
  			$email = $_POST["email"];
			$number = $_POST["number"];
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($username == "" || $password == "" || $name == "" || $email == "" || $number == "") {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
  			}else{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from User where Username='$username'";
					$kt=mysqli_query($conn, $sql);

					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO User(
	    					Username,
	    					password,
	    					HoTen,
						email,
						SDT
	    					) VALUES (
	    					'$username',
	    					'$password',
						'$name',
	    					'$email',
						'$number'
	    					)";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($conn,$sql);
				   		echo "chúc mừng bạn đã đăng ký thành công";
					}
									    
					
			  }
	}
	?>
<h2>Them thong tin sinh vien</h2>
<p><span class="error">* khong duoc de trong</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="username" value="">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="password" name="password" value="">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  Name: <input type="text" name="name" value="">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Number: <input type="text" name="number" value="">
  <span class="error">* <?php echo $numberErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">
<input type="button" onclick="location.href='index.php';" value="Trang chu" />
</form>
</body>
</html>
