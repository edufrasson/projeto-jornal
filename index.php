<?php

$url_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'Controller/NoticiaController.php';

switch($url_parse){
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
        NoticiaController::index();
    break;
}