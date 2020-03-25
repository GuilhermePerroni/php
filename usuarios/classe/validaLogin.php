<?php
if (!isset($_SESSION)) session_start(); 

require_once '../../conexao/db_connect.php';

function clear($input){
    global $connect;

    $var = mysqli_escape_string($connect, $input);

    return $var;

}

    if(isset($_POST['btn-verificaLogin'])):
        
        $email = clear( $_POST['email']);
        $senha = clear( $_POST['senha']);

        $sql = "select * from usuarios where email = '$email' and senha= '$senha' " ;

        $resultado = mysqli_query($connect, $sql);
        $dados = mysqli_fetch_array($resultado);

        if(mysqli_num_rows($resultado) > 0):
           
           
            $_SESSION['usuariologado'] = true;
            $_SESSION['usuariologadoId'] = $dados['id'];
            $_SESSION['usuariologadoNome'] = $dados['nome'];
            $_SESSION['usuariologadoEmail'] = $dados['email'];
            $_SESSION['mensagem'] = "Login Realizado com Sucesso!";

            header('Location: /index.php');
        else:   
            $_SESSION['mensagem'] = "Erro ao Logar!";
            header('Location: /login.php');
        endif;

    endif;
?>



