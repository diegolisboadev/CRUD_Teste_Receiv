<?php

    require_once $_SERVER['DOCUMENT_ROOT']."/Database/Conexao.class.php";

    class CrudDao {

        private $conn;
         
        public function __construct()
        {
            $this->conn = Conexao::getConexao();
        }

        /**
         * Insere os Dados do Devedor Cliente
         * 
         * @param Model $devedor
         * 
         * @return bool 
         * @return PDOException $e
         */
        public function insereDados(Devedor $devedor) {
            try {

                $dev = $this->conn->prepare('INSERT INTO devedores 
                        (nome, cpf_cnpj, dt_nascimento, endereco,
                        descricao, valor, dt_vencimento, created_at, updated_at)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
                $dev->bindParam(1, $devedor->getNome());
                $dev->bindParam(2, $devedor->getCpfCnpj());
                $dev->bindParam(3, $devedor->getDataNascimento());
                $dev->bindParam(4, $devedor->getEndereco());
                $dev->bindParam(5, $devedor->getDescricao());
                $dev->bindParam(6, $devedor->getValor());
                $dev->bindParam(7, $devedor->getDataVencimento());
                $dev->bindParam(8, (new \DateTime())->format('Y-m-d H:i:s'));
                $dev->bindParam(9, (new \DateTime())->format('Y-m-d H:i:s'));
       
                return $dev->execute() != true ? false : true;

            } catch(PDOException $e) {
                return $e->getMessage();
            }
        }

        /**
         * Insere os Dados do Devedor Cliente
         * 
         * @param Model $devedor
         * @param int $id
         * 
         * @return bool 
         * @return PDOException $e
         */
        public function editarDados(Devedor $devedor, int $id) {
            try {

                print_r($devedor);

                $dev = $this->conn->prepare('
                        UPDATE devedores 
                        SET nome=?, cpf_cnpj=?, dt_nascimento=?, endereco=?, descricao=?, valor=?,
                        dt_vencimento=?, updated_at=?
                        WHERE id = ?');

                print((new \DateTime())->format('Y-m-d H:i:s'));

                $dev->bindParam(1, $devedor->getNome());
                $dev->bindParam(2, $devedor->getCpfCnpj());
                $dev->bindParam(3, $devedor->getDataNascimento());
                $dev->bindParam(4, $devedor->getEndereco());
                $dev->bindParam(5, $devedor->getDescricao());
                $dev->bindParam(6, $devedor->getValor());
                $dev->bindParam(7, $devedor->getDataVencimento());
                $dev->bindParam(8, (new \DateTime())->format('Y-m-d H:i:s'));
                $dev->bindParam(9, $id);
       
                return $dev->execute() != true ? false : true;

            } catch(PDOException $e) {
                return $e->getMessage();
            }
        }


        /**
         * Lista os dados do ClienteDevedor
         * 
         * @param array $campos
         * @param string $table
         * 
         * @return string json_encode()
         */
        public function listaDados(array $campos = ['*'], string $table) {
            try {

                $campos = implode(',', $campos);
                $stmt = $this->conn->prepare("SELECT {$campos} FROM {$table}");
                
                if($stmt->execute()) {
                    return json_encode(['info' => true, 'resultado' => $stmt->fetchAll(PDO::FETCH_ASSOC)], true);
                } else {
                    return json_encode(['info' => false, 'resultado' => "Erro na Consulta! Tente Novamente!"], true);
                }

            } catch(PDOException $e) {
                return json_encode(['info' => false, 'resultado' => "Erro Interno ".$e->getMessage()]);
            }
        }

        /**
         * Retorna o dado de um cliente devedor
         * 
         * @param int $id
         * @param array $campos
         * @param string $table
         * 
         * @return string json_encode()
         */
        public function listaDadosId(int $id, string $table, array $campos = ['*']) {
            try {

                $campos = implode(',', $campos);
                $stmt = $this->conn->prepare("SELECT {$campos} FROM {$table} WHERE id = {$id}");

                if($stmt->execute()) {
                    return json_encode(['info' => true, 'resultado' => $stmt->fetch(PDO::FETCH_ASSOC)], true);
                } else {
                    return json_encode(['info' => false, 'resultado' => "Erro na Consulta! Tente Novamente!"], true);
                }

            } catch(PDOException $e) {
                return json_encode(['info' => false, 'resultado' => $e->getMessage()]);
            }
        }

        /**
         * Excluir um cliente/devedor
         * 
         * @param int $id
         * @param string $table
         * 
         * @return string json_encode()
         */
        public function excluiDados(int $id, string $table) {
            try {

                $stmt = $this->conn->prepare("DELETE FROM {$table} WHERE id = {$id}");

                return $stmt->execute() != true ? false : true;

            } catch(PDOException $e) {
                return json_encode(['info' => false, 'resultado' => $e->getMessage()]);
            }
        }

        /**
         * 
         */
        public function ajaxResponseDashPessoasGastos() {
            try {
                $stmt = $this->conn->prepare("SELECT nome, valor FROM devedores");
                
                if($stmt->execute()) {
                    return json_encode(['info' => true, 'resultado' => $stmt->fetchAll(PDO::FETCH_ASSOC)], true);
                } else {
                    return json_encode(['info' => false, 'resultado' => "Erro na Consulta! Tente Novamente!"], true);
                }

            } catch(PDOException $e) {
                return json_encode(['info' => false, 'resultado' => "Erro Interno ".$e->getMessage()]);
            }
        }
    }
