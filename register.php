<?php 
	session_start();

	if (isset($_SESSION['user'])) {
		#in case they are already login then there is no need to show this page

		header("Location: ../index.php?userlogged");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/uikit.css">
    <script src="js/uikit.js"></script>
    <script src="js/uikit-icons.js"></script>
</head>
<body class="uk-background-secondary">
	<?php include ("header.php"); ?>
	<div class="uk-container uk-align-center uk-grid">
		<form method="post" action="includes/signup.php" class="uk-form-stacked uk-text-center uk-width-1-3 uk-align-center uk-light">
			<h1 class="uk-heading-primary uk-light">Enter your data</h1>
			<?php 
				if (isset($_GET['error'])) {
					if ($_GET['error'] == "emptyfields") {
						echo '<p class="uk-text-small uk-light uk-text-warning">Please fill all the fields</p>';	
					}elseif ($_GET['error'] == "invalidmail") {
						echo '<p class="uk-text-small uk-light uk-text-warning">Please enter a valid email</p>';
					}elseif ($_GET['error'] == "invalidusername") {
						echo '<p class="uk-text-small uk-light uk-text-warning">Please enter a valid user name</p>';
					}elseif ($_GET['error'] == "passwordnotmatch") {
						echo '<p class="uk-text-small uk-light uk-text-warning">The passwords are not the same</p>';
					}elseif ($_GET['error'] == "usernametaken") {
						echo '<p class="uk-text-small uk-light uk-text-warning">The user name is already taken</p>';
					}
				}
			 ?>
			<label>Name</label>
			<input type="text" name="Name" placeholder="Juan" class="uk-input">
			<label>User name</label>
			<input type="text" name="UserName" placeholder="xXxXeljuanjoxXxX" class="uk-input">
			<label>Email</label>
			<input type="email" name="Email" placeholder="example@example.com" class="uk-input">
			<label>Password</label>
			<input type="password" name="Password" class="uk-input">
			<label>Confirm password</label>
			<input type="password" name="Verify_Password" class="uk-input">
			<br><br>
			<input type="submit" value="Register" name="Submit" class="uk-button uk-button-primary">
			<input type="reset" value="Reset values" class="uk-button uk-button-primary">
		</form>
	</div>
	<?php include ("footer.php"); ?>
</body>
</html>