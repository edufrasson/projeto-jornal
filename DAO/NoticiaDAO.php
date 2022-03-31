<?php

class NoticiaDAO{
    public $conexao;

    public function __construct()
    {
        include_once 'MySQL.php';
        $this->conexao = new MySQL();
    }

    public function insert(NoticiaModel $model){
        $sql = 'INSERT INTO noticia(titulo, conteudo, id_categoria) VALUES (?, ?, ?)';

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->titulo);
        $stmt->bindValue(2, $model->conteudo);
        $stmt->bindValue(3, $model->id_categoria);

        $stmt->execute();
    }

    public function getAllRows(){
        $sql = 'SELECT * FROM noticia';

        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();       

        return $stmt->fetchAll(PDO::FETCH_CLASS);    
    }

    public function getByID($id){
        $sql = 'SELECT * FROM noticia WHERE id = ?';

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function delete($id){
        $sql = 'DELETE FROM noticia WHERE id = ?';
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();        
    }

}