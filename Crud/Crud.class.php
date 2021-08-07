<?php

    require_once $_SERVER['DOCUMENT_ROOT']."/Service/ServiceCrud.class.php";

    class Crud {
        
        private $conexao;

        public function __construct()
        {
            $this->service = new ServiceCrud();
        }

        /**
         * 
         */
        public function adicionarDevedor(array $params=[]) {
            //print($params);
            return $this->service->insereDados();
            /*$this->conexao->conexao();
            $data = [
                'name' => $name,
                'surname' => $surname,
                'sex' => $sex,
            ];
            $sql = "INSERT INTO users (name, surname, sex) VALUES (:name, :surname, :sex)";
            $pdo->prepare($sql)->execute($data);*/
        }

    }