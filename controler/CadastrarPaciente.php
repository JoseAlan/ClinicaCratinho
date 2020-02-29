<?php 

//Verificando se a sessao esta liberada para o usuario
//require_once "verifica_sessao.php";

use \PDO as PDO;
include_once 'conexao.php';


//Testando se as variáveis vieram vazias
if(isset($_POST['nomePaciente'])){
	$nomePaciente = $_POST['nomePaciente'];
}

if(isset($_POST['cpfPaciente'])){
	$cpfPaciente2 = $_POST['cpfPaciente'];
	$cpfPaciente = preg_replace('/[^0-9]/', '', $cpfPaciente2);
}


if(isset($_POST['enderecoPaciente'])){
	$enderecoPaciente = $_POST['enderecoPaciente'];
}

if(isset($_POST['dataPaciente'])){
	$dataPaciente = $_POST['dataPaciente'];
}


try {
    
    //Conexao com o BD
    $pdo = new Conection();
    $conexao = $pdo -> getConnection();
    
	$consulta = $conexao->prepare("INSERT INTO paciente (nome, cpf, endereco, dtNascimento) VALUES (:nomePaciente, :cpfPaciente, :enderecoPaciente, :dataNascimento)");  
    
    
    $consulta->bindParam(':nomePaciente', $nomePaciente);
	$consulta->bindParam(':cpfPaciente', $cpfPaciente);
	$consulta->bindParam(':enderecoPaciente', $enderecoPaciente);
	$consulta->bindParam(':dataNascimento', $dataPaciente);
    
    //Resposta para abrir o modal na página

    if($consulta->execute()){
        header('Location:../view/reservas.php?status=sucesso1');
	}else{
		header('Location:../view/reservas.php?status=erro1');
	}
    
} catch(PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}


?>