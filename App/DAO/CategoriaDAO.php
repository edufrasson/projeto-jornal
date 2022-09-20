<?php

namespace App\DAO;
use \FFI\Exception;


class CategoriaDAO extends DAO{
    public $conexao;

    public function __construct()
    {
        try{            
            return parent::__construct();
        }catch(Exception $e){
            echo 'Não foi possível conectar ao banco de dados, erro: ' . $e->getMessage();
        }        
    }

    public function insert($nome_categoria){
        try{
            $sql = 'INSERT INTO categoria_noticia(nome) VALUES (?)';

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $nome_categoria);
            $stmt->execute();
        }catch(Exception $e){
            echo 'Não foi possível cadastrar a categoria, erro: ' . $e->getMessage();
        }                       
    }

    public function checkID($nome_categoria){
        try{
            $sql = 'SELECT id FROM categoria_noticia WHERE nome = ?';

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $nome_categoria);
            $stmt->execute();

            $id = $stmt->fetchObject();
            return $id;

        }catch(Exception $e){
            echo 'Não foi possível checar a categoria, erro: ' . $e->getMessage();
        }          
    }

    public function checkCategory($nome_categoria){
        try{
            $sql = 'SELECT * FROM categoria_noticia WHERE nome = ?';

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $nome_categoria);
            $stmt->execute();

            $array_categorias = array();

            while($categoria = $stmt->fetchObject())
                $array_categorias[] = $categoria;
            
            $qnt_linhas = count($array_categorias);
            return $qnt_linhas;

        }catch(Exception $e){
            echo 'Não foi possível checar a categoria, erro: ' . $e->getMessage();
        }        
    }
}