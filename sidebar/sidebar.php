<head>

    <meta charset="iso-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../sidebar/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../sidebar/css/style.css" rel="stylesheet">
    <script src="../sidebar/js/jquery-1.10.2.min.js"></script>
    <script src="../sidebar/js/bootstrap.js"></script>

</head>

<body>
            <div class="row">
                <div class="col-sm-3">
                    <div class="nav-side-menu">
                        <div class="brand"><img src="../img/hippologo.png" alt="" class="logo img-fluid"></div>
                        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
                        <div class="menu-list">
                            <ul id="menu-content" class="menu-content collapse out">
                                <li>
                                    <a href="?usuarios">
                                        <i class="fa fa-users fa-lg"></i> Usuarios
                                    </a>
                                </li>
                                <li data-toggle="collapse" data-target="#new" class="collapsed">
                                    <a href="#"><i class="fa fa-archive fa-lg"></i> Categorias <span class="arrow"></span></a>
                                </li>
                                <ul class="sub-menu collapse" id="new">
                                <table>		
												<?php
													foreach($categorias as $idCategoria => $dadosCategoria){
														
														echo "	<tr>
																	<li><a href='?categoria=$idCategoria'>{$dadosCategoria['nomeCategoria']}</a></li>
																</tr>
                                                                ";
                                                                                                       										
													}
                                                                echo "<tr>
                                                                <li><a href='?categorias'>Configurar categorias</a></li>
                                                                </tr>";
													?>
								</table>
                                </ul>
                                 <li>
                                    <a href="/?logout">
                                        <i class="fa fa-times fa-lg"></i> Sair
                                    </a>
                                </li>                               
                            </ul>
                        </div>
                    </div>
                </div>