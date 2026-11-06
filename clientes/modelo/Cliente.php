<?php

abstract class Cliente{
    protected int $id;
    protected string $nomeSocial;
    protected string $email;

    public abstract function getNome();
    public abstract function getNroDoc();
    public abstract function getTipo();

    public function __toString(){
        $dados = sprintf("ID: %d | Cliente tipo: %s | Nome social: %s | Email: %s | Nome: %s | Outro: %s", $this->id, $this->getTipo(), $this->nomeSocial, $this->email, $this->getNome(), $this->getNroDoc());

        return $dados;
    }
    

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nomeSocial
     */
    public function getNomeSocial(): string
    {
        return $this->nomeSocial;
    }

    /**
     * Set the value of nomeSocial
     */
    public function setNomeSocial(string $nomeSocial): self
    {
        $this->nomeSocial = $nomeSocial;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }
}