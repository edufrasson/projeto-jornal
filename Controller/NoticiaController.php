<?php

class NoticiaController{
    public static function form(){
        include 'Views/modules/Noticia/CadastrarNoticia.php';
    }

    public static function save(){                  
    
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
    }

    public static function index(){       

        $model = new NoticiaModel();

        $dados_noticia = $model->getAll();       

        include 'Views/modules/Noticia/ExibirNoticia.php';
    }

    public static function ver(){        

        $model = new NoticiaModel();

        $id = $_GET['id'];

        $dados_noticia = $model->getByID($id); 

        include 'Views/modules/Noticia/CadastrarNoticia.php';
    }

    public static function deletar(){        
        
        $model = new NoticiaModel();    
        
        $model->deletar($_GET['id']);

        header("Location: /home");
    }

    public static function buscar(){
        
        $model = new NoticiaModel();          
        
        $query = $_GET['query'];

        $dados_noticia = $model->buscar($query);                     
        
        include 'Views/modules/Noticia/ExibirNoticia.php';
        
    }
}