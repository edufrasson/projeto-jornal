<?php

$url_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'Controller/NoticiaController.php';

switch($url_parse){
    case '/home':
        NoticiaController::index();
    break;
    
    case '/form':
        include 'Views/modules/Noticia/CadastrarNoticia.php';
    break;

    case '/salvar':
        NoticiaController::save();
    break;
    
    case '/deletar':
        NoticiaController::deletar();
    break;    
    
    default:
        include 'Views/modules/Noticia/ExibirNoticia.php';
    break;
}