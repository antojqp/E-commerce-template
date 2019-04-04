<<?php 
	if (isset($_POST[apply])) {
		# code...

		require 'databaseinfo.php';

		$password = $_POST["Password"];
		$username = $_POST["UserName"];

		$passwordhs = password_hash($password, PASSWORD_DEFAULT);

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
				
				$pwdCheck = password_verify($password, $row["PASS"]);

				if ($pwdCheck == false) {
					# code...

					echo "wrong password";
					echo $password ." ". $row["PASS"] ." ". $passwordhs;
					exit();
				}elseif ($pwdCheck == true) {
					# code...

					echo "why";
					exit();
				}



			}


	}

}

 ?>