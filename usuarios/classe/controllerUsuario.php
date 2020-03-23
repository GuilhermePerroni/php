<?php

if (!isset($_SESSION)) session_start(); 

require_once '../../conexao/db_connect.php';
require_once 'classeUsuario.php';

function clear($input){
    global $connect;

    $var = mysqli_escape_string($connect, $input);

    return $var;

}

if(isset($_POST['btn-cadastrar'])):
    $usuario = new Usuario();
    
    $usuario->nome      = clear($_POST['nome']);
    $usuario->senha     = clear($_POST['senha']);
    $usuario->email     = clear( $_POST['email']);
    $usuario->editor    = clear( $_POST['editor']);
    
    $usuario->adicionar();
endif;

if(isset($_POST['btn-editar'])):
    $usuario = new Usuario();
    
    $usuario->id        = clear($_POST['id']);
    $usuario->nome      = clear($_POST['nome']);
    $usuario->senha     = clear($_POST['senha']);
    $usuario->email     = clear( $_POST['email']);
    $usuario->editor    = clear( $_POST['editor']);
    
    $usuario->atualizar();

endif;

if(isset($_POST['btn-excluir'])):
    $usuario = new Usuario();
    
    $usuario->id        = clear($_POST['id']);
    $usuario->nome      = clear($_POST['nome']);
    $usuario->senha     = clear($_POST['senha']);
    $usuario->email     = clear( $_POST['email']);
    $usuario->editor    = clear( $_POST['editor']);
    
    $usuario->excluir();

endif;


?>