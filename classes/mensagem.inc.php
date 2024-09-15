<?php

class Mensagem
{
    public $id;
    public $remetente;
    public $destinatario;
    public $data;
    public $conteudo;
    public $titulo;
    public $assunto;

    function __construct() {}

    function criarMensagem($remetente, $destinatario, $conteudo, $titulo, $assunto)
    {
        $this->remetente = $remetente;
        $this->destinatario = $destinatario;
        $this->conteudo = $conteudo;
        $this->titulo = $titulo;
        $this->assunto = $assunto;
        $this->data = new DateTime();
        $this->data = $this->data->format('Y-m-d H:i:s');
    }

    function setMensagem($id, $remetente, $destinatario, $data, $conteudo, $titulo, $assunto)
    {
        $this->id = $id;
        $this->remetente = $remetente;
        $this->destinatario = $destinatario;
        $this->data = new DateTime($data);
        $this->data = $this->data->format('d-m-Y H:i:s');
        $this->conteudo = $conteudo;
        $this->titulo = $titulo;
        $this->assunto = $assunto;
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
