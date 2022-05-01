<?php session_start()?>
<?php include_once 'includes/header.inc.php'?>
<?php include_once 'includes/menu.inc.php'?>


<div class="row container"> 
        <div class="col s12 center">
            
            
        <?php

                include_once 'banco_de_dados/conexao.php';

                $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
                $_SESSION['id'] = $id;
                $querySelect = $link->query("select * from tb_fornecedores where id ='$id'");

                while ($registros=$querySelect->fetch_assoc()):
                $nome = $registros['nome'];
                $email = $registros['email'];
                $telefone = $registros['telefone'];
                endwhile;


           

         
         echo "<h5 class='blue-grey-text center'>Deseja mesmo Excluir o fornecedor $nome  do Sistema?</h5>";
         echo "<a  href='banco_de_dados/deleteforn.php?id=$id'><input type='submit' value='sim' class='btn green center'></a>";
         echo "<a  href='consulta2.php'><input  type='submit' value='não' class='btn red center'></a>";
         
         ?>
 
        </div> 
</div>


<?php include_once 'includes/footer.inc.php'?>