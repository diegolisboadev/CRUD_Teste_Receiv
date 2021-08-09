<?php

    require_once "./Dao/CrudDao.class.php";

    header('Content-Type: application/json'); 

    $crudDao = new CrudDao();
    $listaDados = $crudDao->listaDados(['id', 'nome', 'cpf_cnpj', 'descricao', 'valor', 'dt_vencimento', 'created_at'], 'devedores');
    print($listaDados);