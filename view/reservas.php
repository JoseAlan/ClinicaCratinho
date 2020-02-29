<?php
//Verificando se a sessao esta liberada para o usuario
require_once "../controler/VerificaSessao.php";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link href="../fontawesome/css/all.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../imgs/favicon-clinica.png" sizes="32x32">

  <title>Clínica Cratim di Açúcar</title>
</head>
<!--<body onload="carregaTipoItem() "> -->
  <body onload="carregaMedicos() ">


  <?php
  if(isset($_GET['status']) && $_GET['status'] === 'erro1'){
    ?>
    <script type="text/javascript">
     alert("Não foi Possível Cadastrar o Paciente!")
     window.location.href = "reservas.php";
   </script>
 <?php }?>

 <?php
 if(isset($_GET['status']) && $_GET['status'] === 'sucesso1'){
  ?>
  <script type="text/javascript">
   alert("Paciente Cadastrado com Sucesso")
   window.location.href = "reservas.php";
 </script>
<?php }?>

<?php
  if(isset($_GET['status']) && $_GET['status'] === 'erro2'){
    ?>
    <script type="text/javascript">
     alert("Não foi Possível Cadastrar o Prontuário!")
     window.location.href = "reservas.php";
   </script>
 <?php }?>

 <?php
 if(isset($_GET['status']) && $_GET['status'] === 'sucesso2'){
  ?>
  <script type="text/javascript">
   alert("Prontuário Cadastrado com Sucesso")
   window.location.href = "reservas.php";
 </script>
<?php }?>

<!-- Modais -->

<!-- Modal Cadastrar Paciente -->
<div class="modal fade" id="cad-paciente" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-azul-escuro">
        <h5 class="modal-title text-uppercase text-white" id="">
          Cadastrar Paciente
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div><form action="../controler/CadastrarPaciente.php" method="post">
        <div class="modal-body">
         <div class="row">
           <div class="col-md-12">
             <label for="nomePaciente">Nome do Paciente:</label>
             <input type="text" id="nomePaciente" name="nomePaciente" class="form-control">
           </div>
           <div class="col-md-12">
             <label for="cpfPaciente">CPF:</label>
             <input type="text" id="cpfPaciente" name="cpfPaciente" class="form-control">
           </div>
         </div>
         <div class="row">
          <div class="col-md-12">
           <label for="enderecoPaciente">Endereço:</label>
           <input type="text" id="enderecoPaciente" name="enderecoPaciente" class="form-control">
         </div>
         <div class="col-md-12">
          <label for="dataPaciente">Data de Nascimento:</label>
          <input type="date" id="dataPaciente" name="dataPaciente" class="form-control">
        </div>
      </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-success">Cadastrar</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
  </div></form>
</div>
</div>
</div>


<!-- Modal Cadastrar Prontuário -->
<div class="modal fade" id="cad-prontuario" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-azul-escuro">
        <h5 class="modal-title text-uppercase text-white" id="">
          Cadastrar Prontuário
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div><form action="../controler/CadastrarProntuario.php" method="post">
        <div class="modal-body">
         <div class="row">
            <div class="col-md-12">
             <label for="medicoProntuario">Médico:</label>
             <select name="medicoProntuario" id="medicoProntuario" class="form-control">
              <option selected value="">Selecionar...</option>
            </select>
          </div>
          <div class="col-md-12">
            <label for="pacienteProntuario">Paciente:</label>
            <select name="pacienteProntuario" id="pacienteProntuario" class="form-control">
              <option selected value="">Selecionar...</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
              <label for="">Criticidade </label>
              <select class="form-control" id="criticidadeProntuario" name="criticidadeProntuario">
                <option value="%%">Selecionar</option>
               <option value="Verde">Verde</option>
               <option value="Amarelo">Amarelo</option>
               <option value="Vermelho">Vermelho</option>
             </select>
          </div>
        </div>

         <div class="row">
          <div class="col-md-12">
           <label for="descricaoProntuario">Descrição:</label>
           <input type="text" id="descricaoProntuario" name="descricaoProntuario" class="form-control">
         </div>
         <div class="col-md-12">
          <label for="medicamentosProntuario">Medicamentos:</label>
          <input type="text" id="medicamentosProntuario" name="medicamentosProntuario" class="form-control">
        </div>
      </div>
  </div>
  <div class="modal-footer">
    <button type="submit" class="btn btn-success">Cadastrar</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
  </div></form>
</div>
</div>
</div>

<!-- Menu -->
<?php  require_once "menu.php";?>

