<?php

class NoticiaController{
    public static function save(){
        include 'Model/NoticiaModel.php';
        include 'Model/CategoriaModel.php';
        include 'DAO/CategoriaDAO.php';       

        $categoria_model = new CategoriaModel();
        $categoria_dao = new CategoriaDAO();

        $nome_categoria = $_POST['categoria'];
        $qnt_linhas = $categoria_dao->checkCategory($nome_categoria);
        if($qnt_linhas == 0){             
            $categoria_dao->insert($nome_categoria);
            $id_categoria = $categoria_dao->checkID($nome_categoria);
        }else{
            $id_categoria = $categoria_dao->checkID($nome_categoria);            
        }       

        $model = new NoticiaModel();

        $model->id_categoria = $id_categoria->id;
        $model->titulo = $_POST['titulo'];
        $model->conteudo = $_POST['conteudo'];

        $model->save();

        header("Location: /form");
    }
}