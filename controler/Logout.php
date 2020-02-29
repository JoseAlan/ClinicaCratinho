<?php
	session_start();
   $_SESSION['sessao'] = 'negado';
    
  if ($_SESSION['sessao'] == 'negado') {
  	session_destroy();
  	header('Location: ../view/index.php');
  }
?>