<!DOCTYPE html>
<html>
	<head>
		<title>Thong tin sinh vien</title>
	</head>
	<body>
	<h1>Danh sach sinh vien</h1>
<a href="add.php">Them</a>
<a href="edit.php">Sua</a>
<a href="delete.php">Xoa</a>
<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Username</th><th>Name</th><th>Email</th><th>SDT</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

$servername = "localhost";
$username = "root";
$password = "leebee1611";
$dbname = "SinhVien";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT Username,HoTen,Email,SDT FROM User");
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
?>
	</body>
</html>
