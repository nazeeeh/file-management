<?php
include "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title> Dashboard</title>
	<link rel="stylesheet" type="text/css" href="formUpload.css">
</head>
<body class="body-body">
	<header class="nav-header">
		<div class="nav">
			<img src="image/VNDC logo.png" alt="company_logo" width="200em" class="my-logo" />
			<nav class="nav-nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
		</div>
	</header>	
	
	<h1 id="title">Vaccine Network File Management System</h1>
	<div id="main">
		<p id="description">File Manager</p>

		<form id="" method="POST" action="">
			<div id="rowTab">
				<div class="labels">
					<label id="householdNo-label" for="householdNo">* Household No: </label>
				</div>
				<div class="rightSide">
					<input type="number" name="householdNo" id="householdNo" class="input-text" placeholder="Enter household No" required="">
				</div>
			</div>
			
			<div id="rowTab">
				<div class="labels">
					<label id="householdName-label" for="email">* Household Name: </label>
				</div>
				<div class="rightSide">
					<input type="text" name="householdName" id="householdName" class="input-text" placeholder="Enter household Name" required="">
				</div>
			</div>

			<div id="rowTab">
				<div class="labels">
					<label id="communityVolunteer" for="communityVolunteer">* Community volunteer: </label>
				</div>
				<div class="rightSide">
					<input type="text" name="communityVolunteer" id="communityVolunteer" class="input-text" placeholder="Enter community volunteer" required="">
				</div>
			</div>

			<div id="rowTab">
				<div class="labels">
					<label for="community">Community </label>
				</div>
				<div class="rightSide">
					<select name="community" class="dropdown" id="dropdown">
						<option disabled="" value="">Select an option</option>
						<option value="Apodutse">Apo Dutse</option>
						<option value="bassajiwa">Bassa Jiwa</option>
						<option value="damangaza">Damangaza</option>
						<option value="gosa">Gosa</option>
						<option value="iddo">Iddo</option>
						<option value="ruga">Ruga</option>
						<option value="waru">Waru</option>
					</select>
				</div>
			</div>

			

			<div id="rowTab">
				<div class="labels">
					<label for="locationId">Location id</label>
				</div>
				<div class="rightSide">
					<select name="locationId" class="dropdown" class="dropdown">
						<option disabled="" value="">Select an option</option>
						<option value="A1">A1</option>
						<option value="A2">A2</option>
						<option value="A3">A3</option>
						<option value="B1">B1</option>
						<option value="B2">B2</option>
						<option value="B3">B3</option>
						<option value="C1">C1</option>
						<option value="C2">C2</option>
						<option value="C3">C3</option>
						<option value="D1">D1</option>
						<option value="D2">D2</option>
						<option value="D3">D3</option>
						<option value="E1">E1</option>
						<option value="E2">E2</option>
						<option value="E3">E3</option>
						<option value="F1">F1</option>
						<option value="F2">F2</option>
						<option value="F3">F3</option>
						<option value="G1">G1</option>
						<option value="G2">G2</option>
						<option value="G3">G3</option>
						<option value="H1">H1</option>
						<option value="H2">H2</option>
						<option value="H3">H3</option>
						<option value="I1">I1</option>
						<option value="I2">I2</option>
						<option value="I3">I3</option>
					</select>
				</div>
			</div>

			<div id="rowTab">
				<div class="labels">
					<label for="fileStats">* File status</label>
				</div>
				<div class="rightSide">
					<ul style="list-style-type: none;">
						<li class="radio"><input type="radio" name="radiobuttons" class="fileStats" value="positive" required=""><label>Positive</label></li>

						<li class="radio"><input type="radio" name="radiobuttons" class="fileStats" value="negative" required=""><label>Negative</label></li>
			
					</ul>
				</div>
			</div>


			<button id="submit" type="submit" name="submit">Submit</button>
			<button id="view" type="view" name="view"><a href="viewFile.php">View files</a></button>
		</form>

	</div>

<?php
	if(isset($_POST['submit'])) 
		{
			$count=0;
			$sql = "SELECT householdNo from cache";
			$res = mysqli_query($database,$sql);

			while($row=mysqli_fetch_assoc($res))
			{
				if($row['householdNo']==$_POST['householdNo'])
				{
					$count=$count+1;
				}
			}
		if ($count==0){
		mysqli_query($database,"INSERT INTO CACHE VALUES('$_POST[householdNo]','$_POST[householdName]','$_POST[communityVolunteer]','$_POST[community]','$_POST[locationId]','$_POST[radiobuttons]');");
?>
<script type="text/javascript">
	alert("Registration Successful");
</script>
<?php
	}
	else 
	{
	?>
	<script type="text/javascript">
		alert("Household Id already exist");
	</script>
<?php
	}
	}
?>
</body>
</html>