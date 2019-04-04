<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/uikit.css">
    <script src="js/uikit.js"></script>
    <script src="js/uikit-icons.js"></script>
</head>
<body class="uk-background-secondary">
	<?php include ("header.php"); ?>
	<div class="uk-container uk-align-center uk-grid">
		<form method="post" action="includes/tests.php" class="uk-form-stacked uk-text-center uk-width-1-3 uk-align-center uk-light">
			<label>User name</label>
			<input type="text" name="UserName" placeholder="xXxXeljuanjoxXxX" class="uk-input">
			<label>Password</label>
			<input type="password" name="Password" class="uk-input">
			<br><br>
			<input type="submit" value="Login" name="apply" class="uk-button uk-button-primary">
		</form>
	</div>
	<?php include ("footer.php"); ?>
</body>
</html>