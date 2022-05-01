<?php include_once 'conexao.php';
$querySelect = $link -> query("select * from tb_produtos");
while($registros = $querySelect ->fetch_assoc()){
$id = $registros ['id'];
$nome_produto = $registros['nome_produto'];
$tipo_produto = $registros['tipo_produto'];
$codigo_produto = $registros['codigo_produto'];
$quantidade = $registros['quantidade'];
$valor = $registros['valor'];

echo "<tr>";
echo "<td>$nome_produto</td><td>$tipo_produto</td><td>$codigo_produto</td><td>$quantidade</td><td>$valor</td>";
echo "<td><a href='editarProd.php?id=$id'><i class='material-icons purple-text'>edit</i></a></td>";
echo "<td><a href='confirmProd.php?id=$id'><i class='material-icons orange-text'>delete</i></a></td>";
//echo "<td><a href='banco_de_dados/deleteProd.php?id=$id'><i class='material-icons orange-text'>delete</i></a></td>";
//echo "<td><a href='confirme.php?id=$id'><i class='material-icons'>delete</i></a></td>";
echo "</tr>";
};

?>

