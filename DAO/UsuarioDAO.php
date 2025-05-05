<?php

namespace APP\DAO;

use APP\Model\Usuario;

final class UsuarioDAO extends DAO{
    public function __construct(){
        parent::__construct();
    }

    public function save(Usuario $model_usuario) : Usuario{
        return ($model_usuario->Id ==null) ? $this->insert($model_usuario):
            $this->update($model_usuario);
    }

    public function insert(Usuario $model_usuario) : Usuario{
        $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?,?,?) ";
        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $model_usuario->nome);
        $stmt->bindValue(2, $model_usuario->email);
        $stmt->bindValue(3, $model_usuario->senha);

        $stmt->execute();

        $model_usuario->Id = parent::$conexao->lastInsertId();

        return $model_usuario;
    }

    public function update(Usuario $model_usuario) : Usuario{
        $sql = "UPDATE Usuario SET nome=?, email=?, senha=? WHERE id=? ";
        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $model_usuario->nome);
        $stmt->bindValue(2, $model_usuario->email);
        $stmt->bindValue(3, $model_usuario->senha);
        $stmt->bindValue(3, $model_usuario->Id);
        $stmt->execute();
        $model_usuario->Id = parent::$conexao->lastInsertId();

        return $model;
    }


    public function selectById(int $id) : ?Usuario{
        $sql = "SELECT * FROM Usuario WHERE id=? ";
        
        
        $stmt = parent::$conexao->prepare($sql);

        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, $model_usuario->email);
        $stmt->bindValue(3, $model_usuario->senha);

        $stmt->execute();

        $model->Id = parent::$conexao->lastInsertId();

        return $model_usuario;
    }
}