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
        $sql = 'SELECT n.id as id,
                       n.titulo as titulo,
                       n.conteudo as conteudo,
                       cn.nome as categoria         
        FROM noticia n
        JOIN categoria_noticia cn on cn.id = n.id_categoria 
        WHERE n.id = ?';

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function delete($id){
        $sql = 'DELETE FROM noticia WHERE id = ?';
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();        
    }

    public function buscar($dados_busca){

       $dados = "%" . $dados_busca . "%";
        
        $sql = 'SELECT n.id as id,
                       n.titulo as titulo,
                       n.conteudo as conteudo,
                       c.nome as categoria_noticia   
                FROM noticia n 
                JOIN categoria_noticia c on c.id = n.id_categoria
                WHERE n.titulo  LIKE ? or n.conteudo  LIKE  ?  or c.nome LIKE  ?            
        ';

        $stmt = $this->conexao->prepare($sql);  
        $stmt->bindValue(1, $dados);
        $stmt->bindValue(2, $dados);
        $stmt->bindValue(3, $dados);
         
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function update(NoticiaModel $model){
        try{
            $sql = 'UPDATE noticia SET titulo = ?, id_categoria = ?, conteudo = ? WHERE id = ?';

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->titulo);
            $stmt->bindValue(2, $model->id_categoria);
            $stmt->bindValue(3, $model->conteudo);
            $stmt->bindValue(4, $model->id);
            $stmt->execute();
        }catch(Exception $e){
            throw new Exception('Não foi possível atualizar a noticia.');
        }
        
    }
}