<?php
Session_start();
include_once 'conexao.php';

$nome_produto = filter_input(INPUT_POST, 'nome_produto', FILTER_SANITIZE_SPECIAL_CHARS);
$tipo_produto = filter_input(INPUT_POST, 'tipo_produto', FILTER_SANITIZE_SPECIAL_CHARS);
$codigo_produto = filter_input(INPUT_POST, 'codigo_produto', FILTER_SANITIZE_SPECIAL_CHARS );
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_NUMBER_INT);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_NUMBER_INT);

$querySelect = $link->query("select codigo_produto from tb_produtos");
$array_codigo_produto = [];

while($codigo_produtos = $querySelect->fetch_assoc()) {
$codigo_produtos_existentes = $codigo_produtos['codigo_produto'];
array_push($array_codigo_produto, $codigo_produtos);
}

if(in_array($codigo_produto, $array_codigo_produto)) {
    $_SESSION['msg'] = "<p class='center red-text'>.Já existe um Produto cadastrado com esse código </p>";
    header("Location:../cadastroProd.php");
    }else{
        $querySelect = $link->query("INSERT INTO tb_produtos values(default, '$nome_produto', '$tipo_produto', '$codigo_produto', '$quantidade', '$valor' )");
        $affect_rows = mysqli_affected_rows($link);
        if ($affect_rows > 0) {
            $_SESSION['msg'] = '<p class="center green-text">Cadastro de Produto efetuado com sucesso! </br>';
            header("Location:../cadastroProd.php");
        }
    }


    ?>
