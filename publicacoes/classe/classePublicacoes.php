<?php

if (!isset($_SESSION)) session_start(); 

//require_once '../../php_action/db_connect.php';
//include_once ROOT_PATH . '/php_action/db_connect.php';


class Publicacoes {
    
    
    public $id;
    public $titulo;
    public $conteudo;
    public $dataLancamento;
    public $tags;
    public $idCategoria;
    public $categoria;
    public $referencia;

    public $idUsuario; //esse é o editor
    public $usuario; //esse é o editor
    

    public function buscarTodosCategorias(){
        global $connect;
        

        $sql = "select * from categorias ";
        $resultado = mysqli_query($connect, $sql);
        return $resultado;
 
    }

    public function buscarTodosPublicacoesGeral(){
        global $connect;
    
        $sql = "select p.*, c.descricao as nomeCategoria, c.cor as nomeCor, u.nome as nomeUsuario from publicacoes as p left join categorias as c on (p.categoria = c.id) left join usuarios as u on (p.idusuario = u.id) ";
        $resultado = mysqli_query($connect, $sql);
        return $resultado;
 
    }

    public function buscarPublicacaoPorCategoria($identificador){
        global $connect;
    
        $sql = "select p.*, c.descricao as nomeCategoria, c.cor as nomeCor, u.nome as nomeUsuario from publicacoes as p left join categorias as c on (p.categoria = c.id) left join usuarios as u on (p.idusuario = u.id) where p.categoria = '$identificador' ";
        $resultado = mysqli_query($connect, $sql);
        return $resultado;
 
    }

    public function buscarTodosPublicacoes(){
        global $connect;
        
        $this->idCategoria = $_SESSION['usuariologadoId'];

        $sql = "select p.*, c.descricao as nomeCategoria, u.nome as nomeUsuario from publicacoes as p left join categorias as c on (p.categoria = c.id) left join usuarios as u on (p.idusuario = u.id) where p.idusuario = '$this->idCategoria' ";
        $resultado = mysqli_query($connect, $sql);
        return $resultado;
 
    }

    public function buscarPublicacao($identificador){
        global $connect;
        

        $sql = "select p.*, c.descricao as nomeCategoria, u.nome as nomeUsuario from publicacoes as p left join categorias as c on (p.categoria = c.id) left join usuarios as u on (p.idusuario = u.id) where p.id = '$identificador'";
        $resultado = mysqli_query($connect, $sql);
       

        if (mysqli_num_rows($resultado) > 0 ): 
            $dados = mysqli_fetch_array($resultado);
            
            $this->id = $dados['id'];
            $this->titulo = $dados['titulo'];
            $this->conteudo = $dados['conteudo'];
            $this->dataLancamento = $dados['dataLancamento'];
            $this->tags = $dados['tags'];
            $this->idCategoria = $dados['categoria'];
            $this->categoria = $dados['nomeCategoria'];
            $this->referencia = $dados['referencia'];
            $this->usuario = $dados['nomeUsuario'];
            
        endif;

        
    }

    public function adicionar(){
        global $connect;
                          
            $sql = "INSERT INTO publicacoes (titulo, conteudo, dataLancamento, tags, categoria,referencia, idusuario) VALUES ('$this->titulo', '$this->conteudo', '$this->dataLancamento', '$this->tags', '$this->categoria', '$this->referencia', '$this->idUsuario')";
            
            if(mysqli_query($connect, $sql)):
                $_SESSION['mensagem'] = "Cadastrado com Sucesso!";
                header('Location: ../publicacoes.php');
            else:   
                $_SESSION['mensagem'] = $sql;
                header('Location: ../publicacoes.php');
            endif;
        
    }

    public function atualizar(){
        global $connect;
        
        $sql = "update publicacoes set titulo = '$this->titulo', conteudo = '$this->conteudo', dataLancamento = '$this->dataLancamento', tags = '$this->tags', categoria = '$this->categoria'  where id = '$this->id'";

    
        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Atualizado com Sucesso!";
            header('Location: ../publicacoes.php');
        else:   
            $_SESSION['mensagem'] = "Erro ao Atualizar!";
            header('Location: ../publicacoes.php');
        endif;


    }

    public function excluir(){
        global $connect;
        
        $sql = "delete from publicacoes where id = '$this->id'";

    
        if(mysqli_query($connect, $sql)):
            $_SESSION['mensagem'] = "Excluido com Sucesso!";
            header('Location: ../publicacoes.php');
        else:   
            $_SESSION['mensagem'] = "Erro ao Excluir!";
            header('Location: ../publicacoes.php');
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