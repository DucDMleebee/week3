<html>
<body>
<?php
if (isset($_POST["btn_submit"])) {
$answer = $_POST["answer"];
		if ($answer == "") {
			echo "Answer is empty!";
		}else{
			$myfile = fopen("challenge/$answer.txt", "r") or die("Wrong answer");
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