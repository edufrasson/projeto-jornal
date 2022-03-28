<?php

class CategoriaDAO{
    public $conexao;

    public function __construct()
    {
        include_once 'MySQL.php';

        $this->conexao = new MySQL();
    }

    public function insert($nome_categoria){
        $sql = 'INSERT INTO categoria_noticia(nome) VALUES (?)';

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $nome_categoria);
        $stmt->execute();               
    }

    public function checkID($nome_categoria){
        $sql = 'SELECT id FROM categoria_noticia WHERE nome = ?';

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $nome_categoria);
        $stmt->execute();

        $id = $stmt->fetchObject();
        return $id;  
    }

    public function checkCategory($nome_categoria){
        $sql = 'SELECT * FROM categoria_noticia WHERE nome = ?';

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $nome_categoria);
        $stmt->execute();

        $array_categorias = array();

        while($categoria = $stmt->fetchObject())
            $array_categorias[] = $categoria;
        
        $qnt_linhas = count($array_categorias);
        return $qnt_linhas;
    }
}