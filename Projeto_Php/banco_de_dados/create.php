<?php
Session_start();
include_once 'conexao.php';

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
$emprego =  filter_input(INPUT_POST, 'emprego', FILTER_SANITIZE_SPECIAL_CHARS);
$endereco =  filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_SPECIAL_CHARS);

$querySelect = $link->query("select email from tb_clientes");
$array_email = [];

while($emails = $querySelect->fetch_assoc()) {
$emails_existentes = $emails['email'];
array_push($array_email, $emails_existentes);
}

if(in_array($email, $array_email)) {
$_SESSION['msg'] = "<p class='center red-text'>.Já existe um cliente cadastrado com esse e-mail </p>";
header("Location:../index.php");
}else{
    $querySelect = $link -> query("INSERT INTO tb_clientes values(default, '$nome', '$email', '$telefone', '$emprego', '$endereco')");
    $affect_rows = mysqli_affected_rows($link);
    if ($affect_rows > 0) {
        $_SESSION['msg'] = '<p class="center green-text">Cadastro efetuado com sucesso! </br>';
        header("Location:../index.php");
    }
}
?>




