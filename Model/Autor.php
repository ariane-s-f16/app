<?php

namespace APP\Model;

use APP\DAO\AutorDAO;
use Exception;


final class Autor extends Model{
    public ?int $Id = null;

    public ?string $nome {
        set{
            if(strlen($value) < 3)
                throw new Exception("Nome deve ter no minimo 3 caracteres");

                $this->nome = $value;
        } get => $this->nome ?? null;
    }

    
    public ?string $data_nascimento {
        set{
            if(strlen($value) < 3)
                throw new Exception("data de nascimento deve ter no minimo 8 caracteres");

                $this->$data_nascimento = $value;
        } get => $this->$data_nascimento ?? null;
    }
    
    public ?string $CPF {
        set{
            if(strlen($value) < 3)
                throw new Exception("cpf deve ter no minimo 11 caracteres");

                $this->$CPF = $value;
        } get => $this->$CPF ?? null;
    }


    function save() : Autor{
        return new AutorDAO()->save($this);
    }

    function getById(int $id) : ?Aluno{
        return new AutorDAO()->selectById($id);
    }

    function getAllRows() : array{
        $this->rows = new AutorDAO()->select();

        return $this->rows;
    }

    function delete(int $id) : bool{
        return new AutorDAO()->delete($id);
    }
}
