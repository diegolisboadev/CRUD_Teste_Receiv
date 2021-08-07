<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro Devedores e Dívidas</title>
    <link rel="icon" href="assets/images/devedores_dividas.jpeg" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
</head>
<body>

    <div class="container text-center mt-3">
        <h2 class="font-weight-bold">
        <img class="rounded w-15 h-15 img-fluid img-circle shadow" src="assets/images/devedores_dividas.jpeg" alt="Devedores Logo">
            CRUD Devedores e Dívidas
        </h2>
        <hr>
    </div>

    <div class="container mt-5 mb-5">

        <!-- Cadastro dos Devedores e Dividas -->
        <div class="card">
            <h5 class="card-header"><i class="fa fa-users fa-1x"></i>&nbsp;Cadastro Devedores/Dívidas</h5>
            <div class="card-body">
                    
                    <form action="" method="" accept-charset="utf-8">
                        <div class="row mb-3">
                            <div class="col-md-4 col-sm-4">
                                <label for="nome">Devedor</label>
                                <input id="nome" type="text" class="form-control" name="nome" placeholder="Ex. João Nascimento">
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <label for="cpf_cnpj">CPF/CNPJ</label>
                                <input id="cpf_cnpj" type="text" class="form-control" name="cpf_cnpj" placeholder="">
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <label for="dt_nascimento">Data Nascimento</label>
                                <input id="dt_nascimento" type="text" class="form-control" name="dt_nascimento" placeholder="00/00/0000">
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <label for="endereco">Endereço</label>
                                <input id="endereco" type="text" class="form-control" name="endereco" placeholder="Ex. Rua Zero">
                            </div>
                        </div>

                        <div>
                            <button href="#" class="btn btn-primary justify-content-right">Salvar</button>
                        </div>

                    </form>

            </div>
        </div>

        <!-- Listagem dos Devedores -->
        <div class="card mt-5">
            <h5 class="card-header"><i class="fa fa-list fa-1x"></i>&nbsp;Listagem Devedores/Dívidas</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead class="table-dark text-center">
                            <th>#</th>
                            <th>Nome</th>
                            <th>Dívida</th>
                            <th>Data Criação</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <tr class="text-center">
                                <td>1</td>
                                <td>XXXXX</td>
                                <td>XXXXX</td>
                                <td>XX/XX/XXXX</td>
                                <td>
                                    <button type="button" class="btn btn-outline-secondary" title="Info"><i class="fa fa-info fa-1x"></i></button>
                                    &emsp;
                                    <button type="button" class="btn btn-outline-info" title="Editar"><i class="fa fa-edit fa-1x"></i></button>
                                    &emsp;
                                    <button type="button" class="btn btn-outline-danger" title="Excluir"><i class="fa fa-trash fa-1x"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/imask"></script>
    <script src="assets/js/style.min.js"></script>
</body>
</html>