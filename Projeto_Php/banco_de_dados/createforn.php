<?php
Session_start();
include_once 'conexao.php';

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);


$querySelect = $link->query("select email from tb_fornecedores");
$array_email = [];

while($emails = $querySelect->fetch_assoc()) {
$emails_existentes = $emails['email'];
array_push($array_email, $emails_existentes);
}

if(in_array($email, $array_email)) {
$_SESSION['msg'] = "<p class='center red-text'>.Já existe um Fornecedor cadastrado com esse e-mail </p>";
header("Location:../cadastroFornecedor.php");
}else{
    $querySelect = $link -> query("INSERT INTO tb_fornecedores values(default, '$nome', '$email', '$telefone')");
    $affect_rows = mysqli_affected_rows($link);
    if ($affect_rows > 0) {
        $_SESSION['msg'] = '<p class="center green-text">Cadastro efetuado com sucesso! </br>';
        header("Location:../cadastroFornecedor.php");
    }
}
?>
