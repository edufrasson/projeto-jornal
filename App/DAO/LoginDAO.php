<?php

namespace App\DAO;
use App\Model\LoginModel;
use FFI\Exception;

class LoginDAO extends DAO{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(LoginModel $model){
        try{
            $sql = 'INSERT INTO usuario(nome, email, senha) VALUES (?, ?, sha1(?))';

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->nome);
            $stmt->bindValue(2, $model->email);
            $stmt->bindValue(3, $model->senha);

            $stmt->execute();

        }catch(Exception $e){
            echo 'Não foi possível cadastrar o usuario, erro: ' . $e->getMessage();
        }        
    }

    public function selectByEmailAndSenha($email, $senha)
    {
        $sql = "SELECT * FROM usuario WHERE email = ? AND senha = sha1(?) ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $email);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        return $stmt->fetchObject("App\Model\LoginModel"); 
    }

    public function update(){
        
    }
}