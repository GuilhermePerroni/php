<?php
if (!isset($_SESSION)) session_start(); 



include_once '../includes/header.php';
require_once '../conexao/db_connect.php';
require_once 'classe/classeCategoria.php';

?>

<div class="row">
	<div class="col s12 m6 push-m3  ">
		<h3 class="light">  
            <?php
                $categoria = new Categoria();
                if (isset($_GET['novo'])): 
                    echo "Nova Categoria";
                endif;
                if (isset($_GET['editar'])): 
                    echo "Editar Categoria";
                
                    $categoria->buscarCategoria(mysqli_escape_string($connect, $_GET['editar']));

                endif;
                if (isset($_GET['excluir'])): 
                    echo "Excluir Categoria"; 

                    $categoria->buscarCategoria(mysqli_escape_string($connect, $_GET['excluir']));
                endif;
            ?>
        </h3>

        <form action="classe/controllerCategoria.php" method="POST">
            
            <div class="input-field col s12">
                <input hidden type="int" name="id" id="id" value="<?php echo $categoria->id; ?>" >
                <label for="id"> ID: <?php echo $categoria->id; ?> </label>
            </div>

            <br><br>

            <div class="input-field col s12">
                <input type="text" name="descricao" id="descricao" value="<?php echo $categoria->descricao; ?>  "   >
                <label for="descricao"> Descricao </label>
            </div>

            <div class="input-field col s12 ">
                <select name="cor" id="cor"  >
                <option value="" disabled selected>Choose your option</option>

                
                <option value="red lighten-2">1</option>
                <option value="pink darken-2">2</option>
                <option value="purple darken-2">3</option>
                
                <option value="deep-purple darken-2">4   </option>
                <option value="indigo darken-2">5   </option>
                <option value="blue darken-2">6   </option>
                <option value="teal darken-2">7  </option>
                <option value="deep-orange darken-2">8  </option>
                <option value="cyan darken-2">9   </option>
                <option value="lime darken-2">10   </option>
                <option value="light-green darken-2">11  </option>
                <option value="brown darken-2">12   </option>
                <option value="grandientev-vermelho-claro">13   </option>
                <option value="grandientev-rosa-claro">14</option>
                <option value="grandientev-roxo-claro">15</option>
                <option value="grandientev-azul-roxo-claro">16</option>
                <option value="grandientev-indigo-claro">17</option>
                <option value="grandientev-azul-claro">18</option>
                <option value="grandientev-teal-claro">19</option>
                <option value="grandientev-laranja-claro">20</option>
                <option value="grandientev-cyan-claro">21</option>
                <option value="grandientev-lime-claro">22</option>
                <option value="grandientev-verde-claro">23</option>
                <option value="grandientev-marrom-claro">24</option>
               
                </select>
                <label>Materialize Select</label>
            </div>

            <script>
                var cor = document.getElementById('cor');
                cor.value = '<?php echo $categoria->cor; ?>';

                
            </script>


            

            <div class="row">
            <h6 class="light"> Cor Sólida </h6>
                <span class="btn red lighten-2 " > 1 </span>
                <span class="btn pink darken-2 " > 2 </span>
                <span class="btn purple darken-2 " > 3 </span>
                <span class="btn deep-purple darken-2 " > 4 </span>
                <span class="btn indigo darken-2 " > 5 </span>
                <span class="btn blue darken-2 " > 6 </span>
                <span class="btn teal darken-2 " > 7 </span>
                <span class="btn deep-orange darken-2 " > 8 </span>
                <span class="btn cyan darken-2 " > 9 </span>
                <span class="btn lime darken-2 " > 10 </span>
                <span class="btn light-green darken-2 " > 11 </span>
                <span class="btn brown darken-2 " > 12 </span>
                
            </div>

            <div class="row">
                <h6 class="light"> Cor com Gradiente </h6>
                <span class="btn grandientev-vermelho-claro " > 13 </span>
                <span class="btn grandientev-rosa-claro " > 14 </span>
                <span class="btn grandientev-roxo-claro " > 15 </span>
                <span class="btn grandientev-azul-roxo-claro " > 16 </span>
                <span class="btn grandientev-indigo-claro " > 17 </span>
                <span class="btn grandientev-azul-claro" > 18 </span>
                <span class="btn grandientev-teal-claro" > 19 </span>
                <span class="btn grandientev-laranja-claro " > 20 </span>
                <span class="btn grandientev-cyan-claro " > 21 </span>
                <span class="btn grandientev-lime-claro " > 22 </span>
                <span class="btn grandientev-verde-claro " > 23 </span>
                <span class="btn grandientev-marrom-claro " > 24 </span>
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
        
            <a href="categorias.php" class="btn green"> Lista de Categorias </a>

        </form>
    
    
    </div>
</div>

<?php
include_once '../includes/footer.php';
?>
     