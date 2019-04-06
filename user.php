<?php
	session_start();
	if (!isset($_SESSION['user'])) {
		#this will check if the user is logged and got here by legitimate manners

		header("Location: index.php?error=notlogged");
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile <?php echo $_SESSION['user']; ?></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/uikit.css">
    <script src="js/uikit.js"></script>
    <script src="js/uikit-icons.js"></script>
</head>
<body>
<?php include 'header.php'; ?>


<?php include 'footer.php'; ?>
</body>
</html>