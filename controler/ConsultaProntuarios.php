<?php 

//Verificando se a sessao esta liberada para o usuario
//require_once "verifica_sessao.php";

use \PDO as PDO;
include_once 'conexao.php';

//Conexao com o BD
$pdo = new Conection();
$conexao = $pdo -> getConnection();



if(isset($_POST['codProntuario'])){
	$codProntuario = '%'.$_POST['codProntuario'].'%';
}else{
    $codProntuario = '%%';
}

if(isset($_POST['pacienteProntuario'])){
	$pacienteConsultaProntuario = '%'.$_POST['pacienteProntuario'].'%';
}else{
    $pacienteConsultaProntuario = '%%';
}

if(isset($_POST['medicoProntuario'])){
	$medicoConsultaProntuario = '%'.$_POST['medicoProntuario'].'%';
}else{
    $medicoConsultaProntuario = '%%';
}

if(isset($_POST['criticidadeProntuario'])){
	$criticidadeConsultaProntuario = '%'.$_POST['criticidadeProntuario'].'%';
}else{
    $criticidadeConsultaProntuario = '%%';
}

if(isset($_POST['dataProntuario'])){
	$dataConsultaProntuario = '%'.$_POST['dataProntuario'].'%';
}else{
    $dataConsultaProntuario = '%%';
}


	//Consulta no BD
	$consulta = $conexao->query("SELECT 
	prontuario.idProntuario,
    prontuario.dataAtendimento,
    prontuario.criticidade,
    prontuario.descricao,
    prontuario.medicamentos,
    medico.nome as nomeMedico,
    paciente.nome as nomePaciente

FROM prontuario
INNER JOIN medico
ON prontuario.idMedico = medico.idMedico
INNER JOIN paciente
ON prontuario.idPaciente = paciente.idPaciente
WHERE prontuario.idProntuario LIKE '$codProntuario' AND paciente.nome LIKE '$pacienteConsultaProntuario' AND medico.nome LIKE '$medicoConsultaProntuario' AND prontuario.criticidade LIKE '$criticidadeConsultaProntuario' AND prontuario.dataAtendimento LIKE '$dataConsultaProntuario'");  
    
    
	$dados = $consulta->fetchAll(PDO::FETCH_OBJ);

	echo json_encode($dados, JSON_PRETTY_PRINT);
    //echo json_encode('{"firstName":"John", "lastName":"Doe"}', JSON_PRETTY_PRINT);


?>