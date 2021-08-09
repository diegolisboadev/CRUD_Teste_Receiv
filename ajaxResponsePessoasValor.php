<?php

    require_once "./Dao/CrudDao.class.php";

    header('Content-Type: application/json'); 

    $crudDao = new CrudDao();
    $listaAjaxResponse = $crudDao->ajaxResponseDashPessoasGastos();
    print($listaAjaxResponse);