<?php

//require_once("utilidade/Conexao.php");

//testar a conexao
//$conexao = Conexao::getConexao();
//print_r($conexao);

require_once("modelo/ClientePF.php");
require_once("dao/ClienteDAO.php");

$clienteDAO = new ClienteDAO;


do{
    print "\n***** Cadastro de clientes *****\n";
    print "1-Inserir cliente PF\n";
    print "2-Inserir cliente PJ\n";
    print "3-Listar\n";
    print "4-Buscar\n";
    print "5-Excluir\n";
    print "0-Sair\n";

    $opcao = readline("\nInforme a opcao: \n");

    switch($opcao){
        case 1:
            //inserir
            $clientePF = new ClientePF();
            $clientePF->setNomeCompleto(readline("Informe o nome completo: "));
            $clientePF->setNomeSocial(readline("Informe o nome social: "));
            $clientePF->setCpf(readline("Informe o CPF: "));
            $clientePF->setEmail(readline("Informe o email: "));

            $clienteDAO->inserir($clientePF);

            break;

        case 2:
            //inserir
            $clientePJ = new ClientePJ();
            $clientePJ->setRazaoSocial(readline("Informe a razao social: "));
            $clientePJ->setNomeSocial(readline("Informe o nome social: "));
            $clientePJ->setCnpj(readline("Informe o CNPJ: "));
            $clientePJ->setEmail(readline("Informe o email: "));

            $clienteDAO->inserir($clientePJ);

            break;

        case 3:
            //listar
            $clientes = $clienteDAO->listar();
            foreach ($clientes as $c) {
                print $c . "\n";
            }

            break;

        case 4:

            break;

        case 5:

            break;

        case 0:
            print "Tchau! Obrigado!\n\n";
            break;

        default:
            print "Opcao invalida!\n";
    }

}while ($opcao != 0);