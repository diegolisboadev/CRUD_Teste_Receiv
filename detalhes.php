<?php

    require_once "./Dao/CrudDao.class.php";

    header('Content-Type: application/json'); 

    if((string) in_array($_SERVER['REQUEST_METHOD'], ['GET'])) {

        $dados = filter_input_array(INPUT_GET, [
            "idc" => FILTER_VALIDATE_INT | FILTER_SANITIZE_NUMBER_INT | FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);

        $crudDao = new CrudDao();
        $listaDadosId = $crudDao->listaDadosId($dados['idc'], 'devedores');
        print($listaDadosId);

    } else {
        print('Erro ao Buscar Dados do Cliente Devedor!');
    }