<?php
namespace APP\Controller;
use APP\Model\Aluno;
use Exception;



final class AlunoController extends Controller
{
    public static function index() : void
    {
        parent::isProtected();
        $model = new Aluno();
        try{
            $model = new Aluno();
        }catch(Exception $e)
        {
            $model->setError("ocorreu um erro ao buscar alunos");
            $model->setError($e->getMessage());
        }
        parent::render('Aluno/lista_aluno.php', $model);
    }
    public static function cadastro() : void
    {
        parent::isProtected();
        $model = new Aluno();
        try
        {
            if(parent::isPost())
            {
                $model->Id =!empty($_POST['id'])?$_POST['id'] : null;
                $model->Nome = $_POST['nome'];
                $model-> RA=$_POST['ra'];
                $model-> Curso=$_POST['curso'];
                $model-> save();

                parent::redirect("/aluno");

            }else
            {
                if(isset($_GET['id']))
                {
                    $model= $model->getById((int)$_GET['id']);
                }
            }
        }catch(Exception $e)
        {
            $model->setError($e->getMessage());
        }
        parent::render('aluno/form_aluno.php', $model);
    }
    public static function delete() : void
}

?>