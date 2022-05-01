<?php session_start()?>

<?php include_once 'includes/header.inc.php'; ?>

<?php include_once 'includes/menu.inc.php'; ?>
<div class="row container">
    <div class="col s12">
        <h5 class="light">Edição de registros</h5>
</div>
<?php include_once 'banco_de_dados/conexao.php';
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT );
$_SESSION ['id'] = $id;
$querySelect = $link -> query("select*from tb_produtos WHERE id= '$id'");
while($registros=$querySelect -> fetch_assoc()){
    $id = $registros ['id'];
    $nome_produto = $registros['nome_produto'];
    $tipo_produto = $registros['tipo_produto'];
    $codigo_produto = $registros['codigo_produto'];
    $quantidade = $registros['quantidade'];
    $valor = $registros['valor'];
}; 
?>



<div class="row container">
    <p>&nbsp;</p>
	<form action="banco_de_dados/updateProd.php" method="POST" class="col s12">
		<fieldset class="formulario" style="padding:15px;">
			<legend>
				<img src= "https://avatars.dicebear.com/api/bottts/:seed.svg" alt="Imagem de usuário" width="100px" />
			</legend>

			<h5 class="blue-grey-text center">Cadastro Produto</h5>

          <?php
          if(isset($_SESSION['msg'])) :
			echo $_SESSION['msg'];
			session_unset();
		  endif;
          ?>
  
            <div class="input-field col s12">
				<i class="material-icons prefix"> format_size </i>

				<input type="text" name="nome_produto" id="nome_produto" maxlength="40" required autofocus />
				<label for="nome_produto">Nome_Produto</label>
			</div>

			<div class="input-field col s12">
				<i class="material-icons prefix"> assignment_late </i>

				<input type="text" name="tipo_produto" id="tipo_produto" maxlength="40" required autofocus />
				<label for="tipo_produto">Tipo_Produto</label>
			</div>

			
			<div class="input-field col s12">
				<i class="material-icons prefix">  redeem  </i>

				<input type="text" name="codigo_produto" id="codigo_produto" maxlength="40" required autofocus />
				<label for="codigo_produto">Codigo_Produto</label>
			</div>

			<div class="input-field col s12">
				<i class="material-icons prefix">  exposure  </i>

				<input type="text" name="quantidade" id="quantidade" maxlength="40" required autofocus />
				<label for="quantidade">Quantidade</label>
			</div>

			<div class="input-field col s12">
				<i class="material-icons prefix"> attach_money </i>

				<input type="text" name="valor" id="valor" maxlength="40" required autofocus />
				<label for="valor">Valor</label>
			</div>
    
			<div class="input-field col s12">
				<input type="submit" value="Alterar" class="btn blue">

				<a href="consultaProd.php" class="btn red">cancelar</a>
			</div>
		</fieldset>
	</form>
</div>
</div>
<?php include_once 'includes/footer.inc.php'; ?>
