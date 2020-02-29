<?php

//Verificando se a sessao esta liberada para o usuario
//require_once "verifica_sessao.php";
header('Content-Type: text/html; charset=utf-8');



use \PDO as PDO;
include_once 'conexao.php';

try {
	//Conexao com o BD
$pdo = new Conection();
$conexao = $pdo -> getConnection();

$consulta = $conexao->query("SELECT * FROM medico");  
$dados = $consulta->fetchAll(PDO::FETCH_OBJ);
echo json_encode($dados, JSON_PRETTY_PRINT);

} catch (Exception $e) {
	
}

?>