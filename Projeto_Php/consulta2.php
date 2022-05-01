<?php session_start()?>

<?php include_once 'includes/header.inc.php'; ?>

<?php include_once 'includes/menu.inc.php'; ?>

<div class="row container">
  <div class="col s12">
      <h5 class="ligth"> Consulta Fornecedor </h5><hr>

    <?php if (isset($_SESSION ['msg'])): 
    echo $_SESSION ['msg'];
    session_unset();
    endif;
    ?>

    <table class="striped">
        <thead>
            <tr>
            <th> Nome Fornecedor </th>
            <th> Email </th>
            <th> Telefone </th>
        
            </tr>
       </thead>    
 
       <tbody>
           <?php
             include_once 'banco_de_dados/readforn.php';
           ?>
       </tbody>    

    </table>     

  </div>
</div>



<?php include_once 'includes/footer.inc.php' ?>