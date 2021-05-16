<html>
<body>
<?php
$servername = "localhost";
$username = "kali";
$password = "kali";
$dbname = "class";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT hints from challenge ORDER BY chalID DESC LIMIT 1";
mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "hints: " . $row["hints"];
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>
<?php
if (isset($_POST["btn_submit"])) {
$answer = $_POST["answer"];
		if ($answer == "") {
			echo "Answer is empty!";
		}else{
			$myfile = fopen("challenge/$answer.txt", "r") or die("<br>Wrong answer");
			echo "<br>Correct<br>";
			echo fread($myfile,filesize("challenge/$answer.txt"));
			fclose($myfile);
		}
}
?>
<form method="POST" action="answer.php">
	    	<table>
	    		<tr>
	    			<td>Dap an</td>
	    			<td><input type="text" name="answer" size="30"></td>
	    		</tr>
			<tr>
	    			<td colspan="2" align="center"> <input name="btn_submit" type="submit" value="Tra loi"></td>
	    		</tr>
		</table>
</form>
</body>
</html>