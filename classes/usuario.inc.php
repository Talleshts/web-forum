<?php

class Usuario
{
    private $email;
    private $login;
    private $nome;
    private $senha;

    // Email e Login serão iguais

    function __construct($email, $nome, $senha)
    {
        $this->email = $email;
        $this->login = $email;
        $this->nome = $nome;
        $this->senha = $senha;
    }

    function __get($atributo)
    {
        return $this->$atributo;
    }

    function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
}
