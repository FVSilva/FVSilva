<?php session_start() ?>

<?php include_once 'includes/header.inc.php'; ?>

<?php include_once 'includes/menu.inc.php'; ?>

<div class="row container">
	<span>&ensp;</span>

	<form action="banco_de_dados/create.php" method="POST" class="col s12">
		<fieldset class="formulario" style="padding:15px;">
			<legend>
				<img src= "https://avatars.dicebear.com/api/adventurer/:seed.svg" alt="Imagem de usuário" width="100px" />
			</legend>

			<h5 class="blue-grey-text center">Cadastro do Cliente</h5>

          <?php
          if(isset($_SESSION['msg'])) :
			echo $_SESSION['msg'];
			session_unset();
		  endif;
          ?>

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
				<input type="submit" value="Cadastrar" class="btn blue">

				<input type="reset" value="Limpar" class="btn red">
			</div>
		</fieldset>
	</form>
</div>

<?php include_once 'includes/footer.inc.php'; ?>