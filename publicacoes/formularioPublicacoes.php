<?php
if (!isset($_SESSION)) session_start(); 



include_once '../includes/header.php';
require_once '../conexao/db_connect.php';
require_once 'classe/classePublicacoes.php';

?>

<div class="row">
	<div class="col s12 m6 push-m3  ">
		<h3 class="light">  
            <?php
                $publicacoes = new Publicacoes();
                if (isset($_GET['novo'])): 
                    echo "Nova Publicacão";
                endif;
                if (isset($_GET['editar'])): 
                    echo "Editar Publicacão";
                
                    $publicacoes->buscarPublicacao(mysqli_escape_string($connect, $_GET['editar']));

                endif;
                if (isset($_GET['excluir'])): 
                    echo "Excluir Publicacão"; 

                    $publicacoes->buscarPublicacao(mysqli_escape_string($connect, $_GET['excluir']));
                endif;
            ?>
        </h3>

        <form action="classe/controllerPublicacoes.php" method="POST">
            
            <div class="input-field col s12">
                <input hidden type="int" name="id" id="id" value="<?php echo $publicacoes->id; ?>" >
                <label for="id"> ID: <?php echo $publicacoes->id; ?> </label>
            </div>

            <br><br><br>

            <div class="input-field col s12">
                <input type="text" name="titulo" id="titulo" value="<?php echo $publicacoes->titulo; ?>  "   >
                <label for="titulo"> Titulo </label>
            </div>
            <br><br>
            <br><br>
      
            <textarea rows="30" cols="80" name="conteudo" id="conteudo" value="" > <?php echo $publicacoes->conteudo; ?>
            
            </textarea>
            <script>   
                CKEDITOR.replace('conteudo');
            </script>

        
            <br>

            <div class="input-field col s12">
                <input class="validate"  type="date" name="dataLancamento" id="dataLancamento" value="" >
                <label for="dataLancamento"> Data </label>
            </div>

            <script> 
                var formatadata   = document.getElementById('dataLancamento');
                formatadata.value = '<?php echo  date("Y-m-d", strtotime($publicacoes->dataLancamento)) ?>';    
            </script> 
                 


            <!--<div class="input-field col s12">
                <input class="validate" type="text" name="categoria" id="categoria" value="<?php echo $publicacoes->categoria; ?>" >
                <label for="categoria"> Categoria </label>
            </div>-->

            <!--  montador de select -->
            <div class="input-field col s12" >
                <select name="categoria" id="categoria" >
                <option value="" disabled selected>Selecione a Categoria</option>

            <?php  
            $categorias = new Publicacoes();

            $resultado = $publicacoes->buscarTodosCategorias();

            if (mysqli_num_rows($resultado) > 0 ): 

				while($dadoscategoria = mysqli_fetch_array($resultado)):
			?>
				<option value="<?php echo $dadoscategoria['id']; ?>"> <?php echo $dadoscategoria['descricao']; ?> </option>
						
			<?php 
				endwhile; 
            endif; 
			?> 		
				
            </select>
                <label>Categorias</label>
            </div>
            <!--  montador de select ffim -->

            <script>
                var categoriaselecionada = document.getElementById('categoria');
                categoriaselecionada.value = <?php echo $publicacoes->idCategoria; ?>;

                $(document).ready(function(){
				    $('select').formSelect();
			    });
            </script>

           
                

            <div class="input-field col s12">
                <input class="validate" type="text" name="tags" id="tags" value="<?php echo $publicacoes->tags; ?>" >
                <label for="tags"> Tags </label>
            </div>

            <div class="input-field col s12">
                <input type="text" name="referencia" id="referencia" value="<?php echo $publicacoes->referencia; ?>  "   >
                <label for="referencia"> Referencia </label>
            </div>

            <?php 
                  if (isset($_GET['novo'])): ?>
                    <button type="submit" class="btn" name="btn-cadastrar"> Cadastrar </button>
            <?php endif;
                  if (isset($_GET['editar'])): ?>
                    <button type="submit" class="btn orange" name="btn-editar"> Editar </button>
            <?php endif;
                  if (isset($_GET['excluir'])): ?>  
                    <button type="submit" class="btn red" name="btn-excluir"> Excluir </button>
            <?php endif; ?>
        
            <a href="publicacoes.php" class="btn green"> Lista de Publicações </a>

        </form>
    
    
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>
     