<?php

class Usuario {
    
    
    public $id = 1;
    public $nome;
    public $senha;
    public $email;
    public $editor;


}

class myclass {

    var $var1 = ""; // esta não tem valor default...
    var $var2 = "xyz";
    var $var3 = 100;
    var $var4 = "teste"; // PHP 5

  
}

$my_class = new myclass();
$usuario = new usuario();

$class_vars = get_class_vars(get_class($usuario));

foreach ($class_vars as $name => $value) {
    echo "$name : $value\n";
    echo $name;
}


$class_vars = get_class_vars(get_class($my_class));

foreach ($class_vars as $name => $value) {
    echo "$name : $value\n";
    echo $name;
}

$_POST = array("azul", "vermelho", "verde", "azul", "azul"); 


foreach ($_POST as $key => $value) {
    echo $key;
    echo $value;
}

?>