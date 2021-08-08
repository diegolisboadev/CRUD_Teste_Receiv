<?php

    class Conexao {

        private static $host = "localhost";
        private static $port = "3306";
        private static $database = "crud_receiv";
        private static $usuario = "root";
        private static $senha = "root";
        private static $conexao;

        public static function getConexao()
        {   
            try {
                if(!self::$conexao instanceof PDO) {
                    self::$conexao = new PDO("mysql:host=".self::$host.";port=".self::$port.";dbname=".self::$database, self::$usuario, self::$senha,
                        [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);
                    return self::$conexao;
                } else {
                    return self::$conexao;
                }
            } catch (PDOException $erro) {
                die($erro->getMessage());
            }
        }
        
    }