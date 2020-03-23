<?php

if (!isset($_SESSION)) session_start(); 

//require_once '../../php_action/db_connect.php';
//include_once ROOT_PATH . '/php_action/db_connect.php';


class Usuario {
    
    
    public $id;
    public $nome;
    public $senha;
    public $email;
    public $editor;

    public function buscarTodosUsuarios(){
        global $connect;
        

        $sql = "select * from usuarios ";
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
            
        endif;

        
    }

    public function adicionar(){
        global $connect;
                          
            $sql = "INSERT INTO usuarios (nome, senha, email, editor) VALUES ('$this->nome', '$this->senha', '$this->email', '$this->editor')";
            
            if(mysqli_query($connect, $sql)):
                $_SESSION['mensagem'] = "Cadastrado com Sucesso!";
                header('Location: ../usuarios.php');
            else:   
                $_SESSION['mensagem'] = $sql;
                header('Location: ../usuarios.php');
            endif;
        
    }

    public function atualizar(){
        global $connect;
        
        $sql = "update usuarios set nome = '$this->nome', senha = '$this->senha', email = '$this->email', editor = '$this->editor' where id = '$this->id'";

    
        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Atualizado com Sucesso!";
            header('Location: ../usuarios.php');
        else:   
            $_SESSION['mensagem'] = "Erro ao Atualizar!";
            header('Location: ../usuarios.php');
        endif;


    }

    public function excluir(){
        global $connect;
        
        $sql = "delete from usuarios where id = '$this->id'";

    
        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Excluido com Sucesso!";
            header('Location: ../usuarios.php');
        else:   
            $_SESSION['mensagem'] = "Erro ao Excluir!";
            header('Location: ../usuarios.php');
        endif;

    }


    
}





// require_once 'cliente.php';
// cliente = new cliente("",); 
// cliente->nome = 'Guilherme'; 
//function setnome($n){
//    return $this->$n;
//}

//public function __construct($n, $s) {
// this->nome = $n;
//}
//public function verNome() {
//    //this->nome = "teste";
//}
?>