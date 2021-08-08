<?php

    require_once "./Dao/CrudDao.class.php";

    header('Content-Type: application/json'); 

    $crudDao = new CrudDao();
    $listaDados = $crudDao->listaDados(['nome', 'cpf_cnpj'], 'devedores');
    print($listaDados);