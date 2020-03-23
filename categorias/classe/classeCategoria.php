<?php

if (!isset($_SESSION)) session_start(); 

//require_once '../../php_action/db_connect.php';
//include_once ROOT_PATH . '/php_action/db_connect.php';


class Categoria {
    
    
    public $id;
    public $descricao;

    public function buscarTodosCategorias(){
        global $connect;
        

        $sql = "select * from categorias ";
        $resultado = mysqli_query($connect, $sql);
        return $resultado;
 
    }

    public function buscarCategoria($identificador){
        global $connect;
        

        $sql = "select * from categorias where id = '$identificador'";
        $resultado = mysqli_query($connect, $sql);
       

        if (mysqli_num_rows($resultado) > 0 ): 
            $dados = mysqli_fetch_array($resultado);
            
            $this->id = $dados['id'];
            $this->descricao = $dados['descricao'];
            
        endif;
    }

    public function adicionar(){
        global $connect;
                          
            $sql = "INSERT INTO categorias (descricao) VALUES ('$this->descricao')";
            
            if(mysqli_query($connect, $sql)):
                $_SESSION['mensagem'] = "Cadastrado com Sucesso!";
                header('Location: ../categorias.php');
            else:   
                $_SESSION['mensagem'] = $sql;
                header('Location: ../categorias.php');
            endif;
        
    }

    public function atualizar(){
        global $connect;
        
        $sql = "update categorias set descricao = '$this->descricao' where id = '$this->id'";

    
        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Atualizado com Sucesso!";
            header('Location: ../categorias.php');
        else:   
            $_SESSION['mensagem'] = "Erro ao Atualizar!";
            header('Location: ../categorias.php');
        endif;


    }

    public function excluir(){
        global $connect;
        
        $sql = "delete from categorias where id = '$this->id'";

    
        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Excluido com Sucesso!";
            header('Location: ../categorias.php');
        else:   
            $_SESSION['mensagem'] = "Erro ao Excluir!";
            header('Location: ../categorias.php');
        endif;

    }


    
}




?>