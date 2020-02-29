<?php

use \PDO as PDO;
include_once 'conexao.php';

if (isset($_POST["login"])) {
	$login = $_POST["login"];
}
if (isset($_POST["senha"])) {
	$senha = $_POST["senha"];
}


try {
	$pdo = Conection::getConnection();

	$sql = "SELECT * FROM `usuario` WHERE `nomeUsuario` LIKE '$login' AND `senha` = '$senha'";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(':nomeUsuario', $login);
	$stmt->bindParam(':senha', $senha);
	$stmt->execute();

	$result = $stmt->fetch(PDO::FETCH_OBJ);

	if ($result->nomeUsuario === $login && $result->senha === $senha) {
		session_start();
		$_SESSION['sessao'] = 'liberado';
		$_SESSION['idUsuario'] = $result->idUsuario;
		$_SESSION['tipoUsuario'] = $result->tipoUsuario;
		$_SESSION['nomeUsuario'] = $result->nomeUsuario;

		header('Location: ../view/reservas.php');
	} 
	else {
		$_SESSION['sessao'] = 'negado';
		header('Location: ../view/index.php?erro=erro_login');
	}

} catch (Exception $e) {
	echo "erro: ".$e;
}


?>
