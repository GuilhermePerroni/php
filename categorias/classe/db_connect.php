<?php

//$servername = "localhost";
//$username = "root";
//$password = "vertrigo";
//$db_name = "crud";

$servername = "localhost";
$username = "u476136940_rootGuilherme";
$password = "guilherme850427";
$db_name = "u476136940_crudGuilherme";

$connect = mysqli_connect($servername,$username,$password,$db_name);
mysqli_set_charset($connect, 'utf8');

if(mysqli_connect_error()):
    echo "Erro na Conexão:".mysqli_connect_error();
endif

?>