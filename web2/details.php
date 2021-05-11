<!DOCTYPE html>
<html>
<head>
  <title>Display details records from Database</title>
</head>
<body>

<h2>Employee Details</h2>

<table border="2">
  <tr>
    <td>Username</td>
    <td>Full Name</td>
    <td>Email</td>
    <td>SDT</td>
  </tr>

<?php
$message = "";
  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }
include "connection.php"; // Using database connection file here

$Username = $_GET['Username'];

$records = mysqli_query($conn,"select Username,HoTen,email,SDT from User WHERE Username = '$Username'"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['Username']; ?></td>
    <td><?php echo $data['HoTen']; ?></td>
    <td><?php echo $data['email']; ?></td> 
    <td><?php echo $data['SDT']; ?></td>    
  </tr>	
<?php
}
?>
</table>
<form method="post" action=""> 
  Message: <textarea name="message" rows="5" cols="40"><?php echo $message;?></textarea>
  <br><br>
<input type="submit" name="submit" value="Submit">
</form>
<?php
echo "<h2>Your Message:</h2>";
echo $message;?>
</body>
</html>