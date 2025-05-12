<?php

namespace APP\Controller;

use App\Model\Categoria;
use Exception;

    final class CategoriaConttroller extends Controller
    {
        public static function index() : void
        {
            parent::isProtected(); 

            $model_categorias = new Categoria();
            
            try {
                $model_categorias->getAllRows();
    
            } catch(Exception $e) {
                $model_categorias->setError("Ocorreu um erro ao buscar as categorias: ");
                $model_categorias->setError($e->getMessage());
            }
    
            parent::render('Categoria/lista_categorias.php', $model_categorias); 

        }
        public static function cadastro() : void
        {
            parent::isProtected(); 
    
            $model_categorias = new Autor();
            
            try
            {
                if(parent::isPost())
                {
                    $model_categorias->Id = !empty($_POST['id']) ? $_POST['id'] : null;
                    $model_categorias->nome = $_POST['nome'];
                   
                    $model_categorias->save();
    
                    parent::redirect("/Categoria");
    
                } else {
        
                    if(isset($_GET['id']))
                    {              
                        $model_categorias = $model_categorias->getById( (int) $_GET['id'] );
                    }
                }
    
            } catch(Exception $e) {
    
                $model_categorias->setError($e->getMessage());
            }
    
            parent::render('Categoria/form_categorias.php', $model_categorias);        
        }
    
        public static function delete() : void
        {
            parent::isProtected(); 
    
            $model_categorias = new Categoria();
            
            try 
            {
                $model_categorias->delete( (int) $_GET['id']);
                parent::redirect("/Categoria");
    
            } catch(Exception $e) {
                $model_categorias->setError("Ocorreu um erro ao excluir a categoria:");
                $model_categorias->setError($e->getMessage());
            } 
            
            parent::render('Categoria/lista_categorias.php', $model_categorias);  
        }
    }
