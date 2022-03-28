<?php

class NoticiaModel{
    public $titulo, $conteudo, $id_categoria;

    public function save(){
        include 'DAO/NoticiaDAO.php';
        $dao = new NoticiaDAO();

        $dao->insert($this);
    }
}