<?php

    require_once "./Dao/CrudDao.class.php";

    session_start();

    header('Content-Type: application/json'); 

    if((string) in_array($_SERVER['REQUEST_METHOD'], ['POST'])) {

        $dados = filter_input_array(INPUT_POST, [
            "idc" => FILTER_VALIDATE_INT | FILTER_SANITIZE_NUMBER_INT | FILTER_SANITIZE_FULL_SPECIAL_CHARS
        ]);

        $crudDao = new CrudDao();
       
        if($crudDao->excluiDados($dados['idc'], 'devedores')) {
            $_SESSION['resultado'] = '<div class="alert alert-success mx-auto alert-msg font-bold">Devedor(a) Excluído(a) com Sucesso!</div>';
            header("Location: index.php");
        } else {
            $_SESSION['resultado'] = '<div class="alert alert-danger mx-auto alert-msg font-bold">Erro ao Excluir Devedor(a)!</div>';
            header("Location: index.php");
        }

    } else {
        print('Erro ao Buscar Dados do Cliente Devedor!');
    }