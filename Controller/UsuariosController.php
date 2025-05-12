<?php

namespace APP\Controller;

use App\Model\Usuario;
use Exception;

    final class UsuarioConttroller extends Controller
    {
        public static function index() : void
        {
            parent::isProtected(); 

            $model_usuario = new Usuario();
            
            try {
                $model_autor->getAllRows();
    
            } catch(Exception $e) {
                $model_usuario->setError("Ocorreu um erro ao buscar os usuarios: ");
                $model_usuario->setError($e->getMessage());
            }
    
            parent::render('Usuario/lista_usuarios.php', $model_usuario); 

        }
        public static function cadastro() : void
        {
            parent::isProtected(); 
    
            $model_usuario = new Usuario();
            
            try
            {
                if(parent::isPost())
                {
                    $model_usuario->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                    $model_usuario->nome = $_POST['nome'];
                    $model_usuario->email= $_POST['email'];
                    $model_usuario->senha = $_POST['senha'];
                    $model_usuario->save();
    
                    parent::redirect("/Usuario");
    
                } else {
        
                    if(isset($_GET['id']))
                    {              
                        $model_usuario = $model_usuario->getById( (int) $_GET['id'] );
                    }
                }
    
            } catch(Exception $e) {
    
                $model_autor->setError($e->getMessage());
            }
    
            parent::render('Usuario/form_usuarios.php', $model_usuario);        
        }
    
        public static function delete() : void
        {
            parent::isProtected(); 
    
            $model_usuario = new Usuario();
            
            try 
            {
                $model_usuario->delete( (int) $_GET['id']);
                parent::redirect("/Usuario");
    
            } catch(Exception $e) {
                $model_usuario->setError("Ocorreu um erro ao excluir o usuario:");
                $model_usuario->setError($e->getMessage());
            } 
            
            parent::render('Usuario/lista_usuario.php', $model_usuario);  
        }
    }

?>