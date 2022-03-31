<?php

class NoticiaController{
    public static function save(){
        include 'Model/NoticiaModel.php';            
    
        $model = new NoticiaModel();

        $nome_categoria = $_POST['categoria'];
      
        
        $id_categoria = $model->checkCategory($nome_categoria);

        $model->id_categoria = $id_categoria->id;
        $model->titulo = $_POST['titulo'];
        $model->conteudo = $_POST['conteudo'];

        $model->save();

        header("Location: /form");
    }

    public static function index(){
        include 'Model/NoticiaModel.php';

        $model = new NoticiaModel();

        $dados_noticia = $model->getAll();

        include 'Views/modules/Noticia/ExibirNoticia.php';
    }

    public static function ver(){
        include 'Model/NoticiaModel.php';

        $id = $_GET['id'];

        $dados_noticia = $model->getByID($id);

        include 'Views/modules/Noticia/VerNoticia.php';
    }

    public static function deletar(){
        include 'Model/NoticiaModel.php';
        
        $model = new NoticiaModel();    
        
        $model->deletar($_GET['id']);

        header("Location: /home");
    }
}