<!-- Conteudo Central -->

<div class="container-fluid font-textos">

  <div class="row m-2">
    <div class="col-md-12">
      <div class="col-md-12 p-0">
        <h2 class="font-titulos salmao mt-3">Consultar Prontuários</h2>
      </div>
      <form class="form">

        <!--<div class="form-group">-->

          <div class="form-row">
            <div class="col-md-2">
              <label for="cod-prontuario">Código</label>
              <input type="text" class="form-control" id="codConsultaProntuario" placeholder="Código do Prontuário">
            </div>
            
            <div class="col-md-4">
              <label for="paciente">Nome do Paciente</label>
              <input type="text" class="form-control" id="pacienteConsultaProntuario" placeholder="Digite o nome do paciente">
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-2">
              <label for="medico">Nome do Médico </label>
              <input type="text" id="medicoConsultaProntuario" class="form-control" placeholder="Nome do Médico">
            </div>

            <div class="col-md-2">
              <label for="">Criticidade </label>
              <select class="form-control" id="criticidadeConsultaProntuario" name="criticidadeConsultaProntuario">
                <option value="%%">Selecionar</option>
               <option value="Verde">Verde</option>
               <option value="Amarelo">Amarelo</option>
               <option value="Vermelho">Vermelho</option>
             </select>
           </div>

           <div class="col-md-2">
            <label for="data-consulta">Data da Consulta</label>
            <input type="date" class="form-control" id="dataConsultaProntuario" >
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-3 text-right">
            <button class="btn btn-success btn-block mt-2 mb-2" id="btnConsultarProntuarios">Consultar</button>
          </div>
          <div class="col-md-3">
            <button class="btn btn-danger btn-block mt-2" id="btnVerTodosProntuarios">Ver Todos</button>
          </div>
          <div class="col-md-6"></div>
        </div>


        <!--</div>-->

      </form>
    </div>
  </div>

  <hr>

  <div class="row m-2">
    <div class="col-md-12 col-xs-12">
      <h3 class="mt-4 mb-4 azul">Prontuários</h3>
      <table class="table table-sm table-bordered table-striped" id="tabela-prontuarios">
        <thead>
          <tr>
            <th scope="col" width="10%" class="text-center">Código</th>
            <th scope="col" width="25%">Paciente</th>
            <th scope="col" width="10%" class="text-center">Data</th>
            <th scope="col" width="10%" class="text-center">Criticidade</th>
            <th scope="col" width="25%">Descrição</th>
            <th scope="col" width="20%" class="text-center">Medicação</th>

          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div> <!-- Fim da table esquerda-->

    <!--
    <div class="col-md-3 col-xs-3 pl-4 table-overflow">
      <h3 class="mt-4 mb-4 text-danger">Livros Reservados</h3>
      <table class="table table-sm table-bordered table-hover mb-5" id="listaLivros">
        <thead>
          <tr>
            <th scope="col" width="60%">Titulo do Livro</th>
            <th scope="col" width="40%">Série do Livro</th>
          </tr>
        </thead>
        <tbody>

        </tbody>
      </table>
    </div>-->

  </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="../jquery/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">

				//limpando os campos
				function carregaPacientes(){
					//console.log("turma carregada");

					$.get( "../controler/ConsultaPacientes.php", function( data ) {

						var dados = JSON.parse(data);
						var itens = { propertyKey: "" };

						//console.log(dados);

						var i = 0;
						itens += "<option value='' selected>Selecionar...</option>";

						while(i < dados.length){
							itens += '<option value="'+dados[i].idPaciente+'">' + dados[i].nome +'</option>';
							$("#pacienteProntuario").html(itens);
							i++;
						}
					});
				}

				 //Carregando os motivos do BD 
				 function carregaMedicos(){
				 	//console.log("motivos carregados");
				 	//var arr = {idTipoItem:'idTipoItem'}

				 	$.get("../controler/ConsultaMedicos.php", function(response){
				 		var res = JSON.parse(response);
				 		var itens = { propertyKey: "" };

                //inserindo os dados no select
                var i = 0;
                itens += "<option value='' selected>Selecionar...</option>";
                //o select desta página envia o texto que descreve o motivo e nao o ID
                while(i < res.length){
                  //console.log(res[i].idTipoItem);
                  //console.log(res[i].descricaoTipoItem);
                  itens += '<option value="'+res[i].idMedico+'">' + res[i].nome +'</option>'
                  $("#medicoProntuario").html(itens);
                  i++;
                }
                carregaPacientes();
              });
				 }
				</script>

        <script>


          $('#btnVerTodosProntuarios').click(function(){

            var codConsultaProntuario = '%%';
            var pacienteConsultaProntuario = '%%';
            var medicoConsultaProntuario = '%%';
            var criticidadeConsultaProntuario = '%%';
            var dataConsultaProntuario = '%%';
            
            //var arr = {codProntuario: codConsultaProntuario, pacienteProntuario: pacienteConsultaProntuario, MedicoProntuario: medicoConsultaProntuario, criticidadeProntuario: criticidadeConsultaProntuario, dataProntuario: dataConsultaProntuario};
            var arr = {codProntuario: codConsultaProntuario, pacienteProntuario: pacienteConsultaProntuario, medicoProntuario: medicoConsultaProntuario, criticidadeProntuario: criticidadeConsultaProntuario, dataProntuario: dataConsultaProntuario};

            //console.log(arr);
            
            $.post("../controler/ConsultaProntuarios.php", arr, function(response){

              var res = JSON.parse(response);
              var itens = {propertyKey: ""};


              if(res.length == 0){
                alert("Não existem dados para esta consulta!")
						//location.reload(); 
					}else{
						var i = 0;

                        //alert(res.length);
                        while(i < res.length){

                          //console.log(res[i].codReserva);
                          //console.log(res[i].nomeResp);
                          var data = res[i].dataAtendimento.split('-').reverse().join('-');

                          itens += "<tr><th data-codProntuario='' scope='row'>" + res[i].idProntuario +"</th><td data-paciente =''>" + res[i].nomePaciente + "</td>" +
                          "<td data-dtProntuario =''>" + data + "</td>";
                          
                          itens += "<td data-criticidade='' >" + res[i].criticidade + "</td>" +
                          "<td data-descricao='' >" + res[i].descricao + "</td>" +
                          "<td data-medicacao='' >" + res[i].medicamentos + "</td>";

                          itens += "</tr>";
                          $("#tabela-prontuarios tbody").html(itens);
                        //console.log(i);
                        i++;

                      }

                    }
                    
                    });


return false; 
});


