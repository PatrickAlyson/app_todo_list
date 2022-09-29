<?php

class Conexao
{
    private $host = 'localhost';
    private $dbname = 'php_com_pdo';
    private $user = 'admin';
    private $pass = '10333788443';

    public function conectar()
    {
        try {
            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
            );

            return $conexao;
        } catch (PDOException $e) {
            echo '<p>' . $e->getMessage() . '</p>';
        }
    }
}
