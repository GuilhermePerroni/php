<?php
if (!isset($_SESSION)) session_start(); 



include_once '../includes/header.php';
require_once '../conexao/db_connect.php';
require_once 'classe/classePublicacoes.php';

?>

<div class="row">
	<div class="col s12 m6 push-m3  ">
		<h4 class="light">  
            <?php
                $publicacoes = new Publicacoes();
                
                if (isset($_GET['visualizar'])): 
                    
                
                    $publicacoes->buscarPublicacao(mysqli_escape_string($connect, $_GET['visualizar']));

                   
                endif;
            ?>
        </h4>

            <div class="row">
                <div class="col s12 m12">
                <div class="card  grey darken-3">
                    <div class="card-content white-text" >
                    <span class="card-title light"> <?php echo $publicacoes->titulo; ?></span>
                    
            
                    
                    <p  > Publicação feita dia: <?php echo  date("d/m/Y", strtotime($publicacoes->dataLancamento)) ?> </p>
                    <p> Na Categoria: <?php echo $publicacoes->categoria; ?> </p>
                    <p> Autor: <?php echo $publicacoes->usuario; ?> </p>
                    <br>

                    <p class="materialize-textarea " ><?php echo $publicacoes->conteudo; ?></p>
                    <br>
                    
                    

                    <!--<textarea  align=justify id="textarea1" class="materialize-textarea" name="conteudo" id="conteudo" value="" > 
                        
                        <?php echo $publicacoes->conteudo; ?> 
                    
                    </textarea>-->

                    
                    <p> Referencia: <?php echo $publicacoes->referencia; ?> </p>
                    <script> 
                        $('#textarea1').val('New Text');
                            M.textareaAutoResize($('#textarea1'));
                    </script> 
                    
                    </div>
                    <div class="card-action">
                    <a href="/index.php" class="btn green"> Voltar </a>
                    </div>
                </div>
                </div>
            </div>
    
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>
     