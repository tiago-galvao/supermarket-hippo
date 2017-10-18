<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/hipposm.css">
</head>
<header>
    <div class="header-yellow">

    </div>
    <div class="container">

        <div class="row">

            <nav id="menu" class="pull-right">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Casa e Decoração</a></li>
                    <li><a href="#">Tecnologia e Eletrônicos</a></li>
                    <li><a href="#">Alimentos</a></li>
                    <li><a href="#">Promoções</a></li>
                    <li class="search">
                        <div class="input-group pull-right">
                            <input type="search" placeholder="Procurar" id="input-search">
                            <span class="input-group-btn">
							        <button type="button"><i class="fa fa-search"></i></button>
							      </span>
                        </div><!-- /input-group -->
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<body>
<section>

    <div id="banner"></div>

    <div id="login">
        <div class="container">
            <div class="row">
                <h2>Entrar</h2>
            </div>
            <div class="row">
                <form method="POST">
                    <label class="">Login</label>
                    <input type="text" name="login" placeholder="EX: exemplo@exemplo.com"/>
                    <label>Senha</label>
                    <input type="password" name="senha" placeholder="EX : exemplo1234"/>
                    <button>ENTRAR</button>
                    <?php
                        echo "<br/><p> $msg </p>";
                    ?>
                </form>
            </div>
        </div>
    </div>

    <!--<div id="promocoes">-->

    <!--</div>-->

    <div id="call-to-action">

        <div class="container">
            <div class="row">
                <h2>NewsLetter</h2>
            </div>
            <div class="row">

                <p>Assine a nossa News Letter e fique por dentro de todas as nossas novidades</p>

            </div>
            <div class="row content-button">

                <div class="buttons">
                    <a href="#" class="btn btn-red">ASSINAR</a>
                </div>
                <div class="buttons">
                    <a href="#" class="btn btn-yellow">DEPOIS</a>
                </div>

            </div>

        </div>

    </div>

</section>

<footer>

    <div class="row row-cinza-claro">

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="row row-cols">
                        <div class="col-md-4 col-popular-post">
                            <h4>FORMAS DE PAGAMENTOS</h4>
                            <ul class="list-unstyled">
                                <li>
                                    <h5>CARTÕES DE DÉBITO</h5>
                                </li>
                                <li>
                                    <h5>CARTÕES DE CRÉDITO</h5>
                                </li>
                                <li>
                                    <h5>BOLETO</h5>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-4 col-links">
                            <h4>OFERTAS</h4>
                            <ul class="list-unstyled">
                                <li><a href="#"><i class="fa fa-angle-right"></i>Tecologia</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Saúde</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Infantil</a></li>
                            </ul>

                        </div>
                        <div class="col-md-4 col-get-in-touch">
                            <h4>VENHA NOS CONHECER</h4>
                            <address>
                                <i class="fa fa-map-marker"></i> <span>Rua das Aves, Suite 510 - São Paulo<br/>Orlando, FL 32801</span>
                            </address>

                            <p><a href="tel:11956775677"><i class="fa fa-phone"></i>11 9 56775677</a></p>
                            <ul class="list-unstyled list-socials">
                                <li>
                                    <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-cinza-escuro">
        <div class="container">
            <p class="pull-left">Copyright © Hippo Supermarket. All rights reserved.</p>
            <p class="pull-right text-yellow">Created by Artistic Fox</p>
        </div>
    </div>
</footer>
</section>
<script src="lib/bootstrap/js/jquery-3.2.1.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
