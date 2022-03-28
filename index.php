<?php

$url_parse = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

include 'Controller/NoticiaController.php';

switch($url_parse){
    case '/home':
        include 'Views/modules/Noticia/ExibirNoticia.php';
    break;
    
    case '/form':
        include 'Views/modules/Noticia/CadastrarNoticia.php';
    break;

    case '/salvar':
        NoticiaController::save();
    break;    
    
    default:
        include 'Views/modules/Noticia/ExibirNoticia.php';
    break;
}