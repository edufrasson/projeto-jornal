<?php

namespace App\Model;

use App\DAO\LoginDAO;
use FFI\Exception;

class LoginModel{
    public $id, $nome, $email, $senha;

    public function save(){
        $dao = new LoginDAO();
        try{
            if($this->id == null){
                $dao->insert($this);
            }            
            else{
                $dao->update($this);
            }
        }catch(Exception $e){
            echo 'Não foi possível salvar a notícia, erro: ' . $e->getMessage();
        }                     
    }

    public function autenticar(){
        $dao = new LoginDAO();

        $dados_usuario_logado = $dao->selectByEmailAndSenha($this->email, $this->senha);
        if(is_object($dados_usuario_logado))
            return $dados_usuario_logado;
        else
            null;    
    }

    
}