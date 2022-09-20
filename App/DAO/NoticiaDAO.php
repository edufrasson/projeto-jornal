<?php

namespace App\DAO;

use App\DAO\MySQL;
use App\Model\NoticiaModel;
use FFI\Exception;
use \PDO;

class NoticiaDAO extends DAO{
    public $conexao;

    public function __construct()
    {
        try{            
           return parent::__construct();
        }catch(Exception $e){
            echo 'Não foi possível conectar ao banco de dados, erro: ' . $e->getMessage();
        }        
    }

    public function insert(NoticiaModel $model){
        try{
            $sql = 'INSERT INTO noticia(titulo, conteudo, id_categoria) VALUES (?, ?, ?)';

            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $model->titulo);
            $stmt->bindValue(2, $model->conteudo);
            $stmt->bindValue(3, $model->id_categoria);

            $stmt->execute();

        }catch(Exception $e){
            echo 'Não foi possível cadastrar a noticia, erro: ' . $e->getMessage();
        }        
    }

    public function getAllRows(){
        try{
            $sql = 'SELECT * FROM noticia';

            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();       

            return $stmt->fetchAll(PDO::FETCH_CLASS);
        }catch(Exception $e){
            echo 'Não foi possível listar as noticias, erro: ' . $e->getMessage();
        }            
    }

    public function getByID($id){
        try{
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

        }catch(Exception $e){
            echo 'Não foi possível listar a noticia, erro: ' . $e->getMessage();
        }        
    }

    public function delete($id){
        try{
            $sql = 'DELETE FROM noticia WHERE id = ?';
        
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue(1, $id);
            $stmt->execute();   
            
        }catch(Exception $e){
            echo 'Não foi possível deletar a noticia, erro: ' . $e->getMessage();
        }               
    }

    public function buscar($dados_busca){

        try{
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
            
        }catch(Exception $e){
            echo 'Não foi possível buscar a noticia, erro: ' . $e->getMessage();
        }     

       
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