<?php

namespace APP\Controller;

use App\Model\Usuario;
use Exception;

    final class UsuarioConttroller extends Controller
    {
        public static function index() : void
        {
            parent::isProtected(); 

            $model_autor = new Autor();
            
            try {
                $model_autor->getAllRows();
    
            } catch(Exception $e) {
                $model_autor->setError("Ocorreu um erro ao buscar os autores: ");
                $model_autor->setError($e->getMessage());
            }
    
            parent::render('Autor/lista_autor.php', $model_autor); 

        }
        public static function cadastro() : void
        {
            parent::isProtected(); 
    
            $model_autor = new Autor();
            
            try
            {
                if(parent::isPost())
                {
                    $model_autor->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                    $model_autor->nome = $_POST['nome'];
                    $model_autor->data_nascimento= $_POST['data_nascimentoi'];
                    $model_autor->CPF = $_POST['CPF'];
                    $model_autor->save();
    
                    parent::redirect("/Autor");
    
                } else {
        
                    if(isset($_GET['id']))
                    {              
                        $model_autor = $model_autor->getById( (int) $_GET['id'] );
                    }
                }
    
            } catch(Exception $e) {
    
                $model_autor->setError($e->getMessage());
            }
    
            parent::render('Autor/form_autores.php', $model_autor);        
        }
    
        public static function delete() : void
        {
            parent::isProtected(); 
    
            $model_autor = new Autor();
            
            try 
            {
                $model_autor->delete( (int) $_GET['id']);
                parent::redirect("/Autor");
    
            } catch(Exception $e) {
                $model_autor->setError("Ocorreu um erro ao excluir o autor:");
                $model_autor->setError($e->getMessage());
            } 
            
            parent::render('Autor/lista_autores.php', $model_autor);  
        }
    }

?>