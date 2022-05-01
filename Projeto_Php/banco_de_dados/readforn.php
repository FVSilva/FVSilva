<?php include_once 'conexao.php';
$querySelect = $link -> query("select * from tb_fornecedores");
while($registros = $querySelect ->fetch_assoc()){
$id = $registros ['id'];
$nome = $registros['nome'];
$email = $registros['email'];
$telefone = $registros['telefone'];
echo "<tr>";
echo "<td>$nome</td><td>$email</td><td>$telefone</td>";
echo "<td><a href='editarforn.php?id=$id'><i class='material-icons purple-text'>edit</i></a></td>";
echo "<td><a href='confirmforn.php?id=$id'><i class='material-icons orange-text'>delete</i></a></td>";
//echo "<td><a href='banco_de_dados/deleteforn.php?id=$id'><i class='material-icons orange-text'>delete</i></a></td>";//
//echo "<td><a href='confirme.php?id=$id'><i class='material-icons'>delete</i></a></td>";
echo "</tr>";
};

?>
