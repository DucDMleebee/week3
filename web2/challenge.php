<!DOCTYPE html>
<html>
<body>

<form action="uploadchallenge.php" method="post" enctype="multipart/form-data">
  Chon file de tao challenge:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload File" name="submit">
</form>
<?php
$hintErr = "";
$hint = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["hint"])) {
    $hintErr = "Hints are required";
  } else {
    $hint = test_input($_POST["hint"]);
    //
    if (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
      $usernameErr = "Only letters and numbers allowed";
    }
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<p><span class="error">* khong duoc de trong</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Hints: <input type="text" name="hint" value="">
  <span class="error">* <?php echo $hintErr;?></span>
  <br><br>
  <input type="submit" name="hintsubmit" value="Submit">
</form>
</body>
</html>
