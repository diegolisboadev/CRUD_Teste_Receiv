<?php

    require_once "./Dao/CrudDao.class.php";

    header('Content-Type: application/json'); 

    $crudDao = new CrudDao();
    $listaDados = $crudDao->listaDados(['id', 'nome', 'cpf_cnpj', 'descricao', 'valor', 'dt_vencimento', 'created_at'], 'devedores');
    print($listaDados);

    /*$listaDadosArray = array_map(function($item) {
        return [
            'id' => $item,
            'nome' => $item->nome,
            'cpf_cnpj' => $item->cpf_cnpj,
            'descricao' => $item->descricao,
            'valor' => $item->valor,
            'dt_vencimento' => $item->dt_vencimento,
            'created_at' => $item->created_at
        ];
    }, (array) $listaDados['resultado']);

    print(json_encode($listaDadosArray));*/