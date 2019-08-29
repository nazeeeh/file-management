<?php
	include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php

		if(isset($_GET['del']))
		{
			$householdNo = $_GET['del'];
			$sql = "DELETE FROM cache WHERE householdNo = '$householdNo'";
			$res = mysqli_query($database, $sql)
				or die("Failed to delete".mysqli_error());
				echo "<meta http-equiv='refresh' content='0; url=viewFile.php'>";

		}

	?>


</body>
</html>