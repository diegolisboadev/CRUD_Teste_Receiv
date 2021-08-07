<?php

    abstract class Conexao {

        private static $host = "localhost";
        private static $port = "3306";
        private static $database = "crud_receiv";
        private static $usuario = "root";
        private static $senha = "root";
        private static $conexao;

        public static function conexao() {

            if(self::$conexao == null) {
                try {
                    self::$conexao = new PDO("mysql:host=".self::$host.";port=".self::$port.";dbname=".self::$database, self::$usuario, self::$senha,
                        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
                        print('ok');
                } catch (PDOException $erro) {
                    die($erro->getMessage());
                }
            }
             
            return self::$conexao;
        }

        public static function desconectar()
        {
            self::$conexao = null;
        }
        
    }