$('#btnConsultarProntuarios').click(function(){

  var codConsultaProntuario = '%'+ $('#codConsultaProntuario').val() + '%';
  var pacienteConsultaProntuario = '%'+ $('#pacienteConsultaProntuario').val() + '%';
  var medicoConsultaProntuario = '%'+ $('#medicoConsultaProntuario').val() + '%';
  var criticidadeConsultaProntuario = '%'+ $('#criticidadeConsultaProntuario').val() + '%';
  var dataConsultaProntuario = '%'+ $('#dataConsultaProntuario').val() + '%';

  console.log(codConsultaProntuario, pacienteConsultaProntuario, medicoConsultaProntuario, criticidadeConsultaProntuario, dataConsultaProntuario);
            var arr = {codProntuario: codConsultaProntuario, pacienteProntuario: pacienteConsultaProntuario, medicoProntuario: medicoConsultaProntuario, criticidadeProntuario: criticidadeConsultaProntuario, dataProntuario: dataConsultaProntuario};
            
            if(codConsultaProntuario === "%%" && pacienteConsultaProntuario === "%%" && medicoConsultaProntuario === "%%" && criticidadeConsultaProntuario === "%%" && dataConsultaProntuario === "%%"){
              alert('Campos de buscas vazios');
            } else{

              $.post("../controler/ConsultaProntuarios.php", arr, function(response){

                var res = JSON.parse(response);
                var itens = {propertyKey: ""};


                if(res.length == 0){
                  alert("Não existem dados para esta consulta!")
						//location.reload(); 
					}else{
						var i = 0;

                        //alert(res.length);
                        while(i < res.length){

                          var data = res[i].dataAtendimento.split('-').reverse().join('-');

                          itens += "<tr><th data-codProntuario='' scope='row'>" + res[i].idProntuario +"</th><td data-paciente =''>" + res[i].nomePaciente + "</td>" +
                          "<td data-dtProntuario =''>" + data + "</td>";
                          
                          itens += "<td data-criticidade='' >" + res[i].criticidade + "</td>" +
                          "<td data-descricao='' >" + res[i].descricao + "</td>" +
                          "<td data-medicacao='' >" + res[i].medicamentos + "</td>";

                          itens += "</tr>";
                          $("#tabela-prontuarios tbody").html(itens);
                        //console.log(i);
                        i++;

                      }

                    }
               
                    


                  });

            }
            
            return false; 
          });


        </script>


      </body>
      </html>




