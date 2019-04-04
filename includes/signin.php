<?php 
if (isset($_POST[Login])) {
	# code...
	require 'databaseinfo.php';

	$username=$_POST["UserName"];
	$password=$_POST["Password"];
	
	if (empty($username) || empty($password)) {
		# check if there are empty fields
		header("Location:../login.php?emptyfields");
		exit();
	}else{

		#start same as the register form we will need to select from the database the information required

		$sql="SELECT * FROM users WHERE USERNAME=?;";
		$stmt=mysqli_stmt_init($conn);

		if (!mysqli_stmt_prepare($stmt , $sql)) {
			# code...
			header("Location: ../login.php?sql101");
			exit();
		}else{

			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			
			if ($row = mysqli_fetch_assoc($result)) {
				# this will check if there is actually a username in it in case there isn't it'll be redirected to the login page with an prompt to register

				$pwdCheck = password_verify($password, $row["PASS"]);

				if ($pwdCheck == true) {
					#this will check if the password is actually right and it'll redirect to the main page with the data (remeber that the $pwdCheck is a bool but there is always the probability that it can turn into a string thanks to some error so always double check)
					session_start();
					$_SESSION['user'] = $row["USERNAME"];
					header("Location: ../index.php?yourelogged");
					exit();
				}elseif ($pwdCheck == false) {
					# this will check if it isn't right and it'll send it back to the form
					header("Location: ../login.php?wrongpass");
					exit();

				}else{
					#in case there is some unexpected error
					header("Location: ../login?sqlerror202");
					exit();
				}
			}else{

				header("Location: ../login?error=nouser");
				exit();
			}
		}
	}

	mysqli_stmt_close($stmt);
	mysqli_close($conn);

}else {

	header("Location:../index.php");
	exit();
}