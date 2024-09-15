<?php

require_once '../classes/usuario.inc.php';
require_once 'conexao.inc.php';

class UsuarioDao
{
    private $con;
    function __construct()
    {
        $c = new Conexao();
        $this->con = $c->getConexao();
    }

    public function cadastrarUsuario($email, $nome, $hashSenha)
    {
        $cadastroRealizado = false;

        $sqlVerificaEmail = $this->con->prepare("SELECT * FROM usuario WHERE email =:email");
        $sqlVerificaEmail->bindValue(':email', $email);
        $sqlVerificaEmail->execute();
        if ($sqlVerificaEmail->rowCount() == 0) {
            $sql = $this->con->prepare("INSERT INTO usuario (email, login, nome, senha) VALUES (:email, :email, :nome, :senha)");
            $sql->bindValue(':email', $email);
            $sql->bindValue(':nome', $nome);
            $sql->bindValue(':senha', $hashSenha);
            $sql->execute();
            $cadastroRealizado = true;
        }

        return $cadastroRealizado;
    }

    public function autenticarUsuario($email, $senha)
    {
        $sql = $this->con->prepare("SELECT * FROM usuario WHERE email =:email");
        $sql->bindValue(':email', $email);
        $sql->execute();

        $usuario = null;

        if ($sql->rowCount() == 1) {
            $usuarioResponse = $sql->fetch(PDO::FETCH_ASSOC);
            $usuario = new Usuario(
                $usuarioResponse['email'],
                $usuarioResponse['nome'],
                $usuarioResponse['senha']
            );

            if (password_verify($senha, $usuario->senha)) {
                return $usuario;
            }
        }

        return $usuario;
    }

    public function obterTodosUsuarios()
    {
        $sql = $this->con->query("SELECT idUsuario, email, nome FROM usuario");
        $usuarioResponse = $sql->fetchAll(PDO::FETCH_ASSOC);

        $usuarios = [];

        foreach ($usuarioResponse as $us) {
            $usuario = new Usuario();
            $usuario->setUsuario($us['idUsuario'], $us['email'], $us['nome']);
            $usuarios[] = $usuario;
        }

        return $usuarios;
    }

    public function excluirUsuario($id)
    {
        $sql = $this->con->prepare("DELETE FROM clientes WHERE id =:id");
        $sql->bindValue(':id', $id);
        $sql->execute();
    }
}
