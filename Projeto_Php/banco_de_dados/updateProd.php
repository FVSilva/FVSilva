<?php
session_start();
include_once 'conexao.php';
$id = $_SESSION['id'];
$nome_produto = filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_SPECIAL_CHARS);
$tipo_produto = filter_input(INPUT_POST, 'tipo_produto', FILTER_SANITIZE_SPECIAL_CHARS);
$codigo_produto = filter_input(INPUT_POST, 'codigo_produto', FILTER_SANITIZE_SPECIAL_CHARS);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_INT);

$queryUpdate = $link -> query("UPDATE tb_produtos SET nome_produto='$nome_produto', tipo_produto='$tipo_produto', codigo_produto='$codigo_produto',quantidade='$quantidade', valor='$valor'  WHERE id='$id'");
$affect_rows = mysqli_affected_rows($link);

if($affect_rows > 0){
    $_SESSION['msg'] = "<p class='center green-text'>".'atualização realizada com sucesso</p>'."<br>";
    header("Location:../consultaProd.php");
}else{
    $_SESSION['msg'] = "<p class='center red-text'>atualização não realizada</p><br>";
    header("Location:../consultaProd.php");
}

?>