<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
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

include "connection.php"; // Using database connection file here

$records = mysqli_query($conn,"select Username,HoTen,email,SDT from User"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['Username']; ?></td>
    <td><?php echo $data['HoTen']; ?></td>
    <td><?php echo $data['email']; ?></td> 
    <td><?php echo $data['SDT']; ?></td>    
    <td><a href="details.php?Username=<?php echo $data['Username']; ?>">Details</a></td>
  </tr>	
<?php
}
?>
</table>

</body>
</html>