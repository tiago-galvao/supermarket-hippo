<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hippo Supermarket</title>
    <?php include('main-page-structure/links.php') ?>
</head>
<body id="login">



<div class="container" style="top: 108px;">
    <?php
    session_start();
    $erro = $_SESSION['erro'];
    if (isset($erro)) {
    echo "
        <div class='container' style='display: flex; justify-content: space-around;'>
            <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\" style='display: flex; height: 51px; width: auto;'> $erro
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
            </button>
        </div>
        </div> ";
        session_destroy();
        unset($erro);
    }?>
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Entre para continuar com Supermercado Hippo</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                     alt="">
                <form method="post" class="form-signin">
                    <input type="text" class="form-control" name="login" placeholder="Email" required autofocus>
                    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                    <button class="btn btn-danger btn-block" type="submit"> Sign in</button>
                    <label class="checkbox pull-left">
                        <input type="checkbox" value="remember-me">    Lembre-me
                    </label>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include('main-page-structure/import-javascript.php') ?>
</body>
</html>