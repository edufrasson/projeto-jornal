<?php

namespace App\Controller;
use App\Model\LoginModel;
use FFI\Exception;

class LoginController extends Controller{

    public static function index(){
        parent::render('Login/Login');
    }

    public static function form(){
        parent::render('Login/FormUsuario');
    }

    public static function save(){                  
        try{
            $model = new LoginModel(); 

            $model->nome = $_POST['nome'];
            $model->email = $_POST['email'];
            $model->senha = $_POST['senha'];
            
          
            $model->save();

            header("Location: /form");

        }catch(Exception $e){
            echo 'Erro: ' . $e->getMessage();
        }
        
    }

    public static function auth(){
        $model = new LoginModel();

        $model->email = $_POST['email'];
        $model->senha = $_POST['senha'];

        $usuario_logado = $model->autenticar();

        if($usuario_logado !== null){
            $_SESSION['usuario_logado'] = $usuario_logado;
            header("Location: /home");
        }else{
            header("Location: /login?erro=true");
        }
    }

    public static function logout()
    {
        unset($_SESSION['usuario_logado']);

        parent::isAuthenticated();
    }
}