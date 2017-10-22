<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hippo Supermarket</title>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="lib/bootstrap/js/jquery-3.2.1.min.js"></script>

<script>
jQuery("document").ready(function($){
    
    var nav = $('.header');
    
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            nav.addClass("headerFixo");
        } else {
            nav.removeClass("headerFixo");
        }
    });
 
});

</script>

</head>
<body>
    <header>
        <div class="topo">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="feature-item item-email">
                            <i class="fa fa-1x fa-envelope"></i>
                            Email:<a href="mailto: rickcesar12@live.com"> <span class="text text-email">#</span></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="feature-item item-phone">
                            <i class="fa fa-1x fa-phone"></i>
                            <span class="text">Tel: #</span>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12">
                        <div class="feature-item item-redes">
                            <a href="#" target="_blank"><i class="fa fa-1y fa-facebook-square"></i></a>
                            <a href="#" target="_blank"><i class="fa fa-1y fa-linkedin-square"></i></a>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
        <div class="header">
            <div class="container">
                    <header>

                        <div class="row">

                            <div class="col-12">
                                <div class="menu">
                                    <div class="navbar-toggleable-md">
                                    
                                        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                                           <i class="fa fa-bars"></i>
                                        </button>
                                   
	                                    <nav class="collapse navbar-collapse" id="navbar">
	                                        <ul class="navbar-nav">

                                               <li class="nav-item"><a class="nav-link active" href="index.html">Home</a></li>
                                               <li class="nav-item"><a href="curriculo.html" class="nav-link">Casa e Decoração</a></li>
                                               <li class="nav-item"><a href="portifolio.html" class="nav-link">Tecnologia e Eletrônicos</a></li>
                                               <li class="nav-item"><a href="contato.html" class="nav-link">Alimentos</a></li>
                                               <li class="nav-item"><a href="contato.html" class="nav-link">Promoções</a></li>
                                               <li class="search">
                                                   <div class="input-group pull-right">
                                                       <input type="search" placeholder="Procurar" id="input-search">
                                                       <span class="input-group-btn">
                                                           <button type="button"><i class="fa fa-search"></i></button>
                                                       </span>
                                                   </div><!-- /input-group -->
                                               </li>

	                                        </ul><!--nav -->
	                                    </nav>
                                    </div>
                                </div><!-- menu -->
                            </div><!-- col -->

                        </div><!-- row -->

                    </header>
                </div><!-- Container-->
        </div><!-- safe-->
    </header>    
    <section>
			<img src="img/hippo.jpg" width="100%">
    </section>
   	
	<section>  
	    <div class="contato">
	        <div class="container">
	            <div class="row">
	                	<div id="newsletter" class="container">
                            <div class="title">
                                <h2>Entrar:</h2>
                            </div>
                            <div class="content">
                                <form method="post">
                                    <div class="row half">
                                            <input type="text" class="text" name="login" placeholder="Login" />
                                            <input type="password" class="text" name="senha" placeholder="Senha" />
                                    </div>
                                    <div class="row">
                                        <input type="submit" class="btn btn-custom btn-block" value="Entrar" class="submit">
                                    </div>
                                </form>
                            </div>
                    	</div>
                <?php 
                    if(isset($msg)) {
                        echo "<br><b> $msg </b><br><br>";
                    }
                ?>
	            </div>
	        </div>
	    </div>
	</section>
<section>
        <div id="call-to-action">

        <div class="container">
            <div class="row">
                <h2 class="news">NewsLetter</h2>
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
        <div class="footer">
	       	<div class="container">
	            <div class="row row-cols">
	                        <div class="col-lg-4 col-mg-4 col-popular-post">
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

	                        <div class="col-lg-4 col-mg-4 col-links">
	                            <h4>OFERTAS</h4>
	                            <ul class="list-unstyled">
	                                <li><a href="#"><i class="fa fa-angle-right"></i>Tecologia</a></li>
	                                <li><a href="#"><i class="fa fa-angle-right"></i>Saúde</a></li>
	                                <li><a href="#"><i class="fa fa-angle-right"></i>Infantil</a></li>
	                            </ul>

	                        </div>
	                        <div class="col-lg-4 col-mg-4 col-get-in-touch">
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
	        <div class="footer-cinza-escuro">
	        	<div class="container">
				    <div class="row">
				    	<div class="col-6">
				            <p class="pull-left">Copyright © Hippo Supermarket. All rights reserved.</p>
				        </div> 
				        <div class="col-6">   
				            <p class="pull-right text-yellow">Created by Artistic Fox</p>
				    	</div>
				    </div>
				</div>
			</div>    
		</div>
</footer>
	<script src="lib/bootstrap/js/tether.min.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
