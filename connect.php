<?php
  //   $user = 'root';
  //   $password = 'password';
    
  //   try {
	//   $conn = new PDO('mysql:host=localhost;dbname=docert_tron', $user, $password);
	//   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// } catch(PDOException $e) {
	//   echo 'ERROR: ' . $e->getMessage();
	// }

    $user = 'drayocom_usrtron';
    $password = 'omfdg2k07';
    try {
	  $conn = new PDO('mysql:host=localhost;dbname=drayocom_docert', $user, $password);
	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	  echo 'ERROR: ' . $e->getMessage();
	}
 ?>