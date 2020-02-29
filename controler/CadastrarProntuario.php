<?php 

//Verificando se a sessao esta liberada para o usuario
//require_once "verifica_sessao.php";

use \PDO as PDO;
include_once 'conexao.php';


//Testando se as variáveis vieram vazias
if(isset($_POST['medicoProntuario'])){
	$medicoProntuario = $_POST['medicoProntuario'];
}

if(isset($_POST['pacienteProntuario'])){
	$pacienteProntuario = $_POST['pacienteProntuario'];
}


if(isset($_POST['criticidadeProntuario'])){
	$criticidadeProntuario = $_POST['criticidadeProntuario'];
}

if(isset($_POST['descricaoProntuario'])){
	$descricaoProntuario = $_POST['descricaoProntuario'];
}


if(isset($_POST['medicamentosProntuario'])){
	$medicamentosProntuario = $_POST['medicamentosProntuario'];
}


try {
    
    //Conexao com o BD
    $pdo = new Conection();
    $conexao = $pdo -> getConnection();
    
	$consulta = $conexao->prepare("INSERT INTO prontuario (criticidade, descricao, medicamentos, idPaciente, idMedico) 
		VALUES (:criticidadeProntuario, :descricaoProntuario, :medicamentosProntuario, :pacienteProntuario, :medicoProntuario)");  
    
    
    $consulta->bindParam(':criticidadeProntuario', $criticidadeProntuario);
	$consulta->bindParam(':descricaoProntuario', $descricaoProntuario);
	$consulta->bindParam(':medicamentosProntuario', $medicamentosProntuario);
	$consulta->bindParam(':pacienteProntuario', $pacienteProntuario);
    $consulta->bindParam(':medicoProntuario', $medicoProntuario);
    //Resposta para abrir o modal na página

    if($consulta->execute()){
        header('Location:../view/reservas.php?status=sucesso2');
	}else{
		header('Location:../view/reservas.php?status=erro2');
	}
    
} catch(PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}


?>