<?php
namespace App\Model;
use App\DAO\AlunoDAO;
use Exception;

final class Aluno extends Model
{
    public ?int $id = null;
    public ?string $nome
    {
        set
        {
          if (strlen($value)<3)
          throw new Exception("Nome deve ter no mínimo 3 caracteres.");
        $this-> nome = $value; 
        }
        get =>$this-> nome ?? null;
    }
    public ?string $RA
    {
        set
        {
            if(empty($value))
            throw new Exception("Preencha o RA");
            $this-> RA= $value; 

        }
        get =>$this-> RA?? null;
    }
    public ?string $curso
    {
        set
        {
            if (strlen($value)<3)
            throw new Exception("Curso deve ter no mínimo 3 caracteres.");
        $this->curso= $value;
        }
        get =>$this-> curso?? null;
    }
    function save() : Aluno
    {
        return new AlunoDAO()->save($this);
    }
    function GetById(int $id) : Aluno
    {
        return new AlunoDAO()->selectById($id);
    }
    function GetAllRows() : array
    {
        $this-> rows = new AlunoDAO()-> select();
        return $this->rows;
    }
    function Delete(int $id) : bool
    {
       
        return new AlunoDAO()->delete($id);
    }



}
?>