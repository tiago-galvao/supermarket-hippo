<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hippo Supermarket</title>
    <?php include('links.php') ?>
</head>
<body>
<?php include('header.php') ?>


<section id="forms">
    <div class="contato">
        <div class="container">
            <div class="row">
                <div id="newsletter" class="container">
                    <div class="title">
                        <h2><a id="cadastrar" style="text-align: center">Alterar Cadastro</a></h2>
                    </div>
                    <div class="content">
                        <div>
                            <div class="row half">
                                <?php
                                    session_start();
                                    $login = $_SESSION['login'];
                                    $nome = $_SESSION['nomeUsuario'];
                                    $tipo = $_SESSION['tipoUsuario'];
                                    echo"<p class='text'> LOGIN : $login</p><br/> <p class='text'> LOGIN : $nome</p><br/> <p class='text'> LOGIN : $tipo</p><br/>";
                                ?>
                            </div>
                        </div>
                        <form id="cadastrarForm" method="POST"  action="../code/user/user-update.php">
                            <div class="row half">
                                <input type="text" class="text" name="email" placeholder="Email"/>
                                <input type="text" class="text" name="login" placeholder="Login"/>
                                <input type="password" class="text" name="senha" placeholder="Senha"/>
                            </div>
                            <div class="row">
                                <input type="submit" class="btn btn-custom btn-block" value="Cadastrar" class="submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include('footer.php') ?>
<?php include('import-javascript.php') ?>
</body>
</html>
