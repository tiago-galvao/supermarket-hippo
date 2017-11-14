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
    <div class="body-project">
        <div class="body-project--sidebar">
            <dl>
                <dt>Usuários</dt>
                <dd class="body-project--gu"><a href="user-management.php">Gerenciamento de usuários</a></dd>
                <dd class="body-project--au">Adiconar novo usuário</dd>

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

                    
            <?php
        }
        ?>

    </div>
    <?php include('../main-page-structure/import-javascript.php') ?>
</body>
</html>