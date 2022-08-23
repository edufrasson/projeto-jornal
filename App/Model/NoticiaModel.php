<?php

namespace App\Model;

use App\DAO\NoticiaDAO;
use App\DAO\CategoriaDAO;
use FFI\Exception;


class NoticiaModel{
    public $id, $titulo, $conteudo, $id_categoria;

    public $lista_categorias = array();

    public $categoria;

    public function save(){
        $dao = new NoticiaDAO();
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

    public function getAll(){
        $dao = new NoticiaDAO();

        return $dao->getAllRows();
    }

    public function checkCategory($nome_categoria){       
        try{
            $categoria_dao = new CategoriaDAO();
            $qnt_linhas = $categoria_dao->checkCategory($nome_categoria);
            if($qnt_linhas == 0){             
                $categoria_dao->insert($nome_categoria);
                $id_categoria = $categoria_dao->checkID($nome_categoria);
            }else{
                $id_categoria = $categoria_dao->checkID($nome_categoria);            
            }

            return $id_categoria;
        }catch(Exception $e){
            echo 'Não foi possivel checar a categoria, erro: ' . $e->getMessage();
        }        
    }    

    public function getByID($id){
        $dao = new NoticiaDAO();

        return $dao->getByID((int)$id);
    }

    public function deletar($id){       
        $dao = new NoticiaDAO();

        $dao->delete($id);
    }

    public function buscar($dados_busca){
        $dao = new NoticiaDAO();

        return $dao->buscar($dados_busca);
    }
}