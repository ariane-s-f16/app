<?php

namespace APP\DAO;

use APP\Model\Autor;

final class AutorDAO extends DAO{
    public function __construct(){
        parent::__construct();
    }

    public function save(Autor $model_autor) : Autor{
        return ($model_autor->Id ==null) ? $this->insert($model_autor):
            $this->update($model_autor);
    }

    public function insert(Autor $model_autor) : Autor{
        $sql = "INSERT INTO autor (nome, data_nascimento, CPF) VALUES (?,?,?) ";
        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $model_autor->nome);
        $stmt->bindValue(2, $model_autor->data_nascimento);
        $stmt->bindValue(3, $model_autor->CPF);

        $stmt->execute();

        $model_autor->Id = parent::$conexao->lastInsertId();

        return $model_autor;
    }
    public function update(Autor $model_autor) : Autor{
        $sql = "UPDATE autor SET nome=?, data_nascimento=?, CPF=? WHERE id=? ";
        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $model_autor->nome);
        $stmt->bindValue(2, $model_autor->data_nascimento);
        $stmt->bindValue(3, $model_autor->CPF);
        $stmt->bindValue(3, $model_autor->Id);
        $stmt->execute();
        $model_autor->Id = parent::$conexao->lastInsertId();

        return $model_autor;
    }

    public function selectById(int $id) : ?Autor{
        $sql = "SELECT * FROM autor WHERE id=? ";
        
        
        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $model_autor->data_nascimento);
        $stmt->bindValue(3, $model_autor->CPF);

        $stmt->execute();

        $model_autor->Id = parent::$conexao->lastInsertId();

        return $model_autor;
    }
}
