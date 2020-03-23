<?php

if (!isset($_SESSION)) session_start(); 

//require_once '../../php_action/db_connect.php';
//include_once ROOT_PATH . '/php_action/db_connect.php';


class Cliente {
    
    
    public $id;
    public $nome;
    public $sobrenome;
    public $email;
    public $idade;

    public function buscarTodosClientes(){
        global $connect;
        

        $sql = "select * from clientes ";
        $resultado = mysqli_query($connect, $sql);
        return $resultado;
 
    }

    public function buscarCliente($identificador){
        global $connect;
        

        $sql = "select * from clientes where id = '$identificador'";
        $resultado = mysqli_query($connect, $sql);
       

        if (mysqli_num_rows($resultado) > 0 ): 
            $dados = mysqli_fetch_array($resultado);
            
            $this->id = $dados['id'];
            $this->nome = $dados['nome'];
            $this->sobrenome = $dados['sobrenome'];
            $this->email = $dados['email'];
            $this->idade = $dados['idade'];
            
        endif;

        
    }

    public function adicionar(){
        global $connect;
                          
            $sql = "INSERT INTO clientes (nome, sobrenome, email, idade) VALUES ('$this->nome', '$this->sobrenome', '$this->email', '$this->idade')";
            
            if(mysqli_query($connect, $sql)):
                $_SESSION['mensagem'] = "Cadastrado com Sucesso!";
                header('Location: ../clientes.php');
            else:   
                $_SESSION['mensagem'] = $sql;
                header('Location: ../clientes.php');
            endif;
        
    }

    public function atualizar(){
        global $connect;
        
        $sql = "update clientes set nome = '$this->nome', sobrenome = '$this->sobrenome', email = '$this->email', idade = '$this->idade' where id = '$this->id'";

    
        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Atualizado com Sucesso!";
            header('Location: ../clientes.php');
        else:   
            $_SESSION['mensagem'] = "Erro ao Atualizar!";
            header('Location: ../clientes.php');
        endif;


    }

    public function excluir(){
        global $connect;
        
        $sql = "delete from clientes where id = '$this->id'";

    
        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Excluido com Sucesso!";
            header('Location: ../clientes.php');
        else:   
            $_SESSION['mensagem'] = "Erro ao Excluir!";
            header('Location: ../clientes.php');
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