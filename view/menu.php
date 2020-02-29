
<nav class="navbar navbar-expand-md navbar-dark bg-primary p-2">
  <img src="../imgs/logo-branco-clinica.png" id="logo">
  <!--<img src="../imgs/logo-reservas-branco.png" id="logo">-->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse text-white ml-4 font-titulos" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown text-uppercase">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-book mr-1"></i> Pacientes</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cad-paciente"> 
            <i class="far fa-plus-square"></i>  
            Cadastrar
          </a>
          <a class="dropdown-item" href="#"> 
            <i class="fas fa-search"></i> 
            Consultar
          </a>
        </div>
      </li>

      <!--<li class="nav-item dropdown text-uppercase">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-list-ul"></i> Listas</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="cadastra_listas.php"> 
            <i class="far fa-plus-square"></i> 
            Nova Lista
          </a>
          <a class="dropdown-item" href="listas.php"> 
            <i class="fas fa-search"></i> 
            Consultar
          </a>
        </div>
      </li>-->

      <li class="nav-item dropdown text-uppercase">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-folder-open"></i> Prontuários</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#cad-prontuario"> 
            <i class="far fa-plus-square"></i>  
            Cadastrar
          </a>
          <a class="dropdown-item" href="reservas.php"> 
            <i class="fas fa-search"></i> 
            Consultar
          </a>
        </div>
      </li>
    </ul>

    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="far fa-user"></i> Usuário</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="../controler/Logout.php"><i class="far fa-times-circle"></i> Sair</a>
        </div> 
      </li>
    </ul>
  </div>
</nav>
