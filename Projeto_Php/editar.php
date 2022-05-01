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
$querySelect = $link -> query("select*from tb_clientes WHERE id= '$id'");
while($registros=$querySelect -> fetch_assoc()){
    $nome = $registros['nome'];
    $email = $registros['email'];
    $telefone = $registros['telefone'];
	$emprego = $registros['emprego'];
	$endereco = $registros['endereco'];
}; 
?>

<!-- Formulario de att de cad -->

<div class="row container">
    <p>&nbsp;</p>
    <form action="banco_de_dados/update.php" method="POST" class=" col s12 ">
        <fieldset class="formulario" style="padding: 15px">
        <legend>
        <img src="https://avatars.dicebear.com/api/micah/user.svg" alt="Imagem de usuário" width="100px" />
        </legend>
        <h5 class="blue-grey-text center">Alteração</h5>
        
			<div class="input-field col s12">
				<i class="material-icons prefix"> account_circle </i>

				<input type="text" name="nome" id="nome" maxlength="40" required autofocus />
				<label for="nome">Cliente</label>
			</div>

			<div class="input-field col s12">
				<i class="material-icons prefix"> email </i>

				<input type="email" name="email" id="email" maxlength="50" required />
				<label for="email">E-mail</label>
			</div>

			<div class="input-field col s12">
				<i class="material-icons prefix"> phone </i>

				<input type="tel" name="telefone" id="telefone" maxlength="15" required />
				<label for="telefone">Telefone</label>
			</div>

			<div class="input-field col s12">
				<i class="material-icons prefix"> class </i>

				<input type="text" name="emprego" id="emprego" maxlength="15" required />
				<label for="emprego">Emprego</label>
			</div>


			<div class="input-field col s12">
				<i class="material-icons prefix">border_color </i>

				<input type="text" name="endereco" id="endereco" maxlength="15" required />
				<label for="endereco">Endereço</label>
			</div>

			<div class="input-field col s12">
				<input type="submit" value="Alterar" class="btn blue">

				<a href="consultas.php" class="btn red">cancelar</a>
			</div>
        </fieldset>
    </form>    
</div>    
</div>    
<?php include_once 'includes/footer.inc.php' ?>