<?php

class NoticiaModel{
    public $id, $titulo, $conteudo, $id_categoria;

    public $lista_categorias = array();

    public $categoria;

    public function save(){
        include 'DAO/NoticiaDAO.php';
        $dao = new NoticiaDAO();

        $dao->insert($this);
    }

    public function getAll(){
        include 'DAO/NoticiaDAO.php';
        $dao = new NoticiaDAO();

        return $dao->getAllRows();
    }

    public function checkCategory($nome_categoria){
        include 'DAO/CategoriaDAO.php';

        $categoria_dao = new CategoriaDAO();
        $qnt_linhas = $categoria_dao->checkCategory($nome_categoria);
        if($qnt_linhas == 0){             
            $categoria_dao->insert($nome_categoria);
            $id_categoria = $categoria_dao->checkID($nome_categoria);
        }else{
            $id_categoria = $categoria_dao->checkID($nome_categoria);            
        }

        return $id_categoria;
    }    

    public function getByID($id){
        include 'DAO/NoticiaDAO.php';
        $dao = new NoticiaDAO();

        return $dao->getByID((int)$id);
    }

    public function deletar($id){       
        include 'DAO/NoticiaDAO.php';
        $dao = new NoticiaDAO();

        $dao->delete($id);
    }

    public function buscar($dados_busca){
        include 'DAO/NoticiaDAO.php';
        $dao = new NoticiaDAO();

        return $dao->buscar($dados_busca);
    }
}