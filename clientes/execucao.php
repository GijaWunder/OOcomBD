<?php

//require_once("utilidade/Conexao.php");

//testar a conexao
//$conexao = Conexao::getConexao();
//print_r($conexao);

require_once("modelo/ClientePF.php");


do{
    print "\n\n***** Cadastro de clientes *****\n";
    print "1-Inserir cliente PF\n";
    print "0-Sair\n";

    $opcao = readline("Informe a opcao: ");

    switch($opcao){
        case 1:
            //inserir
            $clientePF = new ClientePF();
            $clientePF->setNomeCompleto(readline("Informe o nome completo: "));
            $clientePF->setNomeSocial(readline("Informe o nome social: "));
            $clientePF->setCpf(readline("Informe o CPF: "));
            $clientePF->setEmail(readline("Informe o email: "));

            break;

        case 0:
            "Tchau! Obrigado!";
            break;

        default:
            "Opcao invalida!";
    }

}while ($opcao != 0);