<?php

namespace APP\DAO;

use APP\Model\Categoria;

final class CategoriaDAO extends DAO{
    public function __construct(){
        parent::__construct();
    }

    public function save(Categoria $model_categorias) : Categoria{
        return ($model_categorias->Id ==null) ? $this->insert($model_categorias):
            $this->update($model_categorias);
    }

    public function insert(Categoria $model_categorias) : Categoria{
        $sql = "INSERT INTO categoria (nome) VALUES (?) ";
        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $model_categoria->nome);
        

        $stmt->execute();

        $model_categorias->Id = parent::$conexao->lastInsertId();

        return $model_categorias;
    }
    public function update(Categoria $model_categorias) : Categoria{
        $sql = "UPDATE categoria SET nome=? WHERE id=? ";
        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $model_categorias->nome);
        $stmt->bindValue(3, $model_categorias->Id);
        $stmt->execute();
        $model_categorias->Id = parent::$conexao->lastInsertId();

        return $model_categorias;
    }

    public function selectById(int $id) : ?Categoria{
        $sql = "SELECT * FROM categoria WHERE id=? ";
        
        
        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $id);
       
        $stmt->bindValue(3, $model_categorias->nome);

        $stmt->execute();

        $model_categorias->Id = parent::$conexao->lastInsertId();

        return $model_categorias;
    }
}
