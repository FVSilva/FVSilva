<?php
include_once 'conexao.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$queryDelete =$link->query("delete from tb_fornecedores where id='$id'");

if (mysqli_affected_rows($link)>0): 
    header("Location:../consulta2.php");
endif;