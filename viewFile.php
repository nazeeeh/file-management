<?php
include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>list of files</title>
	<!--<link rel="stylesheet" type="text/css" href="formUpload.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" >
	<style type="text/css">
		.srch
		{
			padding-left: 1000px;
		}

.nav-header
{
	background-color:#000;
}

.nav-header::after
{
	content: " ";
	clear: both;
	display: block;
	visibility: none;
}
.nav
{
	max-width: 1200px; 
	margin: 0 auto;	
	padding: 0;

}
.nav-nav
{
	float: right;
}
.my-logo
{
	float: left;
}


.nav-nav ul li
{
	display: inline-block;	 
}

.nav-nav ul li a
{
	padding: 5px 20px;
	text-decoration: none;
	color: #fff;
	line-height: 60px;
}

.nav-nav ul li a:hover
{
	color: #3e99ff;
}
	</style>
</head>
<body class="tic-tac">
	
	<header class="nav-header">
		<div class="nav">
			<img src="image/VNDC logo.png" alt="company_logo" width="200em" class="my-logo" />
			<nav class="nav-nav">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="login.html">Login</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<!-- Search Bar -->
	<div class="srch">
		<form name="form1" method="POST" class="navbar-form">
			<input type="text" class="form-control" name="search" placeholder="Search files..." required="" />
			<button style="background-color: #6db5b984" type="submit" name="submit" class="btn btn-default">
				<span class="glyphicon glyphicon-search"> </span>
			</button>	
			<span style="padding-left: 150px;"><button type="button" class="btn btn-default"><a href="formUpload.php" style="text-decoration: none;">Back</a></button></span>
		</form>

	</div>
	<h2>Saved files</h2>

	<?php
		if (isset($_POST['submit'])) {
			$que=mysqli_query($database, "SELECT * FROM cache where householdNo like '%$_POST[search]%'");
	if (mysqli_num_rows($que)==0) {
				echo "Sorry file not found, Try again.";
			}  
			else
			{
		echo "<table class='table table-bordered table-hover'>";
		echo "<tr style='background-color:#91a70e';>";
		//TABLE
		echo "<th>"; echo "Household Number"; echo "</th>";
		echo "<th>"; echo "Household Name"; echo "</th>";
		echo "<th>"; echo "Community Volunteer"; echo "</th>";
		echo "<th>"; echo "Community"; echo "</th>";
		echo "<th>"; echo "Location Id"; echo "</th>";
		echo "<th>"; echo "File Status"; echo "</th>";
		echo "<th>"; echo "Edit"; echo "</th>";
		echo "<th>"; echo "Delete"; echo "</th>";
	echo "</tr>";

		while($row=mysqli_fetch_assoc($que)){
			echo "<tr>";
			echo "<td>";echo $row['householdNo']; echo "</td>";
			echo "<td>";echo $row['householdName'] ;echo "</td>";
			echo "<td>";echo $row['communityVolunteer']; echo "</td>";
			echo "<td>";echo $row['community']; echo "</td>";
			echo "<td>";echo $row['locationId']; echo "</td>";
			echo "<td>";echo $row['radiobuttons']; echo "</td>";
			echo "<td>";echo "<a href='edit.php?edit=$row[householdNo]'>Edit</a>"; echo "</td>";
			echo "<td>";echo "<span id='a'><a href='delete.php?del=$row[householdNo]'>Delete</a></span>"; echo "</td>";
			echo "</tr>";
		}
		echo "</table>";
			}
		}
		/* if button is not pressed*/
		else
		{
			$res = mysqli_query($database, "SELECT * FROM `cache` ORDER BY `cache`.`householdNo` ASC");
		echo "<table class='table table-bordered table-hover'>";
		echo "<tr style='background-color:#91a70e';>";
		//TABLE
		echo "<th>"; echo "Household Number"; echo "</th>";
		echo "<th>"; echo "Household Name"; echo "</th>";
		echo "<th>"; echo "Community Volunteer"; echo "</th>";
		echo "<th>"; echo "Community"; echo "</th>";
		echo "<th>"; echo "Location Id"; echo "</th>";
		echo "<th>"; echo "File Status"; echo "</th>";
		echo "<th>"; echo "Edit"; echo "</th>";
		echo "<th>"; echo "Delete"; echo "</th>";
	echo "</tr>";

		while($row=mysqli_fetch_assoc($res)){
			echo "<tr>";
			echo "<td>";echo $row['householdNo']; echo "</td>";
			echo "<td>";echo $row['householdName'] ;echo "</td>";
			echo "<td>";echo $row['communityVolunteer']; echo "</td>";
			echo "<td>";echo $row['community']; echo "</td>";
			echo "<td>";echo $row['locationId']; echo "</td>";
			echo "<td>";echo $row['radiobuttons']; echo "</td>";
			echo "<td>";echo "<a href='edit.php?edit=$row[householdNo]'> Edit</a>"; echo "</td>";
			echo "<td>";echo "<span id='a'><a href='delete.php?del=$row[householdNo]'> Delete</a></span>"; echo "</td>";

			echo "</tr>";

		}
		echo "</table>";
	}

	?>		
</body>
</html>