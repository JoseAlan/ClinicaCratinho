<?php
//Verificando se a sessao esta liberada para o usuario
session_start();
if(!isset($_SESSION['sessao']) || $_SESSION['sessao'] != 'liberado'){
    header('Location: index.php?erro=erro_sessao');
}
?>