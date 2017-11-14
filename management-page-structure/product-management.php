<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hippo Supermarket</title>
    <?php include('../main-page-structure/links.php') ?>
</head>
<body>

<?php include ('../management-page-structure/top-bar.php'); ?>

<div class="container-fluid">
    <div class="body-project--product">
        <div class="body-project--sidebar">
            <dl>
                <dt>UsuÃ¡rios</dt>
                <dd class="body-project--gu"><a href="user-management.php">Gerenciamento de usuÃ¡rios</a></dd>
                <dd class="body-project--au">Adiconar novo usuÃ¡rio</dd>

                <dt>Categorias</dt>
                <dd class="body-project--gc"><a href="category-user-management.php">Gerenciamento de categorias</a></dd>
                <dd class="body-project--ac">Adiconar nova categoria</dd>

                <dt>Produtos</dt>
                <dd class="body-project--gp"><a class="link-selected" href="product-management.php">Gerenciamento de produtos</a></dd>
                <dd class="body-project--ap">Adiconar novo produto</dd>
            </dl>
        </div>

        <?php
        include('../db/bancodedados.php');

        try {
            $instrucaoSQL = "SELECT idCategoria, nomeCategoria, descCategoria FROM Categoria";
            $consulta = sqlsrv_query($conn, $instrucaoSQL);
            $numRegistros = sqlsrv_num_rows($consulta);

        } catch (Exception $e) {
            die($e);
        }

        while ($categorias = sqlsrv_fetch_array($consulta, SQLSRV_FETCH_NUMERIC)) {

            $categorias[1] = utf8_encode((empty($categorias[1])) ? "Sem dados" : $categorias[1]);
            $categorias[2] = utf8_encode((empty($categorias[2])) ? "Sem dados" : $categorias[2]);
            ?>
            <form class="row body-project--boxproduct" method='post'>
                <div class="body-project--form">
                    <div class='propreties-itens'>
                        <span class="lead body-project--title">Id</span>
                        <input class="propreties-itens--inputid" type='text' value='<?=$categorias[0];?>' name='id'/>
                    </div>
                    <div class='propreties-itens'>
                        <span class="lead body-project--title">Nome</span>
                        <input type='text' value='<?=$categorias[1];?>' name='nome'/>
                    </div>
                </div>
                <div class='body-project--formimage'>

                </div>
                <div class="body-project--form">
                    <div class='propreties-itens'>
                        <span class="lead body-project--title">Id</span>
                        <input class="propreties-itens--inputid" type='text' value='<?=$categorias[0];?>' name='id'/>
                    </div>
                    <div class='propreties-itens'>
                        <span class="lead body-project--title">Nome</span>
                        <input type='text' value='<?=$categorias[1];?>' name='nome'/>
                    </div>
                    <div class="body-project--formbuttons">
                        <input class='body-project--formbutton' type='image' src='/svg/pencil.svg' formaction='teste.php' />
                        <input class='body-project--formbutton' type='image' src='/svg/garbage.svg' formaction='teste.php' >
                    </div>
                </div>
            </form>
        <?php
            }
        ?>

    </div>
    <?php include('../main-page-structure/import-javascript.php') ?>
</body>
</html>