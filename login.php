<?php  
require_once('connect.php');

if ($_POST) {
	$login = trim(strip_tags($_POST['login']));
	$senha = md5(sha1(trim(strip_tags($_POST['senha']))));

	$select_adm = "SELECT id, senha, nome, nivel FROM administrator WHERE login=:login AND senha=:senha";

	try{
		$result=$conn->prepare($select_adm);
		$result->bindParam(':login', $login, PDO::PARAM_STR);              
		$result->bindParam(':senha', $senha, PDO::PARAM_STR);              
		$result->execute();
		$cont=$result->rowCount();
		if($cont>0){
			session_start();
			while($adm=$result->FETCH(PDO::FETCH_OBJ)){
				$_SESSION['id'] = $adm->id;
				$_SESSION['nome'] = $adm->nome;
				$_SESSION['senha'] = $adm->senha;
				$_SESSION['nivel'] = $adm->nivel;
				$id = $adm->id;
				$update_adm = "UPDATE administrator SET ultm_acesso=now() WHERE id=:id";
				try {
					$resultu=$conn->prepare($update_adm);
					$resultu->bindParam(':id', $id, PDO::PARAM_INT);              
					$resultu->execute();
				} catch (PDOException $e) {
					//echo 'ERROR: 30 ' . $e->getMessage();
				}
			}
			echo 'sucesso';
		}else{
			echo 'erro';
		}

    }catch(PDOException $e){
      //echo 'ERROR: 39 ' . $e->getMessage();
    } 
	
}else{
	header("Location:../index.php");exit;
}