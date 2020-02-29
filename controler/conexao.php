<?php

/**
 * 
 * @return \PDO
 */
class Conection {

    function getConnection() {
        $host = 'localhost';
        $banco = 'clinica';
        $usuario = 'root';
        $senha = '';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$banco;", $usuario, $senha);
            $pdo->exec("SET CHARACTER SET utf8");
        } catch (PDOException $ex) {
            return 'Erro na conexao: ' . $ex->getMessage();
        }
        return $pdo;
    }
}