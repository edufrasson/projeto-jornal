<?php

use App\Controller\NoticiaController;
use App\Controller\LoginController;

$url_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'Autoload.php';

switch($url_parse){

    case '/login':
        LoginController::index();
    break;

    case '/login/view':
        LoginController::view();
    break;

    case '/login/save':
        LoginController::save();
    break;

    case '/login/auth':
        LoginController::auth();
    break;

    case '/logout':
        LoginController::logout();
    break;

    case '/login/form':
        LoginController::form();
        break;


    case '/home':
        NoticiaController::index();
    break;
    
    case '/form':
        NoticiaController::form();
    break;

    case '/salvar':
        NoticiaController::save();
    break;
    
    case '/deletar':
        NoticiaController::deletar();
    break;
    
    case '/buscar':
        NoticiaController::buscar();
    break;
    
    case '/ver':
        NoticiaController::ver();
    break;    
    
    default:
        LoginController::index();
    break;
}