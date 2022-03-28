<?php

class CategoriaModel{
    public $nome;

    function save(){
        include 'DAO/CategoriaDAO.php';
        $dao = new CategoriaDAO;
    }
}