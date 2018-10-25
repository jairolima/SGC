<?php 
session_start();
include_once("class/conexao.php");

$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING) ;
$texto = filter_input(INPUT_POST, 'texto', FILTER_SANITIZE_STRING) ;

//echo "Titulo: $titulo <br>";
//echo "Texto: $texto <br>";

$result_post = "INSERT INTO post (titulo, texto, created) VALUES ('$titulo', '$texto', NOW())";
$resultado_post = mysqli_query($mysqli, $result_post);


if(mysqli_insert_id($mysqli)){
$_SESSION['msg'] = "<p style='color:green;'>Post cadastrado</p>";
header("Location: private.php");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Post não cadastrado</p>";
    header("Location: private.php");
}


?>