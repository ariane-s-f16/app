<?php

use APP\Controller\
{
    AlunoController,
    InicialController,
    LoginController,
    AutorController,
    CategoriaController,
    LivroController,
    EmprestimoController

};

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url)
{
    case '/':
        InicialController::index();
    break;
    /*
    *Rotas para login
    */
    case '/login':
        LoginController::index();
    break;

    case '/logout':
        LoginController::logout();
    break;

    /*
    *Rotas para alunos
    */


    case '/aluno':
        AlunoController::index();
    break;

    case '/aluno/cadastro':
        AlunoController::cadastro();
    break;

    case '/aluno/delete':
        AlunoController::index();
    break;

    /**
     *Rotas para autores  
     */

    case '/autor':
        AutorController::index();
    break;

    case '/autor/cadastro':
        AutorController::cadastro();
    break;

    case '/autor/delete':
        AutorController::delete();
    break;

    /**Rotas categoria */

    case '/categoria':
        CategoriaController::index();
    break;

    case '/categoria/cadastro':
        CategoriaController::cadastro();
    break;

    case '/categoria/delete':
        CategoriaController::delete();
    break;

    /**Rota para livros */

    case '/livro':
        LivroController::index();
    break;

    case '/livro/cadastro':
        LivroController::cadastro();
    break;

    case '/livro/delete':
        LivroController::delete();
    break;

    /**Rotas emprestimo */

    case '/emprestimo':
        EmprestimoController::index();
    break;

    case '/emprestimo/cadastro':
        EmprestimoController::cadastro();
    break;

    case '/emprestimo/delete':
        EmprestimoController::delete();
    break;


}
?>