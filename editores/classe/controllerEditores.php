<?php

if (!isset($_SESSION)) session_start(); 

require_once '../../conexao/db_connect.php';
require_once 'classeEditores.php';

function clear($input){
    global $connect;

    $var = mysqli_escape_string($connect, $input);

    return $var;

}


if(isset($_POST['btn-editar'])):
    $usuario = new Usuario();
    
    $usuario->id        = clear($_POST['id']);
    $usuario->nome      = clear($_POST['nome']);
    $usuario->curriculo = clear($_POST['curriculo']);
    $usuario->email     = clear( $_POST['email']);
    
    $usuario->atualizar();

endif;




?>