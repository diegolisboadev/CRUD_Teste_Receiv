<?php

    class Devedor {

        private $nome;
        private $cpfCnpj;
        private $dataNascimento;
        private $endereco;
        private $descricao;
        private $valor;
        private $dataVencimento;


        public function getNome() {
            return $this->nome;
        }

        public function getCpfCnpj() {
            return $this->cpfCnpj;
        }

        public function getDataNascimento() {
            return $this->dataNascimento;
        }

        public function getEndereco() {
            return $this->endereco;
        }


        public function getDescricao() {
            return $this->descricao;
        }

        public function getValor() {
            return $this->valor;
        }

        public function getDataVencimento() {
            return $this->dataVencimento;
        }

        public function setNome($nome) {
            return $this->nome = $nome;
        }

        public function setCpfCnpj($cpfCnpj) {
            return $this->cpfCnpj = $cpfCnpj;
        }

        public function setDataNascimento($dataNascimento) {
            return $this->dataNascimento = date('Y-m-d', strtotime($dataNascimento));
        }

        public function setEndereco($endereco) {
            return $this->endereco = $endereco;
        }

        public function setDescricao($descricao) {
            return $this->descricao = $descricao;
        }

        public function setValor($valor) {
            return $this->valor = (float) str_replace(',', '.', $valor);
        }

        public function setDataVencimento($dataVencimento) {
            return $this->dataVencimento = date('Y-m-d', strtotime($dataVencimento));
        } 
    }