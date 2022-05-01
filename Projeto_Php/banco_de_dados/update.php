<?php
session_start();
include_once 'conexao.php';
$id = $_SESSION['id'];

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$emprego =  filter_input(INPUT_POST, 'emprego', FILTER_SANITIZE_SPECIAL_CHARS);
$endereco =  filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);

$queryUpdate = $link -> query("UPDATE tb_clientes SET nome='$nome', email='$email', telefone='$telefone', emprego= '$emprego', endereco ='$endereco' WHERE id='$id'");
$affect_rows = mysqli_affected_rows($link);

if($affect_rows > 0){
    $_SESSION['msg'] = "<p class='center green-text'>".'atualização realizada com sucesso</p>'."<br>";
    header("Location:../consultas.php");
}else{
    $_SESSION['msg'] = "<p class='center red-text'>atualização não realizada</p><br>";
    header("Location:../consultas.php");
}

?>

