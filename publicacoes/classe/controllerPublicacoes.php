<?php

if (!isset($_SESSION)) session_start(); 

require_once '../../conexao/db_connect.php';
require_once 'classePublicacoes.php';

function clear($input){
    global $connect;

    $var = mysqli_escape_string($connect, $input);

    return $var;

}

if(isset($_POST['btn-cadastrar'])):
    $publicacoes = new Publicacoes();
    
    $publicacoes->titulo         = clear($_POST['titulo']);
    $publicacoes->conteudo       = clear($_POST['conteudo']);
    $publicacoes->dataLancamento = clear( $_POST['dataLancamento']);
    $publicacoes->tags           = clear( $_POST['tags']);
    $publicacoes->categoria      = clear( $_POST['categoria']);
    $publicacoes->referencia     = clear( $_POST['referencia']);
    $publicacoes->idUsuario      = $_SESSION['usuariologadoId'];
    
    $publicacoes->adicionar();
endif;

if(isset($_POST['btn-editar'])):
    $publicacoes = new Publicacoes();
    
    $publicacoes->id             = clear($_POST['id']);
    $publicacoes->titulo         = clear($_POST['titulo']);
    $publicacoes->conteudo       = clear($_POST['conteudo']);
    $publicacoes->dataLancamento = clear( $_POST['dataLancamento']);
    $publicacoes->tags           = clear( $_POST['tags']);
    $publicacoes->categoria      = clear( $_POST['categoria']);
    $publicacoes->referencia     = clear( $_POST['referencia']);

    
    $publicacoes->atualizar();

endif;

if(isset($_POST['btn-excluir'])):
    $publicacoes = new Publicacoes();
    
    $publicacoes->id             = clear($_POST['id']);
    $publicacoes->titulo         = clear($_POST['titulo']);
    $publicacoes->conteudo       = clear($_POST['conteudo']);
    $publicacoes->dataLancamento = clear( $_POST['dataLancamento']);
    $publicacoes->tags           = clear( $_POST['tags']);
    $publicacoes->categoria      = clear( $_POST['categoria']);
    $publicacoes->referencia     = clear( $_POST['referencia']);
    
    $publicacoes->excluir();

endif;


?>