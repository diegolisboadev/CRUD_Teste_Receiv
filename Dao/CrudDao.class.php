<?php

    require_once $_SERVER['DOCUMENT_ROOT']."/Database/Conexao.class.php";

    class CrudDao {

        private $conn;
         
        public function __construct()
        {
            $this->conn = Conexao::getConexao();
        }

        /**
         * 
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
         * 
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

                /*while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    var_dump($row);
                }*/

            } catch(PDOException $e) {
                return json_encode(['info' => false, 'resultado' => "Erro Interno ".$e->getMessage()]);
            }
        }

        /**
         * 
         */
        public function listaDadosId(int $id, array $campos = ['*'], string $table) {
            try {

                $campos = implode(',', $campos);
                $stmt = $this->conn->prepare("SELECT {$campos} FROM {$table} WHERE $id = {$id}");

                if($stmt->execute()) {
                    return json_encode(['info' => true, 'resultado' => $stmt->fetch(PDO::FETCH_ASSOC)], true);
                } else {
                    return json_encode(['info' => false, 'resultado' => "Erro na Consulta! Tente Novamente!"], true);
                }

                /*while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    var_dump($row);
                }*/

            } catch(PDOException $e) {
                return json_encode(['info' => false, 'resultado' => $e->getMessage()]);
            }
        }

        /**
         * 
         */
        public function excluiDado(int $id) {

        }
    }