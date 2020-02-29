
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" type="text/css" href="../css/estilo-login.css">
  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <link href="../fontawesome/css/all.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../imgs/favicon-clinica.png" sizes="32x32">

  <title>Reservas Online</title>
</head>
<body>

  <div class="container-fluid font-textos">
    <div class="row">
      <div class="col-md-4"></div>

      <div class="col-md-4" id="box-login">
        <img src="../imgs/logo-clinica.png" class="img-responsive" id="logo-login">
        <form class="form form-group" method="post" action="../controler/ConsultaLogin.php">
          <div class="form-row">
            <label for="login"><i class="fas fa-user"></i> LOGIN: </label>
            <input type="text" name="login" class="form-control" placeholder="Digite Seu Login" id="input-nome" required="">
          </div>
          <div class="form-row">
            <label for="senha"><i class="fas fa-unlock-alt"></i> SENHA:</label>
            <input type="password" name="senha" class="form-control" placeholder="Digite Sua Senha" id="input-senha" required="">
          </div>

          <div class="form-row mt-3">
              
            
            <div class="col-md-6 col-sm-6">
              <button type="reset" class=" btn btn-outline-danger btn-block font-titulos-negrito" id="btn-limpar">LIMPAR</button>
            </div>
            <div class="col-md-6 col-sm-6">
              <button type="submit" class="btn btn-outline-success btn-block font-titulos-negrito" id="btn-entrar">ENTRAR
              </button>
            </div>
          </div>
          <div class="col-md-4"></div>
        </form>
            <!--Verificando se a variavel login foi setada e está correta-->
             <?php
             if(isset($_GET['erro']) && $_GET['erro'] == 'erro_login'){
              ?>

              <div class="alert alert-danger" role="alert">
                Usuário ou Senha Inválido(s)!
              </div>

            <?php }?>

            <!--Verificando se a sessao foi liberada-->
            <?php
            if(isset($_GET['erro']) && $_GET['erro'] == 'erro_sessao'){
              ?>

              <div class="alert alert-danger" role="alert">
                Faça Login Para Acessar o Sistema!
              </div>

            <?php }?>
              
      </div>
    </div>
  </div>

  
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script type="text/javascript" src="../jquery/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/bootstrap.js"></script>
  <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#box-login").hide();
      $("#box-login").fadeIn(1000);
    });
  </script>
</body>
</html>