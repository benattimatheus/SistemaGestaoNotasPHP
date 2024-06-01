<?php

class Aluno
{
    private int $ra;

    private string $nome;

    private string $email;

    public function __construct(int $ra, string $nome, string $email)
    {
        $this->ra = $ra;
        $this->nome = $nome;
        $this->email = $email;
    }   

    public function getRA(): int
    {
        return $this->ra;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

}