<?php

require_once("modelo/Cliente.php");
require_once("modelo/ClientePF.php");
require_once("modelo/ClientePJ.php");
require_once("utilidade/Conexao.php");

class ClienteDAO{
    public function inserir(Cliente $cliente){
        //todo - persistir o objeto $cliente no banco de dados
        $sql = "INSERT INTO clientes (tipo, nome_social, email, nome_completo, cpf, razao_social, cnpj) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $conexao = Conexao::getConexao();
        $stm = $conexao->prepare($sql);
        if($cliente instanceof ClientePF){
            $stm->execute(array(
                $cliente->getTipo(),
                $cliente->getNomeSocial(),
                $cliente->getEmail(),
                $cliente->getNomeCompleto(),
                $cliente->getCpf(),
                null,
                null
            ));

        }else if($cliente instanceof ClientePJ){
            $stm->execute(array(
                $cliente->getTipo(),
                $cliente->getNomeSocial(),
                $cliente->getEmail(),
                null,
                null,
                $cliente->getRazaoSocial(),
                $cliente->getCnpj()
            ));
        }
        
    }

    public function listar(){
        $sql = "SELECT * FROM clientes";

        $conexao = Conexao::getConexao();
        $stm = $conexao->prepare($sql);
        $stm->execute();
        $dados = $stm->fetchAll();

        $clientes = $this->mapear($dados);

        return $clientes;

    }

    private function mapear(array $dados): array{
        $clientes = array();

        foreach($dados as $d){
            $tipo = $d['tipo'];
            $cliente = null;

            if ($tipo == "F") {
                $cliente = new ClientePF();
                $cliente->setNomeCompleto($d["nome_completo"]);
                $cliente->setCpf($d["cpf"]);

            }else if($tipo == "J"){
                $cliente = new ClientePJ();
                $cliente->setRazaoSocial($d["razao_social"]);
                $cliente->setCnpj($d["cnpj"]);

            }else
                continue;

            $cliente->setId($d["id"]);
            $cliente->setNomeSocial($d["nome_social"]);
            $cliente->setEmail($d["email"]);

            array_push($clientes, $cliente);

        }

        return $clientes;
    }
}