<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body>

    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper blue-grey darken-2">
                <!-- Logo -->
                <a href="#" class="brand-logo">Sistema De Cadastro</a>

            

                <ul id="navbar-items" class="right hide-on-med-and-down">
                    <li>
                        <a class="dropdown-trigger" data-target="dropdown-menu" href="#">
                           Cadastro <i class="material-icons right">arrow_drop_down</i>
                                     <i class="material-icons left">account_circle</i>
                      
                        </a>
                    </li>
               
                </ul>

                <!-- Dropdown -->
                <ul id="dropdown-menu" class="dropdown-content">
                    <li><a href="index.php">Cadastro Cliente</a></li>
                    <li><a href="cadastroFornecedor.php">Cadastro Fornecedor</a></li>
                    <li><a href="cadastroProd.php">Cadastro Produto</a></li>
                    <li class="divider"></li>
               
                </ul>
                <ul id="navbar-items" class="right hide-on-med-and-down">
                <li>
                        <a class="dropdown-trigger" data-target="dropdown-menu2" href="#">
                           Consultas   <i class="material-icons left">search</i>
                                      <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                </ul>

               

                <!-- Dropdown -->
                <ul id="dropdown-menu2" class="dropdown-content">
                    <li><a href="consultas.php"> Consulta Cliente</a></li>
                    <li><a href="consulta2.php"> Consultas Fornecedores</a></li>
                    <li><a href="consultaProd.php"> Consultas Produtos</a></li>
                
               
                </ul>
            </div>
        </nav>
    </div>

    
   

  

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="main.js"></script>
</body>

</html>