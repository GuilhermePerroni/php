<?php

if (!isset($_SESSION)) session_start(); 

require_once '../../conexao/db_connect.php';
require_once 'classeCategoria.php';

function clear($input){
    global $connect;

    $var = mysqli_escape_string($connect, $input);

    return $var;

}

if(isset($_POST['btn-cadastrar'])):
    $categoria = new Categoria();
    
    $categoria->nome      = clear($_POST['nome']);
    $categoria->descricao = clear($_POST['descricao']);

    $categoria->adicionar();
endif;

if(isset($_POST['btn-editar'])):
    $categoria = new Categoria();

    $categoria->id        = clear($_POST['id']);
    $categoria->nome      = clear($_POST['nome']);
    $categoria->descricao = clear($_POST['descricao']);
    
    $categoria->atualizar();

endif;

if(isset($_POST['btn-excluir'])):
    $categoria = new Categoria();
    
    $categoria->id        = clear($_POST['id']);
    $categoria->nome      = clear($_POST['nome']);
    $categoria->descricao = clear($_POST['descricao']);
    
    $categoria->excluir();

endif;


?>