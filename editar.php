<?php
    require_once "./Dao/CrudDao.class.php";
    require_once "./Models/Devedor.class.php";

    session_start();

    if((string) in_array($_SERVER['REQUEST_METHOD'], ['POST'])) {

        $dados = filter_input_array(INPUT_POST, [
            "idc" => FILTER_SANITIZE_FULL_SPECIAL_CHARS | FILTER_VALIDATE_INT |FILTER_SANITIZE_NUMBER_INT,
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

        // Instância CrudDao // TODO MENSAGENS DE RETORNO (REDIRECT)
        $crud = new CrudDao();
        if($crud->editarDados($devedor, $dados['idc'])) {
            $_SESSION['msg'] = 'Devedor(a) Alterado(a) com Sucesso!';
            //header("Location: index.php");
        } else {
            $_SESSION['msg'] = 'Devedor(a) Alterado(a) com Sucesso!';
            //header("Location: index.php");
        }
       
    } else {
        print('Erro ao Editar o Cliente/Devedor!');
    }