<?php

if (!isset($_SESSION)) session_start(); 

//require_once '../../php_action/db_connect.php';
//include_once ROOT_PATH . '/php_action/db_connect.php';


class UsuarioEditor {
  
    public $id;
    public $nome;
    public $senha;
    public $email;
    public $editor;
    public $curriculo;

    public function buscarTodosUsuarios(){
        global $connect;
        

        $sql = "select * from usuarios where editor = 'S'";
        $resultado = mysqli_query($connect, $sql);
        return $resultado;
 
    }

    public function buscarUsuario($identificador){
        global $connect;
        

        $sql = "select * from usuarios where id = '$identificador'";
        $resultado = mysqli_query($connect, $sql);
       

        if (mysqli_num_rows($resultado) > 0 ): 
            $dados = mysqli_fetch_array($resultado);
            
            $this->id = $dados['id'];
            $this->nome = $dados['nome'];
            $this->senha = $dados['senha'];
            $this->email = $dados['email'];
            $this->editor = $dados['editor'];
            $this->curriculo = $dados['curriculo'];
            
        endif;

        
    }

    public function atualizar(){
        global $connect;
        
        $sql = "update usuarios set nome = '$this->nome', curriculo = '$this->curriculo', email = '$this->email' where id = '$this->id'";

    
        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Atualizado com Sucesso!";
            header('Location: ../conteudoEditores.php');
        else:   
            $_SESSION['mensagem'] = "Erro ao Atualizar!";
            header('Location: ../conteudoEditores.php');
        endif;


    }




    
}

?>