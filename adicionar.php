<?php
    require_once "./Dao/CrudDao.class.php";
    require_once "./Models/Devedor.class.php";

    session_start();

    if((string) in_array($_SERVER['REQUEST_METHOD'], ['POST'])) {

        $dados = filter_input_array(INPUT_POST, [
            "nome" => FILTER_SANITIZE_STRING,
            "cpf_cnpj" => FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            "dt_nascimento" => FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            "endereco" => FILTER_SANITIZE_STRING,
            "descricao" => FILTER_SANITIZE_STRING,
            "valor" => FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS,
            "dt_vencimento" => FILTER_SANITIZE_STRING | FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        ]);

        // Instância de Devedor
        $devedor = new Devedor();
        $devedor->setNome($dados['nome']);
        $devedor->setCpfCnpj($dados['cpf_cnpj']);
        $devedor->setDataNascimento($dados['dt_nascimento']);
        $devedor->setEndereco($dados['endereco']);
        $devedor->setDescricao($dados['descricao']);
        $devedor->setDataVencimento($dados['dt_vencimento']);
        $devedor->setValor($dados['valor']);

        // Instância CrudDao
        $crud = new CrudDao();
        if($crud->insereDados($devedor)) {
            $_SESSION['resultado'] = '<div class="alert alert-success mx-auto alert-msg font-bold">Devedor(a) Salvo(a) com Sucesso!</div>';
            header("Location: index.php");
        } else {
            $_SESSION['resultado'] = '<div class="alert alert-danger mx-auto alert-msg font-bold">Erro ao Salvar Devedor(a)!</div>';
            header("Location: index.php");
        }

        exit();
       
        
    } else {
        print('Erro ao Salvar o Cliente/Devedor!');
    }