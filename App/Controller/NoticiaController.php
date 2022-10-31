<?php

namespace App\Controller;

use App\Model\NoticiaModel;
use FFI\Exception;

class NoticiaController extends Controller{
    public static function form(){
        parent::isAuthenticated();
        parent::render("Noticia/CadastrarNoticia");        
    }

    public static function save(){                  
        try{
            $model = new NoticiaModel();

            $nome_categoria = $_POST['categoria'];
        
            
            $id_categoria = $model->checkCategory($nome_categoria);

            $model->id_categoria = $id_categoria->id;
            $model->titulo = $_POST['titulo'];
            $model->conteudo = $_POST['conteudo'];
            
            if (isset($_POST['id'])){
                $model->id = $_POST['id'];    
            }else{
                $model->id = null;
            }

            $model->save();

            header("Location: /form");

        }catch(Exception $e){
            echo 'Erro: ' . $e->getMessage();
        }
        
    }

    public static function index(){       

        try{
            $model = new NoticiaModel();

            $dados_noticia = $model->getAll();       
    
            parent::render("Noticia/ExibirNoticia", $dados_noticia);
            
        }catch(Exception $e){
            echo 'Erro: ' . $e->getMessage();
        }
        
    }

    public static function ver(){        

        $model = new NoticiaModel();

        if(isset($_GET['id'])){            
            $dados_noticia = $model->getByID($_GET['id']);

            parent::render("Noticia/CadastrarNoticia", $dados_noticia);
        }else{
            echo 'Não foi possível editar a notícia.';
        }       
    }

    public static function deletar(){        
        
        $model = new NoticiaModel();    

        if(isset($_GET['id'])){
            $model->deletar($_GET['id']);
            header("Location: /home");
        }            
        else
            echo '<script>alert(Erro ao deletar a notícia.)</script>';
    }

    public static function buscar(){
        
        $model = new NoticiaModel();          
        
        if(isset($_GET['query'])){
            $dados_noticia = $model->buscar($_GET['query']);
            parent::render("Noticia/ExibirNoticia", $dados_noticia);
        }else
            echo '<script>alert(Erro ao buscar a notícia.)</script>';    
    }
}