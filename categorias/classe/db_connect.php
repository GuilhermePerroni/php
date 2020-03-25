<?php

$servername = "localhost";
$username = "root";
$password = "vertrigo";
$db_name = "crud";

//$servername = "localhost";
//$username = "rootGuilherme";
//$password = "vertrigoGuilherme";
//$db_name = "crudGuilherme";

$connect = mysqli_connect($servername,$username,$password,$db_name);
mysqli_set_charset($connect, 'utf8');

if(mysqli_connect_error()):
    echo "Erro na Conexão:".mysqli_connect_error();
endif

?>