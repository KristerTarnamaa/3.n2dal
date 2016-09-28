<?php

	//functions.php

	/*
	$nimi = "Krister";
	$perenimi = "Tarnamaa";
	function sum($x, $y) {
		
		return $x + $y;
		
	}
	
	echo sum(12312312,12312355553);
	echo "<br><br>";

	
	function tere($nimi, $perenimi) {
		return "Tere tulemast ".$nimi." ".$perenimi."!";
	}
	//echo "Tere tulemast: ".$nimi." ".$perenimi;
	echo tere("mina", "sina");
	*/
	
	$database = "if16_kristarn";
	function signup($email, $password, $sugu, $auto) {
		
				 
				 $mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]); 
				 $stmt = $mysqli->prepare("INSERT INTO kodutoo_KrisTarn (email, password, sugu, lemmikauto) VALUE (?, ?, ?, ?) ");
				 
				 //asendan küsimärgid
				 //iga märgi kohta tuleb lisada üks täht - mis tüüpi muutuja on
				 // s - string
				 // i - int
				 // d - double
				 $stmt->bind_param("ssss", $email, $password, $sugu, $auto);
				 //t'ida käsku
				 if( $stmt->execute()){
					 echo "õnnestus";
				 } else {
						echo "<br>"."ERROR: ".$stmt->error;
					 
				 }	
		
	}
	
	function login($email, $password) {
	
				$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]); 
				 $stmt = $mysqli->prepare("
				  
					SELECT id, email, password, sugu, Lemmikauto, created
					FROM kodutoo_KrisTarn
					WHERE email = ?
					
				 ");
				 
				 echo $mysqli->error;
				 
				 $stmt->bind_param("s", $email);
				
				//rea kohta tulba väärtus
				$stmt->bind_result($id, $emailFromDb, $passwordFromDb, $suguFromDb, $autoFromDb, $created);
				
				$stmt->execute();
				
				//ainult SELECT'i puhul
				if($stmt->fetch()){
					//oli olemas, rida käes
					//kasutaja sisestas sisselogimiseks
					$hash = hash("sha512", $password);
					
					if ($hash == $passwordFromDb) {
						
						//oli sama
						echo "Kasutaja $id logis sisse";
						
					} else {
						
						//polnud sama
						echo "sitt parool";
						
					}
					
				} else {
					
					//ei olnud ühtegi rida
					echo "Sellise emailiga: $email kasutajat ei ole olemas.";
				}
	}
	
	?>