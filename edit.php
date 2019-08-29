
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
					<li><a href="index.html">Home</a></li>
					<li><a href="login.html">Login</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
			</nav>
		</div>
	</header>	
	
	<h1 id="title">Vaccine Network File Management System</h1>
	<div id="main">
		<p id="description">File Manager</p>
<?php

	if(isset($_GET['edit'])){
		$householdNo = $_GET['edit'];
		$res = mysqli_query($database, "SELECT * FROM cache WHERE householdNo = '$householdNo'");
		$row = mysqli_fetch_assoc($res);

	}

		if (isset($_POST['update'])) {

			$sql= "UPDATE cache SET householdNo='$_POST[newHouseholdNo]',householdName='$_POST[newHouseholdName]',communityVolunteer='$_POST[newCommunityVolunteer]',community='$_POST[newCommunity]',locationId='$_POST[newlocationId]',radiobuttons='$_POST[newRadiobuttons]' WHERE householdNo = $householdNo";
			$res = mysqli_query($database, $sql)
					or die("Could not update". mysqli_error());

			echo "<meta http-equiv='refresh' content='0; url=viewFile.php'>";
		
		}
?>
		<form id="" method="POST" action="">
			<div id="rowTab">
				<div class="labels">
					<label id="householdNo-label" for="householdNo">* Household No: </label>
				</div>
				<div class="rightSide">
					<input type="number" name="newHouseholdNo" id="householdNo" class="input-text" placeholder="Enter household No" required="" value="<?php echo $row['householdNo']; ?>">
				</div>
			</div>
			
			<div id="rowTab">
				<div class="labels">
					<label id="householdName-label" for="email">* Household Name: </label>
				</div>
				<div class="rightSide">
					<input type="text" name="newHouseholdName" id="householdName" class="input-text" placeholder="Enter household Name" required="" value="<?php echo $row['householdName']?>">
				</div>
			</div>

			<div id="rowTab">
				<div class="labels">
					<label id="communityVolunteer" for="communityVolunteer">* Community volunteer: </label>
				</div>
				<div class="rightSide">
					<input type="text" name="newCommunityVolunteer" id="communityVolunteer" class="input-text" placeholder="Enter community volunteer" required="" value="<?php echo $row['communityVolunteer']?>">
				</div>
			</div>

			<div id="rowTab">
				<div class="labels">
					<label for="community">Community </label>
				</div>
				<div class="rightSide">
					<select name="newCommunity" class="dropdown" id="dropdown">
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
					<select name="newlocationId" class="dropdown" class="dropdown">
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
						<li class="radio"><input type="radio" name="newRadiobuttons" class="fileStats" value="positive" required=""><label>Positive</label></li>

						<li class="radio"><input type="radio" name="newRadiobuttons" class="fileStats" value="negative" required=""><label>Negative</label></li>
			
					</ul>
				</div>
			</div>

			<button id="update" type="update" name="update">Update</button>
			<button id="back" type="back" name="back"><a href="viewFile.php">Back</a></button>

</form>
</body>
</html>