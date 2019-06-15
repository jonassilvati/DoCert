<?php  
	if (!isset($_SESSION)) {
		session_start();
	}

	if (empty($_SESSION['id']) || empty($_SESSION['senha'])) {
		session_destroy();
		header("Location:index.php");exit;
	}else{
		require_once('connect.php');
		
		$id = $_SESSION['id'];
		$senha = $_SESSION['senha'];

		$select_adm = "SELECT * FROM administrator WHERE id=:id AND senha=:senha";

		try{
			$result=$conn->prepare($select_adm);
			$result->bindParam(':id', $id, PDO::PARAM_INT);                          
			$result->bindParam(':senha', $senha, PDO::PARAM_STR);                          
			$result->execute();
			$cont=$result->rowCount();
			if($cont<=0){
				session_destroy();
				header("Location:index.php");exit;
			}
        }catch(PDOException $e){
          // echo 'ERROR: 28 ' . $e->getMessage();
        } 	
	}
?>