<?php
	include "connection.php";
?>
<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title> login </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<header class="nav-header">
		<div class="nav">
			<img src="image/VNDC logo.png" alt="company_logo" width="200em" class="my-logo" />
			<nav class="nav-nav">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php">Login</a></li>
				</ul>
			</nav>
		</div>
	</header>	
	<div class="box-box">

		<div class="box">
			<h2>Vaccine Network File Management System</h2>

			<form action="" method="POST">
				<div class="inputbox">
					<input type="text" name="username" required="">
					<label>Username</label>
				</div>
				<div class="inputbox">
					<input type="password" name="password" required="">
					<label>Password</label>
				</div>
				<input type="submit" name="submit" value="submit">
			</form>
		</div>
	</div>	
	
	<footer class="bottom-footer">
			<div class="footer-address">
				<h2>Project Credits</h2>
					<address class="addy">
						<i>Chioma and Ogechi</i><br>
						<i>+2348172379758, +2348139265575</i>
						
					</address>
			</div>

			<div class="footer-social-icons">
					<ul>
						<li><a href="#" target="blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" target="blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" target="blank"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#" target="blank"><i class="fa fa-youtube"></i></a></li>
					</ul>
			</div>

			<div class="footer-footer">
				copyright &copy; Nazih 2019
			</div>

	</footer>

	<?php
		$count=0;
		if(isset($_POST['submit']))
		{
			$res = mysqli_query($database, "SELECT * FROM login_table WHERE username='$_POST[username]' && password='$_POST[password]';");
			$count = mysqli_num_rows($res);
			
			if($count==0)
			{
				?>
				<script type="text/javascript">
					alert("username or password doesnt match, try again");
				</script>
				<?php
			}
			else
			{
				?>
				<script type="text/javascript">
					window.location="formUpload.php";
				
				</script>
				<?php
			}
		}
	
	?>
</body>
</html>