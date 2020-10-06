<?php
$text1 = '<script type="text/javascript">alert("É necessario estar logado para acessar o sistema");</script>';

 session_start();
if(!isset($_SESSION['login1'])){
    header("refresh:0; url=index.php");

    echo "$text1";
    
    die();

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>SISTEMA PHP</title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="../css/fullcalendar.css"/>
    <link rel="stylesheet" href="../css/matrix-style.css"/>
    <link rel="stylesheet" href="../css/matrix-media.css"/>
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/jquery.gritter.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>


<div id="header">

    <h2 style="color: white;position: absolute">
        <a href="dashboard.html" style="color:white; margin-left: 30px; margin-top: 40px">SISTEMA </a>
    </h2>


</div>



<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
    <ul class="nav">
        <li class="dropdown" id="profile-messages">
            <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i
                    class="icon icon-user"></i> <span class="text" > Bem vindo <?php 
echo ($_SESSION['login1']);
 ?>
  </span><b class="caret" ></b></a>


            <ul class="dropdown-menu">
                <li><a href="#"><i class="icon-user"></i>Perfil</a></li>
                <li class="divider"></li>
                <li><a href="#"><i class="icon-check"></i> Tarefas</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"<i class="icon-key"></i>Sair</a></li>
            </ul>
        </li>


    </ul>
</div>

<!--sidebar-menu-->
<div id="sidebar">
    <ul>


        <li class="active">
            <a href="add_new.php"><i class="icon icon-home"></i><span>Dashboard</span></a>
        </li>

          <!-- user menu 
                <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Usuarios</span> <span
                                class="label label-important">3</span></a>
                            <ul>
                                <li><a href="add_new.php">Criar Novo</a></li>
                                <li><a href="form-validation.html">Consultar</a></li>
                                <li><a href="form-wizard.html">Form with Wizard</a></li>
                            </ul>
                </li>

            end of user MENU-->  

<!-- CLIENT MENU-->

                <li class="submenu"><a href="#"><i class="icon icon-user"></i> <span>Cadastros</span> <span
                               class="label label-important">3</span></a>
                            <ul>
                                <li><a href="add_new.php">Usuários  </a></li>
                                <li><a href="add_clients.php">Cliente</a></li>
                                <li><a href="add_provider.php">Fornecedores</a></li>
                                <li><a href="add_worker.php">Funcionários</a>  </li>
                                <li><a href="add_shipping.php">Transportadora</a>  </li>

                            </ul>
                 </li>

           
<!-- END CLIENT MENU-->
<!-- CONTRACTS MENU-->

                <li class="submenu"><a href="#"><i class="icon icon-user"></i> <span>Contratos</span> <span
                               class="label label-important">3</span></a>
                            <ul>
                                <li><a href="add_product.php">Novo contrato</a></li>
                                <li><a href="form-validation.html">Form with Validation</a></li>
                                <li><a href="form-wizard.html">Form with Wizard</a>  </li>
                            </ul>
                 </li>

           
<!-- END CONTRACTS MENU-->

<!-- CALENDAR MENU-->

                <li class="submenu"><a href="#"><i class="icon icon-user"></i> <span>Agenda</span> <span
                               class="label label-important">3</span></a>
                            <ul>
                                <li><a href="add_product.php">Adicionar</a></li>
                                <li><a href="form-validation.html">Form with Validation</a></li>
                                <li><a href="form-wizard.html">Form with Wizard</a>  </li>
                            </ul>
                 </li>

           
<!-- END CALENDAR MENU-->
              
       
<!-- PRODUCTS MENU-->

                <li class="submenu"><a href="#"><i class="icon icon-user"></i> <span>Produtos</span> <span
                               class="label label-important">3</span></a>
                            <ul>
                                <li><a href="add_product.php">Adicionar Produto</a></li>
                                <li><a href="form-validation.html">Form with Validation</a></li>
                                <li><a href="form-wizard.html">Form with Wizard</a>  </li>
                            </ul>
                 </li>

           
<!-- END PRODUCTS MENU-->

<!-- FINANCIAL MENU-->

                <li class="submenu"><a href="#"><i class="icon icon-user"></i> <span>Financeiro</span> <span
                               class="label label-important">3</span></a>
                            <ul>
                                <li><a href="add_product.php">Adicionar Produto</a></li>
                                <li><a href="form-validation.html">Form with Validation</a></li>
                                <li><a href="form-wizard.html">Form with Wizard</a>  </li>
                            </ul>
                 </li>

           
<!-- END FINANCIAL MENU-->

<!-- REPORT MENU-->

                <li class="submenu"><a href="#"><i class="icon icon-user"></i> <span>Relatorios</span> <span
                               class="label label-important">3</span></a>
                            <ul>
                                <li><a href="add_product.php">Adicionar Produto</a></li>
                                <li><a href="form-validation.html">Form with Validation</a></li>
                                <li><a href="form-wizard.html">Form with Wizard</a>  </li>
                            </ul>
                 </li>

           
<!-- END REPORT MENU-->


                <li class="submenu"><a href="#"><i class="icon icon-th-list"></i> <span>Ordens de serviço</span> <span
                        class="label label-important">3</span></a>
                    <ul>
                        <li><a href="form-common.html">Basic Form</a></li>
                        <li><a href="form-validation.html">Form with Validation</a></li>
                        <li><a href="form-wizard.html">Form with Wizard</a></li>
                    </ul>
                </li>

    </ul>
</div>
<!--sidebar-menu-->
<div id="search">

        <a href="logout.php" style="color:white"><i class="icon icon-share-alt"></i><span>Sair</span></a>
    </div>
</li>
</ul>
</div>


<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Home 

         
</a></div>
    </div>
 <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">



<!--end-main-container-part-->