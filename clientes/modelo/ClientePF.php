<?php

require_once("Cliente.php");

class ClientePF extends Cliente{

    private string $nomeCompleto;
    private string $cpf;

    public function getNome(){
        return $this->nomeCompleto;
    }

    public function getNroDoc(){
        return $this->cpf;
    }

    public function getTipo(){
        return "F";
    }

    /**
     * Get the value of nomeCompleto
     */
    public function getNomeCompleto(): string
    {
        return $this->nomeCompleto;
    }

    /**
     * Set the value of nomeCompleto
     */
    public function setNomeCompleto(string $nomeCompleto): self
    {
        $this->nomeCompleto = $nomeCompleto;

        return $this;
    }

    /**
     * Get the value of cpf
     */
    public function getCpf(): string
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     */
    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }
}