<!DOCTYPE html>
<html>
<head>
	<title><?php $_GLOBALS['COUNT']; echo $_GLOBALS['COUNT']; ?></title>
</head>
<body>
<div class="uk-position-top-left uk-container uk-container-small uk-overflow-auto uk-height-large">
	<?php 
	$i = 1;
	$COUNT = 1;
	do {
		
		echo($COUNT . "<br>");
		$COUNT++;
		
		} while ($i <= 10);	

 ?>
</div>
</body>
</html>