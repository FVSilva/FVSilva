<?php session_start()?>

<?php include_once 'includes/header.inc.php'; ?>

<?php include_once 'includes/menu.inc.php'; ?>

<div class="row container">
  <div class="col s12">
      <h5 class="ligth"> Consulta Produto </h5><hr>

    <?php if (isset($_SESSION ['msg'])): 
    echo $_SESSION ['msg'];
    session_unset();
    endif;
    ?>

    <table class="striped">
        <thead>
            <tr>
            <th> Nome Produto </th>
            <th> Tipo Produto </th>
            <th> Codigo Produto </th>
            <th> Quantidade Valor </th>
            <th> Valor </th>
        
            </tr>
       </thead>    
 
       <tbody>
           <?php
             include_once 'banco_de_dados/readProd.php';
           ?>
       </tbody>    

    </table>     

  </div>
</div>



<?php include_once 'includes/footer.inc.php' ?>