<?php

	//var_dump($_GET);
	
	//echo "<br>";

	//var_dump($_POST);
	$signupEmailError = "";
	$signupPasswordError = "";
	$LoginEmailError = "";
	$loginPasswordError = "";
		
		if (isset ($_POST["signupEmail"])){
		
		if (empty ($_POST["signupEmail"])) {
			
			$signupEmailError = "V2li on kohustuslik";
		}
	}
		if (isset ($_POST["SignupPassword"])){
		
		if (empty ($_POST["SignupPassword"])) {
			
			$signupPasswordError = "V2li on kohustuslik";
		} else {
		if (strlen($_POST["SignupPassword"])<8 ) {
			$signupPasswordError = "Parool peab olema vähemalt 8 tähemärki";
		} else {
			$signupPasswordError = "Kõik on hästi";
		}
	}
		}
		if (isset ($_POST["LoginEmail"])){
		
		if (empty ($_POST["LoginEmail"])) {
			
			$LoginEmailError= "V2li on kohustuslik";
		}
	}
		if (isset ($_POST["loginPassword"])){
		
		if (empty ($_POST["loginPassword"])) {
			
			$loginPasswordError = "V2li on kohustuslik";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Sisselogimise katsetamiseks leht</title>
	</head>
	<body>

		<h1> Sisselogimise leht</h1>
		
		<form method="POST">
			<label>E-post</label><br>
			<input name="LoginEmail" type="email"> <?php echo $LoginEmailError;?>
			
			<br><br>
			
			<input name="loginPassword" placeholder="Parool" type="password"> <?php echo $loginPasswordError;?>
		
			<br><br>
			<input type="submit" value = "Logi sisse">
			
		</form>
				<h1>Loo kasutaja</h1>
				<form method="POST">
			<label>Signup E-post</label><br>
			<input name="signupEmail" type="email"> 
			<?php echo $signupEmailError;?>
				
			<br><br>
			
			<input name="SignupPassword" placeholder="Parool" type="password"> <?php echo $signupPasswordError;?>
		
			<br><br>
			<input type="submit" value = "Loo kasutaja">
			</form>
	</body>
</html>

