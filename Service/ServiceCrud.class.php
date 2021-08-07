<?php

    require_once $_SERVER['DOCUMENT_ROOT']."/Database/Conexao.class.php";

    class ServiceCrud { // TODO VERIFICAR HERANÇA

        /**
         * 
         */
        public function insereDados(array $params=[]) {
            $pdo = Conexao::conexao();
            // TODO logica de inserção aqui
        }

        /**
         * 
         */
        public function listaDados() {

        }

        /**
         * 
         */
        public function listaDadosId(int $id) {

        }

        /**
         * 
         */
        public function excluiDado(int $id) {

        }
    }
