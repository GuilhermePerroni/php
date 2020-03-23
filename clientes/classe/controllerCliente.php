<?php

if (!isset($_SESSION)) session_start(); 

require_once '../../conexao/db_connect.php';
require_once 'classeCliente.php';

function clear($input){
    global $connect;

    $var = mysqli_escape_string($connect, $input);

    return $var;

}

if(isset($_POST['btn-cadastrar'])):
    $cliente = new Cliente();
    
    $cliente->nome      = clear($_POST['nome']);
    $cliente->sobrenome = clear($_POST['sobrenome']);
    $cliente->email     = clear( $_POST['email']);
    $cliente->idade     = clear( $_POST['idade']);
    
    $cliente->adicionar();
endif;

if(isset($_POST['btn-editar'])):
    $cliente = new Cliente();
    
    $cliente->id        = clear($_POST['id']);
    $cliente->nome      = clear($_POST['nome']);
    $cliente->sobrenome = clear($_POST['sobrenome']);
    $cliente->email     = clear( $_POST['email']);
    $cliente->idade     = clear( $_POST['idade']);
    
    $cliente->atualizar();

endif;

if(isset($_POST['btn-excluir'])):
    $cliente = new Cliente();
    
    $cliente->id        = clear($_POST['id']);
    $cliente->nome      = clear($_POST['nome']);
    $cliente->sobrenome = clear($_POST['sobrenome']);
    $cliente->email     = clear( $_POST['email']);
    $cliente->idade     = clear( $_POST['idade']);
    
    $cliente->excluir();

endif;


?>